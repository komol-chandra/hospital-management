<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Generic;
use App\Models\Medicine;
use App\Models\MedicineStockSale;
use App\Models\MedicineType;
use App\Models\Stock;
use App\Models\StockBase;
use App\Models\StockDetails;
use App\Services\ResponseService;
use App\Services\StockService;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    protected $stockService;
    protected $message;

    public function __construct()
    {
        $this->stockService = new StockService;
        $this->message = new ResponseService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */

    public function stockSearch(Request $request): JsonResponse
    {
        $medicines = Medicine::where(function ($query) use ($request) {
            if ($request->type_id) {
                $query->where('type_id', $request->type_id);
            }
            if ($request->generic_id) {
                $query->where('generic_id', $request->generic_id);
            }
            if ($request->search) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            }
        })->where('status', '1')->orderBy('id', 'asc')->get();
        return response()->json($medicines);

    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $data = StockBase::paginate(15);
        return view('backend.pages.stock.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $type = MedicineType::where('status', '1')->get();
        $generic = Generic::where('status', '1')->get();
        return view('backend.pages.stock.add-stock', compact('generic', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->all();
        $medicines = (json_decode($data['medicines']));
        $now = Carbon::now();
        $date = new DateTime($now);
        $format = $date->format('Y-m-d');

        try {
            DB::beginTransaction();
            //to save data in Stock Base Table
            $stockBase = new StockBase();
            $user_id = Auth::user()->id;
            $stockBase->created_by = $user_id;
            $stockBase->today_date = $format;
            $stockBase->fill($data)->save();
            $id = $stockBase->id;
            //to save data in Stock Details Table
            foreach ($medicines as $key => $value) {
                $value = (array)$value;
                $detailData[] = [
                    'medicine_id' => $value['medicine_id'],
                    'stock_base_id' => $id,
                    'today_date' => $format,
                    'qty' => $value['qty'],
                    'batch' => $value['batch'],
                    'purchase_rate' => $value['purchase_rate'],
                    'sale_rate' => $value['sale_rate'],
                    'exp_date' => $value['exp_date'],
                    'sub_total' => $value['sub_total'],
                ];
            }
            $details = StockDetails::insert($detailData);
            //to save data in income Table
            foreach ($medicines as $key => $value) {
                $value = (array)$value;
                $stockSale[] = [
                    'medicine_id' => $value['medicine_id'],
                    'today_date' => $format,
                    'batch' => $value['batch'],
                    'total_stock' => $value['qty'],
                    'total_sale' => "0",
                    'stock_count' => "0",
                    'sale_count' => "0",
                    'exp_date' => $value['exp_date'],
                    'created_by' => $user_id,
                ];
            }
            $sale = MedicineStockSale::insert($stockSale);
            DB::commit();
            if ($stockBase && $details && $sale) {
                $notification = $this->message->success('Stock', ' Added Successfully ');
                return response()->json($notification, 201);
            } else {
                $notification = $this->message->error('Stock', ' Field Required');
                return response()->json($notification, 402);
            }
        } catch (Exception $e) {
            $notification = $this->message->error('Stock', $e->getMessage());
            return response()->json($notification, 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Stock $stock
     * @return Response
     */
    public function show(Stock $stock): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        $data['stockBase'] = StockBase::findOrFail($id);
        $data['stockDetails'] = StockDetails::with('medicine')->where('stock_base_id', $id)->get();
        return response()->json($data, 201);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();
        $stockBase = StockBase::findOrFail($id);
        $stockPay = $stockBase->pay;
        $payNow = $request->payNow;
        $pay = $stockPay + $payNow;
        $stockBase->pay = $pay;
        $success = $stockBase->update();
        if ($success) {
            $notification = $this->message->success('Stock', ' Payment Updated Successfully ');
            return response()->json($notification, 201);
        } else {
            $notification = $this->message->error('Stock', ' System Error');
            return response()->json($notification, 402);
        }
    }


    /**
     * @param $id
     * @return RedirectResponse
     */

    public function status($id): RedirectResponse
    {
        $id = StockBase::findOrFail($id);
        if ($id->status = 0) $id->status = 1;
        else $id->status = 0;
        $success = $id->save();
        if ($success) {
            $notification = $this->message->success('Stock', ' Status Change Successfully ');
            return redirect()->back()->with($notification);
        } else {
            $notification = $this->message->error('Stock', ' System Error');
            return redirect()->back()->with($notification);
        }
    }
}

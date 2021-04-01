<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Generic;
use App\Models\Medicine;
use App\Models\MedicineType;
use App\Models\Sale;
use App\Models\StockDetails;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function saleSearch(Request $request): JsonResponse
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

    public function getBatch($id): JsonResponse
    {
        $data = StockDetails::where('medicine_id', $id)->get();
        $batch_data = json_decode($data);
        return response()->json($batch_data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        //
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
        $medicines = Medicine::where('status', '1')->get();
        $customers = Customer::where('status', '1')->get();
        return view('backend.pages.sale.add-sale', compact('type', 'generic', 'medicines', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Sale $sale
     * @return Response
     */
    public function show(Sale $sale): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sale $sale
     * @return Response
     */
    public function edit(Sale $sale): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Sale $sale
     * @return Response
     */
    public function update(Request $request, Sale $sale): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sale $sale
     * @return Response
     */
    public function destroy(Sale $sale): Response
    {
        //
    }
}

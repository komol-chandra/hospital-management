<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestBillRequest;
use App\Models\FrontendUser;
use App\Models\Income;
use App\Models\TestBill;
use App\Models\TestBillInfo;
use App\Services\ResponseService;
use App\Services\TestBillService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestBillController extends Controller
{
    protected $testBillService;
    protected $message;
    public function __construct()
    {
        $this->testBillService = new TestBillService;
        $this->message = new ResponseService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->testBillService->lists();
        return view('backend.pages.test-bill.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = $this->testBillService->getPatients();
        $tests = $this->testBillService->getTests();
        return view('backend.pages.test-bill.create', compact('tests'));
    }

    public function matchPatient(Request $request)
    {
        $id = $request->patientId;
        $match = FrontendUser::where('mobile', $id)->first();
        return response()->json($match, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestBillRequest $request)
    {
        try {
            DB::beginTransaction();

            //to save data in TestBill Table

            $bill = new TestBill();
            $user_id = Auth::user()->id;
            $bill->created_by = $user_id;
            $mobile = $request->mobile;
            $patient = FrontendUser::where('mobile', $mobile)->first()->toArray();
            $patientId = $patient['id'];
            $data = $request->all();
            $bill->patient_id = $patientId;
            $bill->fill($data)->save();

            //to save data in income Table

            $income = new Income();
            $income->invoice_id = $bill->id;
            $income->date = $data['date'];
            $income->amount = $data['paid'];
            $income->type = "TestBill";
            $income->patient_id = $patientId;
            $income->created_by = $user_id;
            $income->save();

            //to save data in TestBillInfo Table

            foreach ($request->test_id as $key => $value) {
                $detailData[] = [
                    'test_bill_id' => $bill->id,
                    'test_id'      => $value,
                    'description'  => $request->description[$key],
                    'quantity'     => $request->quantity[$key],
                    'price'        => $request->price[$key],
                    'sub_total'    => $request->sub_total[$key],
                ];
            }
            $info = TestBillInfo::insert($detailData);
            if ($info && $bill && $income) {
                $notification = $this->message->success('Test Bill', ' Added Successfully ');
            } else {
                $notification = $this->message->error('Test Bill', ' Field Required');
            }
            DB::commit();
        } catch (\Exception $e) {
            $notification = $this->message->error('Test Bill', $e->getMessage());
        }
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestBill  $testBill
     * @return \Illuminate\Http\Response
     */
    public function show(TestBill $testBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestBill  $testBill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TestBill::findOrFail($id);
        return response()->json($data, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestBill  $testBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            //to save data in TestBill Table
            $user_id = Auth::user()->id;

            $nowPay = $request->pay;
            $id = $request->id;
            $oldBill = TestBill::findOrFail($id);
            $paid = $oldBill->paid + $nowPay;
            $due = $oldBill->due - $nowPay;
            $oldBill->paid = $paid;
            $oldBill->due = $due;
            $oldBill->save();

            //to save data in income Table

            $income = new Income();
            $income->invoice_id = $oldBill->id;
            $today = Carbon::today();
            $date = new DateTime($today);
            $format = $date->format('Y-m-d');
            $income->date = $format;
            $income->amount = $paid;
            $income->type = "TestBill";
            $income->patient_id = $oldBill->patient_id;
            $income->updated_by = $user_id;
            $income->save();

            if ($oldBill && $income) {
                $notification = $this->message->success('Test Bill', ' Updated Successfully ');
            } else {
                $notification = $this->message->error('Test Bill', ' Field Required');
            }
            DB::commit();
        } catch (\Exception $e) {
            $notification = $this->message->error('Test Bill', $e->getMessage());
        }
        $status = 200;
        return response()->json($notification, $status);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestBill  $testBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestBill $testBill)
    {
        //
    }
}

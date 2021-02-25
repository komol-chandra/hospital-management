<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseBillRequest;
use App\Models\ExpenseBill;
use App\Services\ExpenseBillService;
use App\Services\ResponseService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class ExpenseBillController extends Controller
{
    protected $expenseBillService;
    protected $responseService;
    protected $excel;
    public function __construct()
    {
        $this->expenseBillService = new ExpenseBillService;
        $this->responseService = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->expenseBillService->lists();
        return view('backend.pages.expense-bill.index', compact('data'));
    }

    public function expense(Request $request)
    {
        // $data = [];
        if (isset($request->type)) {
            $now = Carbon::now();

            if ($request->type == 'today') {
                $date = new DateTime($now);
                $format = $date->format('Y-m-d');
                $data = ExpenseBill::where('date', $format)->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'lastDay') {
                $carbonDate = Carbon::yesterday();
                $date = new DateTime($carbonDate);
                $format = $date->format('Y-m-d');
                $data = ExpenseBill::where('date', $format)->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'thisWeek') {
                $start = $now->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
                $end = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');
                $data = ExpenseBill::whereBetween('date', [$start, $end])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'lastWeek') {

                $startSub = $now->startOfWeek(Carbon::SATURDAY)->subDay(7)->format('Y-m-d');
                $endSub = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');
                $data = ExpenseBill::whereBetween('date', [$startSub, $endSub])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'thisMonth') {
                $firstDay = $now->firstOfMonth()->format('Y-m-d');
                $lastDay = Carbon::now()->format('Y-m-d');
                $data = ExpenseBill::whereBetween('date', [$firstDay, $lastDay])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'lastMonth') {
                $start = new Carbon('first day of last month');
                $end = new Carbon('last day of last month');
                $startFormat = $start->format('Y-m-d');
                $endFormat = $end->format('Y-m-d');
                $data = ExpenseBill::whereBetween('date', [$startFormat, $endFormat])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'last3Month') {
                $start = Carbon::now()->subMonths(3)->startOfMonth()->format('Y-m-d');
                $end = Carbon::now()->format('Y-m-d');
                $data = ExpenseBill::whereBetween('date', [$start, $end])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'last6Month') {
                $start = Carbon::now()->subMonths(6)->startOfMonth()->format('Y-m-d');
                $end = Carbon::now()->format('Y-m-d');
                $data = ExpenseBill::whereBetween('date', [$start, $end])->get();
            } elseif ($request->type == 'thisYear') {
                $year = $now->startOfYear()->format('Y-m-d');
                $lastDay = Carbon::now()->format('Y-m-d');
                $data = ExpenseBill::whereBetween('date', [$year, $lastDay])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'lastYear') {
                $start = $now->subYear(1)->startOfYear()->format('Y-m-d');
                $end = $now->startOfYear()->format('Y-m-d');
                $data = ExpenseBill::whereBetween('date', [$start, $end])->get();
                $amount = $data->sum('amount');

            }
        } else {
            $data = ExpenseBill::get();
            $amount = $data->sum('amount');
        }
        return view('backend.pages.report.expense-report', compact('data', 'amount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expenseType = $this->expenseBillService->getExpenseType();
        return view('backend.pages.expense-bill.create', compact('expenseType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseBillRequest $request)
    {
        $data = $request->all();
        $success = $this->expenseBillService->createOrUpdate($data);
        if ($success) {
            $notification = $this->responseService->success('Expense Bill', ' Added Successfully');
        } else {
            $notification = $this->responseService->error('Expense Bill', 'Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseBill  $expenseBill
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseBill $expenseBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseBill  $expenseBill
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseBill $expenseBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseBill  $expenseBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseBill $expenseBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseBill  $expenseBill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $success = ExpenseBill::destroy($id);
        if ($success) {
            $notification = $this->responseService->success('Expense Bill', ' Deleted Successfully');
        } else {
            $notification = $this->responseService->error('Expense Bill', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}

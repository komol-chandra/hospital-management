<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Services\ResponseService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class IncomeReportController extends Controller
{
    protected $message;
    public function __construct()
    {
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = [];
        if (isset($request->type)) {
            $now = Carbon::now();

            if ($request->type == 'today') {
                $date = new DateTime($now);
                $format = $date->format('Y-m-d');
                $data = Income::where('date', $format)->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'lastDay') {
                $carbonDate = Carbon::yesterday();
                $date = new DateTime($carbonDate);
                $format = $date->format('Y-m-d');
                $data = Income::where('date', $format)->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'thisWeek') {
                $start = $now->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
                $end = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');
                $data = Income::whereBetween('date', [$start, $end])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'lastWeek') {

                $startSub = $now->startOfWeek(Carbon::SATURDAY)->subDay(7)->format('Y-m-d');
                $endSub = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');
                $data = Income::whereBetween('date', [$startSub, $endSub])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'thisMonth') {
                $firstDay = $now->firstOfMonth()->format('Y-m-d');
                $lastDay = Carbon::now()->format('Y-m-d');
                $data = Income::whereBetween('date', [$firstDay, $lastDay])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'lastMonth') {
                $start = new Carbon('first day of last month');
                $end = new Carbon('last day of last month');
                $startFormat = $start->format('Y-m-d');
                $endFormat = $end->format('Y-m-d');
                $data = Income::whereBetween('date', [$startFormat, $endFormat])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'last3Month') {
                $start = Carbon::now()->subMonths(3)->startOfMonth()->format('Y-m-d');
                $end = Carbon::now()->format('Y-m-d');
                $data = Income::whereBetween('date', [$start, $end])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'last6Month') {
                $start = Carbon::now()->subMonths(6)->startOfMonth()->format('Y-m-d');
                $end = Carbon::now()->format('Y-m-d');
                $data = Income::whereBetween('date', [$start, $end])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'thisYear') {
                $year = $now->startOfYear()->format('Y-m-d');
                $lastDay = Carbon::now()->format('Y-m-d');
                $data = Income::whereBetween('date', [$year, $lastDay])->get();
                $amount = $data->sum('amount');

            } elseif ($request->type == 'lastYear') {
                $start = $now->subYear(1)->startOfYear()->format('Y-m-d');
                $end = $now->startOfYear()->format('Y-m-d');
                $data = Income::whereBetween('date', [$start, $end])->get();
                $amount = $data->sum('amount');
            }
        } else {
            $data = Income::get();
            $amount = $data->sum('amount');

        }
        return view('backend.pages.report.income-report', compact('data', 'amount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Income::findOrFail($id);
        return view('backend.pages.report.income-report-view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = Income::destroy($id);
        if ($success) {
            $notification = $this->message->success('Income Record', 'Deleted Successfully ');
        } else {
            $notification = $this->message->error('Income Record', 'System Error');
        }
        return redirect()->back()->with($notification);

    }
}

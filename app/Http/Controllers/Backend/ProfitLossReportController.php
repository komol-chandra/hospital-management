<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ExpenseBill;
use App\Models\Income;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class ProfitLossReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->type)) {
            $now = Carbon::now();

            if ($request->type == 'today') {
                $format = Carbon::now()->format('Y-m-d');
                $income = Income::where('date', $format)->get();
                $incomeAmount = $income->sum('amount');

                $expense = ExpenseBill::where('date', $format)->get();
                $expenseAmount = $expense->sum('amount');

                $profit = $incomeAmount - $expenseAmount;

            } elseif ($request->type == 'lastDay') {

                $carbonDate = Carbon::yesterday();
                $date = new DateTime($carbonDate);
                $format = $date->format('Y-m-d');

                $income = Income::where('date', $format)->get();
                $incomeAmount = $income->sum('amount');

                $expense = ExpenseBill::where('date', $format)->get();
                $expenseAmount = $expense->sum('amount');

                $profit = $incomeAmount - $expenseAmount;

            } elseif ($request->type == 'thisWeek') {

                $start = $now->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
                $end = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');

                $income = Income::whereBetween('date', [$start, $end])->get();
                $incomeAmount = $income->sum('amount');

                $expense = ExpenseBill::whereBetween('date', [$start, $end])->get();
                $expenseAmount = $expense->sum('amount');

                $profit = $incomeAmount - $expenseAmount;

            } elseif ($request->type == 'lastWeek') {

                $startSub = $now->startOfWeek(Carbon::SATURDAY)->subDay(7)->format('Y-m-d');
                $endSub = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');

                $income = Income::whereBetween('date', [$startSub, $endSub])->get();
                $incomeAmount = $income->sum('amount');

                $expense = ExpenseBill::whereBetween('date', [$startSub, $endSub])->get();
                $expenseAmount = $expense->sum('amount');

                $profit = $incomeAmount - $expenseAmount;

            } elseif ($request->type == 'thisMonth') {
                $firstDay = $now->firstOfMonth()->format('Y-m-d');
                $lastDay = Carbon::now()->format('Y-m-d');

                $income = Income::whereBetween('date', [$firstDay, $lastDay])->get();
                $incomeAmount = $income->sum('amount');

                $expense = ExpenseBill::whereBetween('date', [$firstDay, $lastDay])->get();
                $expenseAmount = $expense->sum('amount');

                $profit = $incomeAmount - $expenseAmount;

            } elseif ($request->type == 'lastMonth') {
                $start = new Carbon('first day of last month');
                $end = new Carbon('last day of last month');
                $startFormat = $start->format('Y-m-d');
                $endFormat = $end->format('Y-m-d');

                $income = Income::whereBetween('date', [$startFormat, $endFormat])->get();
                $incomeAmount = $income->sum('amount');

                $expense = ExpenseBill::whereBetween('date', [$startFormat, $endFormat])->get();
                $expenseAmount = $expense->sum('amount');

                $profit = $incomeAmount - $expenseAmount;

            } elseif ($request->type == 'last3Month') {
                $start = Carbon::now()->subMonths(3)->startOfMonth()->format('Y-m-d');
                $end = Carbon::now()->format('Y-m-d');

                $income = Income::whereBetween('date', [$start, $end])->get();
                $incomeAmount = $income->sum('amount');

                $expense = ExpenseBill::whereBetween('date', [$start, $end])->get();
                $expenseAmount = $expense->sum('amount');

                $profit = $incomeAmount - $expenseAmount;

            } elseif ($request->type == 'last6Month') {
                $start = Carbon::now()->subMonths(6)->startOfMonth()->format('Y-m-d');
                $end = Carbon::now()->format('Y-m-d');

                $income = Income::whereBetween('date', [$start, $end])->get();
                $incomeAmount = $income->sum('amount');

                $expense = ExpenseBill::whereBetween('date', [$start, $end])->get();
                $expenseAmount = $expense->sum('amount');

                $profit = $incomeAmount - $expenseAmount;

            } elseif ($request->type == 'thisYear') {
                $year = $now->startOfYear()->format('Y-m-d');
                $lastDay = Carbon::now()->format('Y-m-d');

                $income = Income::whereBetween('date', [$year, $lastDay])->get();
                $incomeAmount = $income->sum('amount');

                $expense = ExpenseBill::whereBetween('date', [$year, $lastDay])->get();
                $expenseAmount = $expense->sum('amount');

                $profit = $incomeAmount - $expenseAmount;

            } elseif ($request->type == 'lastYear') {
                $start = $now->subYear(1)->startOfYear()->format('Y-m-d');
                $end = $now->startOfYear()->format('Y-m-d');

                $income = Income::whereBetween('date', [$start, $end])->get();
                $incomeAmount = $income->sum('amount');

                $expense = ExpenseBill::whereBetween('date', [$start, $end])->get();
                $expenseAmount = $expense->sum('amount');

                $profit = $incomeAmount - $expenseAmount;

            }
        } else {
            $income = Income::get();
            $incomeAmount = $income->sum('amount');

            $expense = ExpenseBill::get();
            $expenseAmount = $expense->sum('amount');

            $profit = $incomeAmount - $expenseAmount;

        }

        return view('backend.pages.report.profit-loss-report', compact('income', 'incomeAmount', 'expense', 'expenseAmount', 'profit'));
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
        //
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
        //
    }
}

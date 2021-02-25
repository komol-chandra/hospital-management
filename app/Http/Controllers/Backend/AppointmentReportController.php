<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AppointmentReportController extends Controller
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
                $today = Carbon::now()->format('Y-m-d');

                $data = Doctor::withCount(['appointments' => function (Builder $query) use ($today) {
                    $query->where('date', $today);
                }])->paginate(10);

            } elseif ($request->type == 'lastDay') {
                $lastDay = Carbon::yesterday()->format('Y-m-d');

                $data = Doctor::withCount(['appointments' => function (Builder $query) use ($lastDay) {
                    $query->where('date', $lastDay);
                }])->paginate(10);

            } elseif ($request->type == 'thisWeek') {
                $start = $now->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
                $end = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');

                $data = Doctor::withCount(['appointments' => function (Builder $query) use ($start, $end) {
                    $query->whereBetween('date', [$start, $end]);
                }])->paginate(10);

            } elseif ($request->type == 'lastWeek') {

                $start = $now->startOfWeek(Carbon::SATURDAY)->subDay(7)->format('Y-m-d');
                $end = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');

                $data = Doctor::withCount(['appointments' => function (Builder $query) use ($start, $end) {
                    $query->whereBetween('date', [$start, $end]);
                }])->paginate(10);

            } elseif ($request->type == 'thisMonth') {
                $start = $now->firstOfMonth()->format('Y-m-d');
                $end = Carbon::now()->format('Y-m-d');

                $data = Doctor::withCount(['appointments' => function (Builder $query) use ($start, $end) {
                    $query->whereBetween('date', [$start, $end]);
                }])->paginate(10);

            } elseif ($request->type == 'lastMonth') {
                $startDay = new Carbon('first day of last month');
                $endDay = new Carbon('last day of last month');
                $start = $startDay->format('Y-m-d');
                $end = $endDay->format('Y-m-d');

                $data = Doctor::withCount(['appointments' => function (Builder $query) use ($start, $end) {
                    $query->whereBetween('date', [$start, $end]);
                }])->paginate(10);

            } elseif ($request->type == 'last3Month') {
                $start = Carbon::now()->subMonths(3)->startOfMonth()->format('Y-m-d');
                $end = Carbon::now()->format('Y-m-d');

                $data = Doctor::withCount(['appointments' => function (Builder $query) use ($start, $end) {
                    $query->whereBetween('date', [$start, $end]);
                }])->paginate(10);

            } elseif ($request->type == 'last6Month') {
                $start = Carbon::now()->subMonths(6)->startOfMonth()->format('Y-m-d');
                $end = Carbon::now()->format('Y-m-d');

                $data = Doctor::withCount(['appointments' => function (Builder $query) use ($start, $end) {
                    $query->whereBetween('date', [$start, $end]);
                }])->paginate(10);

            } elseif ($request->type == 'thisYear') {
                $start = $now->startOfYear()->format('Y-m-d');
                $end = Carbon::now()->format('Y-m-d');
                $data = Doctor::withCount(['appointments' => function (Builder $query) use ($start, $end) {
                    $query->whereBetween('date', [$start, $end]);
                }])->paginate(10);

            } elseif ($request->type == 'lastYear') {
                $start = $now->subYear(1)->startOfYear()->format('Y-m-d');
                $end = $now->startOfYear()->format('Y-m-d');

                $data = Doctor::withCount(['appointments' => function (Builder $query) use ($start, $end) {
                    $query->whereBetween('date', [$start, $end]);
                }])->paginate(10);

            }
        } else {

            $data = Doctor::withCount('appointments')->paginate(10);
        }
        return view('backend.pages.report.appointment-report', compact('data'));
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

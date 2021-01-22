<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use App\Services\ResponseService;
use App\Services\ScheduleService;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    protected $scheduleService;
    protected $responseService;
    public function __construct()
    {
        $this->scheduleService = new ScheduleService;
        $this->responseService = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::orderBy('id', 'DESC')->get();
        return view('backend.pages.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = $this->scheduleService->getDays();
        $doctors = $this->scheduleService->getActiveDoctors();
        return view('backend.pages.schedule.create', compact('days', 'doctors'));
    }
    public function scheduleList(Request $request)
    {
        $schedules = Schedule::search($request->search)->orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.schedule.dataList', compact('schedules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $data = $request->all();
        // dd($data);

        $schedule = $this->scheduleService->createOrUpdate($data);
        if ($schedule) {
            $notification = $this->responseService->success('Schedule', 'Schedule Added Successfully');
        } else {
            $notification = $this->responseService->error('Schedule', 'Schedule Input Field Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctors = $this->scheduleService->getActiveDoctors();
        $days = $this->scheduleService->getDays();
        $schedule = $this->scheduleService->getById($id);
        return view('backend.pages.schedule.edit', compact('doctors', 'days', 'schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $schedule = $this->scheduleService->createOrUpdate($data);
        // dd($schedule);
        if ($schedule) {
            $notification = $this->responseService->success('Schedule', 'Schedule Updated Successfully');
        } else {
            $notification = $this->responseService->error('Schedule', 'Schedule Input Field Required');
        }
        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = $this->scheduleService->delete($id);
        if ($schedule) {
            $notification = $this->responseService->success('Schedule', 'Schedule Deleted Successfully');
        } else {
            $notification = $this->responseService->error('Schedule', 'Schedule Input Field Required');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $schedule = $this->scheduleService->status($id);
        if ($schedule) {
            $notification = $this->responseService->success('Schedule', 'Schedule Status Updated Successfully');
        } else {
            $notification = $this->responseService->error('Schedule', 'System Error');
        }
        return redirect()->back()->with($notification);
    }

}

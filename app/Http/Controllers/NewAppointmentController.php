<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAppointmentRequest;
use App\Http\Requests\OldAppointmentRequest;
use App\Models\Day;
use App\Models\NewAppointment;
use App\Models\Patient;
use App\Models\Schedule;
use App\Services\NewAppointmentService;
use App\Services\ResponseService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Str;

class NewAppointmentController extends Controller
{
    protected $newAppointmentService;
    protected $message;

    public function __construct()
    {
        $this->newAppointmentService = new NewAppointmentService;
        $this->message = new ResponseService;

    }

    public function index()
    {
        $data = $this->newAppointmentService->lists();
        return view('backend.pages.online_appointment.index', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(NewAppointmentRequest $request)
    {
        $data = $request->all();
        $data['today_date'] = Carbon::now()->format('y-m-d');
        $data['code'] = Str::random(7);
        $newAppointment = $this->newAppointmentService->createNewAppointment($data);
        if ($newAppointment) {
            $notification = $this->message->success('Appointment', 'New Appointment Added Successfully ');
        } else {
            $notification = $this->message->error('Appointment', 'Appointment Field Required');
        }
        return redirect()->back()->with($notification);

    }

    public function matchPatientMobile(Request $request)
    {
        $mobile = $request->all();
        $patient = Patient::where('mobile', $mobile)->first();
        return response()->json($patient, 200);
    }

    public function matchAppointmentQuantity(Request $request)
    {
        $date = $request['date'];
        $doctor_id = $request['doctor_id'];
        $dateTime = new DateTime($date);
        $dateToDay = $dateTime->format('l');
        $findDay = Day::where('name', $dateToDay)->first();
        $getDoctor = Schedule::where('doctor_id', $doctor_id)->where('day_id', $findDay->id)->first();
        $doctorAppointmentCount = NewAppointment::where('doctor_id', $doctor_id)->where('date', $date)->count();
        if ($doctorAppointmentCount < $getDoctor->quantity && $getDoctor) {
            echo "OK";
        } else {
            echo "error";
        }
    }

    public function oldAppointmentStore(OldAppointmentRequest $request)
    {
        $data = $request->all();
        $data['today_date'] = Carbon::now()->format('y-m-d');
        // dd($data);
        $appointment = $this->newAppointmentService->createOldAppointment($data);
        if ($appointment) {
            $notification = $this->message->success('Appointment', 'New Appointment Added Successfully ');
        } elseif (null) {
            $notification = $this->message->success('Appointment', 'No Appointment For Today ');
        } else {
            $notification = $this->message->error('Appointment', 'Appointment Field Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewAppointment  $newAppointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->newAppointmentService->view($id);
        return view('backend.pages.online_appointment.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewAppointment  $newAppointment
     * @return \Illuminate\Http\Response
     */
    public function edit(NewAppointment $newAppointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewAppointment  $newAppointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewAppointment $newAppointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewAppointment  $newAppointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewAppointment $newAppointment)
    {
        //
    }
}

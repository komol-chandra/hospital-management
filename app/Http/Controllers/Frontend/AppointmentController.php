<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Services\AppointmentService;
use App\Services\ResponseService;
use Auth;
use Exception;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $appointmentService;
    protected $message;
    public function __construct()
    {
        $this->appointmentService = new AppointmentService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ((Auth::guard('admin')->check())) {
            $departments = $this->appointmentService->getByDepartments();
            $doctors = $this->appointmentService->getByDoctors();
            return view('frontend.pages.appointment.appointment', compact('departments'));
        } else {
            return view('auth-frontend.login');
        }

    }

    public function getDoctorId($id)
    {
        $doctors = Doctor::where('department_id', $id)->get();
        return response()->json($doctors, 200);
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
    public function store(AppointmentRequest $request)
    {
        try {
            $data = $request->all();
            $appointment = $this->appointmentService->create($data);
            if ($appointment) {
                $notification = $this->message->success('Appointment', 'Appointment Added Successfully ');
            } else {
                $notification = $this->message->error('Appointment', 'Appointment Field Required');
            }

        } catch (\Exception $e) {
            $notification = $this->message->error('Test Bill', $e->getMessage());
            // $notification = $this->message->error('Appointment', 'No Appointment for Today');
        }
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
    public function doctorId($id)
    {
        $doctor = Doctor::where('name', $id)->get();
        return response()->json($doctor, 200);
    }
}

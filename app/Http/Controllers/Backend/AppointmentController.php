<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Services\AppointmentService;
use App\Services\ResponseService;
use Carbon\Carbon;
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
    public function index(Request $request)
    {
        $doctors = $this->appointmentService->getByDoctors();
        $today = Carbon::now()->format('Y-m-d');

        if (isset($request->doctor_id)) {
            $data = Appointment::with('users')->where('doctor_id', $request->doctor_id)->where('date', $today)->paginate(5);
        } else {
            $data = Appointment::with('users')->where('date', $today)->paginate(25);
        }

        return view('backend.pages.appointment.index', compact('doctors', 'data'));
    }

    public function status($id)
    {
        $data = $this->appointmentService->status($id);
        if ($data) {
            $notification = $this->message->success('Appointment', ' Done');
        } else {
            $notification = $this->message->error('Appointment', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }
    public function paymentStatus($id)
    {

        $data = $this->appointmentService->payment($id);
        if ($data) {
            $notification = $this->message->success('Appointment', 'Payment Done Successfully ');
        } else {
            $notification = $this->message->error('Appointment', ' System Error');
        }
        return redirect()->back()->with($notification);
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

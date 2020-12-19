<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAppointmentRequest;
use App\Services\NewAppointmentService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class NewAppointmentController extends Controller
{
    protected $newAppointmentService;
    protected $message;

    public function __construct()
    {
        $this->newAppointmentService = new NewAppointmentService;
        $this->message = new ResponseService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(NewAppointmentRequest $request)
    {
        $data = $request->all();
        $newAppointment = $this->newAppointmentService->createOrUpdate($data);
        if ($newAppointment) {
            $notification = $this->message->success('Appointment', 'New Appointment Added Successfully ');
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
    public function show(NewAppointment $newAppointment)
    {
        //
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

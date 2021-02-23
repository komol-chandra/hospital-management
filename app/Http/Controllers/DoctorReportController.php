<?php

namespace App\Http\Controllers;

use App\Models\NewAppointment;
use App\Services\NewAppointmentService;
use App\Services\ResponseService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorReportController extends Controller
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
        return view('backend.pages.doctor-report.index');
    }
    public function search(Request $request)
    {
        if ($request->starting == null && $request->ending == null) {
            return redirect()->back();
        }

        $starting = \Carbon\Carbon::createFromFormat('Y-m-d', $request->starting)->format('Y-m-d');
        $ending = \Carbon\Carbon::createFromFormat('Y-m-d', $request->ending)->format('Y-m-d');
        // dd($ending);
        $appointment = new NewAppointment();
        // $firstDate = $appointment->get()->toArray();
        // dd($firstDate);
        // $firstDate = NewAppointment::where('created_at', $starting)->get();
        // dd($firstDate);
        // $lastDate = $appointment->whereDate('created_at', $ending)->get();
        // dd($lastDate);
        $data = NewAppointment::whereBetween('date', [$starting, $ending])->get();
        return view('backend', compact('data'));

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

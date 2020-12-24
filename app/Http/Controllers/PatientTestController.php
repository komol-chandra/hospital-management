<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientTestRequest;
use App\Models\PatientTest;
use App\Services\PatientTestService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class PatientTestController extends Controller
{
    protected $patientTestService;
    protected $message;
    public function __construct()
    {
        $this->patientTestService = new PatientTestService();
        $this->message = new ResponseService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->patientTestService->lists();
        // dd($data);
        return view('backend.pages.patient-test.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test = $this->patientTestService->getTests();
        $doctor = $this->patientTestService->getDoctors();
        $patient = $this->patientTestService->getPatients();
        return view('backend.pages.patient-test.create', compact('test', 'doctor', 'patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientTestRequest $request)
    {
        $data = $request->all();
        $patientTest = $this->patientTestService->createOrUpdate($data);
        if ($patientTest) {
            $notification = $this->message->success('Patient Test', 'Patient Test Added Successfully');
        } else {
            $notification = $this->message->error('Patient Test', 'Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientTest  $patientTest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->patientTestService->view($id);
        return view('backend.pages.patient-test.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientTest  $patientTest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->patientTestService->getById($id);
        $test = $this->patientTestService->getTests();
        $doctor = $this->patientTestService->getDoctors();
        $patient = $this->patientTestService->getPatients();
        return view('backend.pages.patient-test.edit', compact('data', 'test', 'doctor', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientTest  $patientTest
     * @return \Illuminate\Http\Response
     */
    public function update(PatientTestRequest $request)
    {
        $data = $request->all();
        $patientTest = $this->patientTestService->createOrUpdate($data);
        if ($patientTest) {
            $notification = $this->message->success('Patient Test', 'Patient Test Updated Successfully');
        } else {
            $notification = $this->message->error('Patient Test', 'Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientTest  $patientTest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->patientTestService->delete($id);
        if ($data) {
            $notification = $this->message->success('Patient Test', 'Patient Test Deleted Successfully');
        } else {
            $notification = $this->message->error('Patient Test', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->patientTestService->status($id);
        if ($data) {
            $notification = $this->message->success('Patient Test', 'Patient Test Status Updated Successfully');
        } else {
            $notification = $this->message->error('Patient Test', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}

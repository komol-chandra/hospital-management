<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use App\Services\PatientService;
use App\Services\ResponseService;
use App\Traits\FileUpload;
use Str;

class PatientController extends Controller
{
    use FileUpload;
    protected $patientService;
    protected $message;
    public function __construct()
    {
        $this->patientService = new PatientService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = $this->patientService->lists();
        return view('backend.pages.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bloods = $this->patientService->getBloods();
        return view('backend.pages.patient.create', compact('bloods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $data = $request->all();
        $data['code'] = Str::random(7);
        if ($request->hasFile('picture')) {
            $data['picture'] = $this->ImageUpload($request, 'picture', 'patient/', 'patient_');
        }
        $patient = $this->patientService->createOrUpdate($data);
        if ($patient) {
            $notification = $this->message->success('Patient', 'Patient Added Successfully ');
        } else {
            $notification = $this->message->error('Patient', 'Patient Field Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = $this->patientService->getById($id);
        $bloods = $this->patientService->getBloods();
        return view('backend.pages.patient.edit', compact('patient', 'bloods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $data['picture'] = $this->ImageUpload($request, 'picture', 'patient/', 'patient_');
        }
        $patient = $this->patientService->createOrUpdate($data);
        if ($patient) {
            $notification = $this->message->success('Patient', 'Patient Updated Successfully');
        } else {
            $notification = $this->message->success('Patient', 'Patient Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = $this->patientService->delete($id);
        if ($patient) {
            $notification = $this->message->success('Patient', 'Patient Deleted Successfully');
        } else {
            $notification = $this->message->error('Patient', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $patient = $this->patientService->status($id);
        if ($patient) {
            $notification = $this->message->success('Patient', 'Patient Status Successfully');
        } else {
            $notification = $this->message->error('Patient', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }
}

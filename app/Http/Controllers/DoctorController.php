<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Blood;
use App\Models\Doctor;
use App\Models\DoctorDepartment;
use App\Services\DoctorService;
use App\Services\ResponseService;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use FileUpload;
    protected $doctorService;
    protected $responseService;
    public function __construct()
    {
        $this->doctorService = new DoctorService;
        $this->responseService = new ResponseService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = $this->doctorService->lists();
        // $doctors = Doctor::with('departments')->orderBy('id', 'DESC')->get();
        // dd($doctors);
        return view('backend.pages.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = DoctorDepartment::where('status', '1')->pluck('name', 'id');
        $bloods = Blood::all()->pluck('name', 'id');
        return view('backend.pages.doctor.create', compact('bloods', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $data['picture'] = $this->ImageUpload($request, 'picture', 'doctor/', 'doctor_');
        }
        $doctor = $this->doctorService->createOrUpdate($data);
        if ($doctor) {
            $notification = $this->responseService->success('Doctor', 'Doctor Added Successfully');
        } else {
            $notification = $this->responseService->error('Doctor', 'Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = $this->doctorService->getById($id);
        $departments = $this->doctorService->getDeterment();
        $bloods = $this->doctorService->getBloods();
        return view('backend.pages.doctor.view', compact('doctor', 'departments', 'bloods'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = $this->doctorService->getById($id);
        $departments = $this->doctorService->getDeterment();
        $bloods = $this->doctorService->getBloods();
        return view('backend.pages.doctor.edit', compact('doctor', 'departments', 'bloods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request)
    {
        $validatedData = $request->all();
        if ($request->hasFile('picture')) {
            $validatedData['picture'] = $this->ImageUpload($request, 'picture', 'doctor/', 'doctor_');
        }
        $doctor = $this->doctorService->createOrUpdate($validatedData);
        if ($doctor) {
            $notification = $this->responseService->success('Doctor', 'Doctor Updated Successfully');
        } else {
            $notification = $this->responseService->error('Doctor', 'Input field Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = $this->doctorService->delete($id);
        if ($doctor) {
            $notification = $this->responseService->success('Doctor', 'Doctor Deleted Successfully');
        } else {
            $notification = $this->responseService->error('Doctor', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }

    public function status($id)
    {
        $doctor = $this->doctorService->status($id);
        if ($doctor) {
            $notification = $this->responseService->success('Doctor', 'Doctor Status Successfully');
        } else {
            $notification = $this->responseService->error('Doctor', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }
}

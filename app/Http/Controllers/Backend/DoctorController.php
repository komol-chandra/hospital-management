<?php

namespace App\Http\Controllers\Backend;

use App\Exports\DoctorExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\DoctorUpdateRequest;
use App\Models\Blood;
use App\Models\Doctor;
use App\Models\DoctorDepartment;
use App\Services\DoctorService;
use App\Services\ResponseService;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class DoctorController extends Controller
{
    use FileUpload;
    protected $doctorService;
    protected $responseService;
    protected $excel;
    public function __construct(Excel $excel)
    {
        $this->doctorService = new DoctorService;
        $this->responseService = new ResponseService;
        $this->excel = $excel;
    }
    public function doctorExcel()
    {
        return $this->excel->download(new DoctorExport, 'doctors.xlsx', Excel::XLSX);
    }
    public function doctorPdf()
    {
        return $this->excel->download(new DoctorExport, 'doctors.pdf', Excel::DOMPDF);
    }
    public function downloadCVS()
    {
        return $this->excel->download(new DoctorExport, 'doctors.csv', Excel::CSV);
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
            $data['picture'] = $this->ImageUpload($request, 'picture', 'frontend-user/', 'user_');
        }
        $doctor = $this->doctorService->create($data);
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
        // dd($doctor->toArray());
        $departments = $this->doctorService->getDeterment();
        $bloods = $this->doctorService->getBloods();
        $user = $this->doctorService->getUserById($id);
        return view('backend.pages.doctor.view', compact('doctor', 'departments', 'bloods', 'user'));
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
        $user = $this->doctorService->getUserById($id);
        return view('backend.pages.doctor.edit', compact('doctor', 'departments', 'bloods', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorUpdateRequest $request, $id)
    {
        $validatedData = $request->all();
        // dd($validatedData);
        if ($request->hasFile('picture')) {
            $validatedData['picture'] = $this->ImageUpload($request, 'picture', 'frontend-user/', 'user_');
        }
        $doctor = $this->doctorService->update($validatedData, $id);
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

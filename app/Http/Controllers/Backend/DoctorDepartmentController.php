<?php
namespace App\Http\Controllers\Backend;

use App\Exports\DoctorDepartmentExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorDepartmentRequest;
use App\Models\DoctorDepartment;
use App\Services\DoctorDepartmentService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class DoctorDepartmentController extends Controller
{
    protected $doctorDepartmentService;
    protected $responseService;
    protected $excel;
    public function __construct(Excel $excel)
    {
        $this->doctorDepartmentService = new DoctorDepartmentService;
        $this->responseService = new ResponseService;
        $this->excel = $excel;
    }
    public function downloadExcel()
    {
        return $this->excel->download(new DoctorDepartmentExport, 'departments.xlsx', Excel::XLSX);
    }
    public function downloadPdf()
    {
        return $this->excel->download(new DoctorDepartmentExport, 'departments.pdf', Excel::DOMPDF);
    }
    public function downloadCVS()
    {
        return $this->excel->download(new DoctorDepartmentExport, 'departments.csv', Excel::CSV);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->doctorDepartmentService->lists();
        return view('backend.pages.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorDepartmentRequest $request)
    {
        $value = $request->all();
        $data = $this->doctorDepartmentService->createOrUpdate($value);
        if ($data) {
            $notification = $this->responseService->success('Department', 'Department  Added Successfully');
        } else {
            $notification = $this->responseService->error('Department', 'Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorDepartment  $doctorDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorDepartment $doctorDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorDepartment  $doctorDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = $this->doctorDepartmentService->getById($id);
        return view('backend.pages.department.edit', compact('department'));

    }
    public function status($id)
    {
        $data = $this->doctorDepartmentService->status($id);
        if ($data) {
            $notification = $this->responseService->success('Department', 'Department Status Updated Successfully');
        } else {
            $notification = $this->responseService->error('Department', 'System Error');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorDepartment  $doctorDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorDepartmentRequest $request)
    {
        $validatedData = $request->all();
        $department = $this->doctorDepartmentService->createOrUpdate($validatedData);
        if ($department) {
            $notification = $this->responseService->success('Department', 'Department  Updated Successfully');
        } else {
            $notification = $this->responseService->error('Department', 'Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorDepartment  $doctorDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = $this->doctorDepartmentService->delete($id);
        if ($department) {
            $notification = $this->responseService->success('Department', 'Department  Deleted Successfully');
        } else {
            $notification = $this->responseService->error('Department', 'System Error');
        }
        return redirect()->back()->with($notification);

    }

}

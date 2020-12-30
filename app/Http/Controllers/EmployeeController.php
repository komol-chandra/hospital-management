<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Services\EmployeeService;
use App\Services\ResponseService;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use FileUpload;
    protected $employeeService;
    protected $message;
    public function __construct()
    {
        $this->employeeService = new EmployeeService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->employeeService->lists();
        return view('backend.pages.employee.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bloods = $this->employeeService->getBloods();
        $getEmployeeRoll = $this->employeeService->getEmployeeRoll();
        return view('backend.pages.employee.create', compact('bloods', 'getEmployeeRoll'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $value = $request->all();
        if ($request->hasFile('picture')) {
            $value['picture'] = $this->ImageUpload($request, 'picture', 'employee/', 'employee_');
        }
        $data = $this->employeeService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('employee', 'employee Added Successfully ');
        } else {
            $notification = $this->message->error('employee', 'employee Field Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bloods = $this->employeeService->getBloods();
        $data = $this->employeeService->getById($id);
        $getEmployeeRoll = $this->employeeService->getEmployeeRoll();
        return view('backend.pages.employee.edit', compact('bloods', 'data', 'getEmployeeRoll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request)
    {
        $value = $request->all();
        if ($request->hasFile('picture')) {
            $value['picture'] = $this->ImageUpload($request, 'picture', 'employee/', 'employee_');
        }
        $data = $this->employeeService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('employee', 'employee Updated Successfully ');
        } else {
            $notification = $this->message->error('employee', 'employee Field Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->employeeService->delete($id);
        if ($data) {
            $notification = $this->message->success('Employee', 'Employee Deleted Successfully');
        } else {
            $notification = $this->message->error('Employee', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->employeeService->status($id);
        if ($data) {
            $notification = $this->message->success('Employee', 'Employee Status Successfully');
        } else {
            $notification = $this->message->error('Employee', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }
}

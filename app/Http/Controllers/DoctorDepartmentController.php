<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorDepartmentRequest;
use App\Models\DoctorDepartment;
use App\Services\DoctorDepartmentService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class DoctorDepartmentController extends Controller
{
    protected $doctorDepartmentService;
    protected $responseService;
    public function __construct()
    {
        $this->doctorDepartmentService = new DoctorDepartmentService;
        $this->responseService = new ResponseService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->doctorDepartmentService->lists();
        // dd($departments);
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
        $data = $request->all();
        $department = $this->doctorDepartmentService->createOrUpdate($data);
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
        // dd($id);
        $department = $this->doctorDepartmentService->status($id);
        if (is_null($department) === false) {
            // $message = ["Department has been successfully created"];
            $notification = [
                'title'      => 'Department',
                'message'    => 'Department Status Updated Successfully!',
                'alert-type' => 'success',
            ];
        } else {
            // $message = ["Department has not created", "error"];
            $notification = [
                'title'      => 'Department',
                'message'    => 'Department Field Required!',
                'alert-type' => 'error',
            ];
        }

        // session()->flash("message", $notification);
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
        // dd($validatedData);

        $department = $this->doctorDepartmentService->createOrUpdate($validatedData);
        if (is_null($department) === false) {
            // $message = ["Department has been successfully created"];
            $notification = [
                'title'      => 'Department',
                'message'    => 'Department Updated Successfully!',
                'alert-type' => 'success',
            ];
        } else {
            // $message = ["Department has not created", "error"];
            $notification = [
                'title'      => 'Department',
                'message'    => 'Department Field Required!',
                'alert-type' => 'error',
            ];
        }

        // session()->flash("message", $notification);
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
        //  dd($id);
        // $department = $this->doctorDepartmentService->getById($id);
        // dd($department);
        $department = $this->doctorDepartmentService->delete($id);
        if (is_null($department) === false) {
            // $message = ["Department has been successfully created"];
            $notification = [
                'title'      => 'Department',
                'message'    => 'Department Deleted Successfully!',
                'alert-type' => 'success',
            ];
        } else {
            // $message = ["Department has not created", "error"];
            $notification = [
                'title'      => 'Department',
                'message'    => 'System Error!',
                'alert-type' => 'error',
            ];
        }

        // session()->flash("message", $notification);
        return redirect()->back()->with($notification);

    }
}

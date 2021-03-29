<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRollRequest;
use App\Models\EmployeeRoll;
use App\Services\EmployeeRollService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class EmployeeRollController extends Controller
{
    protected $employeeRollService;
    protected $message;
    public function __construct()
    {
        $this->employeeRollService = new EmployeeRollService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->employeeRollService->lists();
        return view('backend.pages.employee-roll.index', compact('data'));
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
    public function store(EmployeeRollRequest $request)
    {
        $data = $request->all();
        $medicine = $this->employeeRollService->createOrUpdate($data);
        if ($medicine) {
            $notification = $this->message->success('Employee Type', 'Employee Type Insert Successfully');
        } else {
            $notification = $this->message->error('Employee Type', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeRoll  $employeeRoll
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeRoll $employeeRoll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeRoll  $employeeRoll
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->employeeRollService->getById($id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeRoll  $employeeRoll
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRollRequest $request)
    {
        $data = $request->all();
        $medicine = $this->employeeRollService->createOrUpdate($data);
        if ($medicine) {
            $notification = $this->message->success('Employee Type', 'Employee Type Updated Successfully');
        } else {
            $notification = $this->message->error('Employee Type', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }
    public function destroy($id)
    {
        $data = $this->employeeRollService->delete($id);
        if ($data) {
            $notification = $this->message->success('Employee Type', 'Employee Type Deleted Successfully');
        } else {
            $notification = $this->message->error('Employee Type', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->employeeRollService->status($id);
        if ($data) {
            $notification = $this->message->success('Employee Type', 'Employee Type Status change Successfully');
        } else {
            $notification = $this->message->error('Employee Type', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}

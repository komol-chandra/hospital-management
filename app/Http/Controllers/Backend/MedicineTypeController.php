<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicineTypeRequest;
use App\Models\MedicineType;
use App\Services\MedicineTypeService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class MedicineTypeController extends Controller
{
    protected $medicineTypeService;
    protected $message;
    public function __construct()
    {
        $this->medicineTypeService = new MedicineTypeService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->medicineTypeService->lists();
        return view('backend.pages.medicine-type.index', compact('data'));
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
    public function store(MedicineTypeRequest $request)
    {
        $data = $request->all();
        $medicine = $this->medicineTypeService->createOrUpdate($data);
        if ($medicine) {
            $notification = $this->message->success('Medicine Type', 'Medicine Type Insert Successfully');
        } else {
            $notification = $this->message->error('Medicine Type', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicineType  $medicineType
     * @return \Illuminate\Http\Response
     */
    public function show(MedicineType $medicineType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicineType  $medicineType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->medicineTypeService->getById($id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicineType  $medicineType
     * @return \Illuminate\Http\Response
     */
    public function update(MedicineTypeRequest $request)
    {
        $data = $request->all();
        $medicine = $this->medicineTypeService->createOrUpdate($data);
        if ($medicine) {
            $notification = $this->message->success('Medicine Type', 'Medicine Type Updated Successfully');
        } else {
            $notification = $this->message->error('Medicine Type', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicineType  $medicineType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->medicineTypeService->delete($id);
        if ($data) {
            $notification = $this->message->success('Medicine Type', 'Medicine Type Deleted Successfully');
        } else {
            $notification = $this->message->error('Medicine Type', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->medicineTypeService->status($id);
        if ($data) {
            $notification = $this->message->success('Medicine Type', 'Medicine Type Status change Successfully');
        } else {
            $notification = $this->message->error('Medicine Type', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}

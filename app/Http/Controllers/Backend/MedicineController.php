<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicineRequest;
use App\Http\Requests\MedicineUpdateRequest;
use App\Models\Medicine;
use App\Services\MedicineService;
use App\Services\ResponseService;
use App\Traits\FileUpload;
use Str;

class MedicineController extends Controller
{
    use FileUpload;
    protected $medicineService;
    protected $massage;
    public function __construct()
    {
        $this->medicineService = new MedicineService;
        $this->massage = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->medicineService->lists();
        return view('backend.pages.medicine.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getMedicineType = $this->medicineService->getMedicineType();
        $getUnitType = $this->medicineService->getUnitType();
        $getGeneric = $this->medicineService->getGeneric();
        $getManufacturer = $this->medicineService->getManufacturer();
        return view('backend.pages.medicine.create', compact('getMedicineType', 'getUnitType', 'getGeneric', 'getManufacturer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicineRequest $request)
    {
        $data = $request->all();
        $data['sku'] = Str::random(7);
        if ($request->hasFile('picture')) {
            $data['picture'] = $this->ImageUpload($request, 'picture', 'medicine/', 'medicine_');
        }
        $medicine = $this->medicineService->createOrUpdate($data);
        if ($medicine) {
            $notification = $this->massage->success('medicine', 'medicine Added Successfully ');
        } else {
            $notification = $this->massage->error('medicine', 'medicine Field Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->medicineService->getById($id);
        $getMedicineType = $this->medicineService->getMedicineType();
        $getGeneric = $this->medicineService->getGeneric();
        $getManufacturer = $this->medicineService->getManufacturer();
        return view('backend.pages.medicine.edit', compact('data', 'getMedicineType', 'getGeneric', 'getManufacturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(MedicineUpdateRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $data['picture'] = $this->ImageUpload($request, 'picture', 'medicine/', 'medicine_');
        }
        $medicine = $this->medicineService->createOrUpdate($data);
        if ($medicine) {
            $notification = $this->massage->success('medicine', 'medicine Updated Successfully ');
        } else {
            $notification = $this->massage->error('medicine', 'medicine Field Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->medicineService->delete($id);
        if ($data) {
            $notification = $this->massage->success('Medicine', 'Medicine Deleted Successfully');
        } else {
            $notification = $this->massage->error('Medicine', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->medicineService->status($id);
        if ($data) {
            $notification = $this->massage->success('Medicine', 'Medicine Status Updated Successfully');
        } else {
            $notification = $this->massage->error('Medicine', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}

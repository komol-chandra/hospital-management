<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacturerRequest;
use App\Models\Manufacturer;
use App\Services\ManufacturerService;
use App\Services\ResponseService;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    use FileUpload;
    protected $manufacturerService;
    protected $massage;
    public function __construct()
    {
        $this->manufacturerService = new ManufacturerService();
        $this->massage = new ResponseService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->manufacturerService->lists();
        return view('backend.pages.manufacturer.index', compact('data'));
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
    public function store(ManufacturerRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $data['picture'] = $this->ImageUpload($request, 'picture', 'manufacturer/', 'manufacturer_');
        }
        $manufacturer = $this->manufacturerService->createOrUpdate($data);
        if ($manufacturer) {
            $notification = $this->massage->success('manufacturer', 'manufacturer Added Successfully');
        } else {
            $notification = $this->massage->error('manufacturer', 'Input Filed Required');
        }
        $status = 201;
        return response()->json($notification, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->manufacturerService->getById($id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(ManufacturerRequest $request)
    {
        $data = $request->all();
        // dd($data);
        if ($request->hasFile('picture')) {
            $data['picture'] = $this->ImageUpload($request, 'picture', 'manufacturer/', 'manufacturer_');
        }
        $manufacturer = $this->manufacturerService->createOrUpdate($data);
        if ($manufacturer) {
            $notification = $this->massage->success('manufacturer', 'manufacturer Updated Successfully');
        } else {
            $notification = $this->massage->error('manufacturer', 'Input Filed Required');
        }
        $status = 201;
        return response()->json($notification, $status);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->manufacturerService->delete($id);
        if ($data) {
            $notification = $this->massage->success('Manufacturer', 'Manufacturer Deleted Successfully');
        } else {
            $notification = $this->massage->error('Manufacturer', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->manufacturerService->status($id);
        if ($data) {
            $notification = $this->massage->success('Manufacturer', 'Manufacturer Status Updated Successfully');
        } else {
            $notification = $this->massage->error('Manufacturer', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }
}

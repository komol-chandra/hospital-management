<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Services\BillingService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $billingService;
    protected $message;
    public function __construct()
    {
        $this->billingService = new BillingService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->billingService->lists();
        return view('backend.pages.service.index', compact('data'));
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
    public function store(ServiceRequest $request)
    {
        $value = $request->all();
        $data = $this->billingService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('Service', 'Service Insert Successfully');
        } else {
            $notification = $this->message->error('Service', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->billingService->getById($id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request)
    {
        $value = $request->all();
        $data = $this->billingService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('Service', 'Service Updated Successfully');
        } else {
            $notification = $this->message->error('Service', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->billingService->delete($id);
        if ($data) {
            $notification = $this->message->success('Service', 'Service Deleted Successfully');
        } else {
            $notification = $this->message->error('Service', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->billingService->status($id);
        if ($data) {
            $notification = $this->message->success('Service', 'Service Status Updated Successfully');
        } else {
            $notification = $this->message->error('Service', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}

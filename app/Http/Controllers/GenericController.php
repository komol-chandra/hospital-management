<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenericRequest;
use App\Models\Generic;
use App\Services\GenericService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class GenericController extends Controller
{
    protected $genericService;
    protected $message;
    public function __construct()
    {
        $this->genericService = new GenericService;
        $this->message = new ResponseService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->genericService->lists();
        return view('backend.pages.generic.index', compact('data'));
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
    public function store(GenericRequest $request)
    {
        $data = $request->all();
        $generic = $this->genericService->createOrUpdate($data);
        if ($generic) {
            $notification = $this->message->success('Generic', 'Generic  Insert Successfully');
        } else {
            $notification = $this->message->error('Generic ', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Generic  $generic
     * @return \Illuminate\Http\Response
     */
    public function show(Generic $generic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Generic  $generic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->genericService->getById($id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Generic  $generic
     * @return \Illuminate\Http\Response
     */
    public function update(GenericRequest $request)
    {
        $data = $request->all();
        $generic = $this->genericService->createOrUpdate($data);
        if ($generic) {
            $notification = $this->message->success('Generic', 'Generic  Updated Successfully');
        } else {
            $notification = $this->message->error('Generic ', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Generic  $generic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->genericService->delete($id);
        if ($data) {
            $notification = $this->message->success('Generic ', 'Generic  Deleted Successfully');
        } else {
            $notification = $this->message->error('Generic ', 'System Error');
        }
        return redirect()->back()->with($notification);

    }
    public function status($id)
    {
        $data = $this->genericService->status($id);
        if ($data) {
            $notification = $this->message->success('Generic ', 'Generic  Status change Successfully');
        } else {
            $notification = $this->message->error('Generic ', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}

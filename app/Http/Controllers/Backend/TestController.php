<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestRequest;
use App\Models\Test;
use App\Services\ResponseService;
use App\Services\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $testService;
    protected $message;
    public function __construct()
    {
        $this->testService = new TestService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->testService->lists();
        return view('backend.pages.test.index', compact('data'));
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
    public function store(TestRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $test = $this->testService->createOrUpdate($data);
        if ($test) {
            $notification = $this->message->success('Test', 'Test Added Successfully');
        } else {
            $notification = $this->message->error('Test', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->testService->getById($id);
        return response()->json($data, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(TestRequest $request)
    {
        $data = $request->all();
        $test = $this->testService->createOrUpdate($data);
        if ($test) {
            $notification = $this->message->success('Test', 'Test Updated Successfully');
        } else {
            $notification = $this->message->error('Test', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->testService->delete($id);
        if ($data) {
            $notification = $this->message->success('Test', 'Test Deleted Successfully');
        } else {
            $notification = $this->message->error('Test', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->testService->status($id);
        if ($data) {
            $notification = $this->message->success('Test', 'Test Status Change Successfully');
        } else {
            $notification = $this->message->error('Test', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}

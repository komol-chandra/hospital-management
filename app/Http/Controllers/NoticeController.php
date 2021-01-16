<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use App\Services\NoticeService;
use App\Services\ResponseService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    protected $noticeService;
    protected $message;
    public function __construct()
    {
        $this->noticeService = new NoticeService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->noticeService->lists();
        return view('backend.pages.notice.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request)
    {
        // dd($request->all());
        $data = $request->all();
        $data['today_date'] = Carbon::now()->format('y-m-d');
        $data['today_time'] = Carbon::now()->toTimeString();
        $value = $this->noticeService->createOrUpdate($data);
        if ($value) {
            $notification = $this->message->success('notice', 'notice Added Successfully');
        } else {
            $notification = $this->message->error('notice', 'Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->noticeService->getById($id);
        return view('backend.pages.notice.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->noticeService->getById($id);
        return view('backend.pages.notice.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(NoticeRequest $request)
    {
        $data = $request->all();
        $value = $this->noticeService->createOrUpdate($data);
        if ($value) {
            $notification = $this->message->success('notice', 'notice Updated Successfully');
        } else {
            $notification = $this->message->error('notice', 'Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->noticeService->delete($id);
        if ($data) {
            $notification = $this->message->success('notice', 'notice Deleted Successfully');
        } else {
            $notification = $this->message->error('notice', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->noticeService->status($id);
        if ($data) {
            $notification = $this->message->success('notice', 'notice Status Updated Successfully');
        } else {
            $notification = $this->message->error('notice', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}

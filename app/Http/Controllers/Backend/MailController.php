<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use App\Services\mailService;
use App\Services\ResponseService;
use App\Traits\FileUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MailController extends Controller
{
    use FileUpload;
    protected $message;
    protected $mailService;
    public function __construct()
    {
        $this->message = new ResponseService;
        $this->mailService = new mailService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->mailService->lists();
        return view('backend.pages.mail.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.mail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = $request->all();
        $value['today_date'] = Carbon::now()->format('y-m-d');
        $value['today_time'] = Carbon::now()->toTimeString();
        if ($request->hasFile('file')) {
            $value['file'] = $this->ImageUpload($request, 'file', 'mail/', 'mail_');
        }
        $data = $this->mailService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('Mail', 'Mail Added Successfully');
        } else {
            $notification = $this->message->error('Mail', 'Input Filed Required');
        }
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->mailService->delete($id);
        if ($data) {
            $notification = $this->message->success('Mail', 'Mail Deleted Successfully');
        } else {
            $notification = $this->message->error('Mail', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}

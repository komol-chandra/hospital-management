<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Services\ResponseService;
use App\Services\SettingService;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use FileUpload;
    protected $settingService;
    protected $message;
    public function __construct()
    {
        $this->settingService = new SettingService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->settingService->getData();
        return view('backend.pages.setting.setting', compact('data'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('favicon')) {
            $data['favicon'] = $this->ImageUpload($request, 'favicon', 'setting/', 'favicon_');
        }
        if ($request->hasFile('small_logo')) {
            $data['small_logo'] = $this->ImageUpload($request, 'small_logo', 'setting/', 'small_logo_');
        }
        if ($request->hasFile('logo')) {
            $data['logo'] = $this->ImageUpload($request, 'logo', 'setting/', 'logo_');
        }
        if ($request->hasFile('white_logo')) {
            $data['white_logo'] = $this->ImageUpload($request, 'white_logo', 'setting/', 'white_logo');
        }
        $patient = $this->settingService->createOrUpdate($data);
        if ($patient) {
            $notification = $this->message->success('Settings', 'Settings Updated Successfully');
        } else {
            $notification = $this->message->success('Settings', 'Settings Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}

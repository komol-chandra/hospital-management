<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ProfileService;
use App\Services\ResponseService;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use FileUpload;
    protected $message;
    protected $profileService;
    public function __construct()
    {
        $this->message = new ResponseService;
        $this->profileService = new ProfileService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->profileService->getAuth();
        return view('backend.pages.profile.profile', compact('data'));
    }
    public function password()
    {
        return view('backend.pages.profile.password');
    }
    public function matchPassword(Request $request)
    {
        $password = $request->currentPassword;
        $match = Hash::check($password, Auth::user()->password);
        if ($match) {
            echo "matched";
        } else {
            echo "error";
        }
    }
    public function changePassword(Request $request)
    {
        $data = [
            'password' => Hash::make($request->retype_password),
        ];
        $password = User::where('id', Auth::user()->id)->update($data);
        if ($password) {
            $notification = $this->message->success('Password', 'Password Updated Successfully');
        } else {
            $notification = $this->message->error('Password', 'Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->profileService->getAuth();
        return view('backend.pages.profile.change-profile', compact('data'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $value = $request->all();
        if ($request->hasFile('picture')) {
            $value['picture'] = $this->ImageUpload($request, 'picture', 'user/', 'user_');
        }
        $data = $this->profileService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('Profile', 'Profile Updated Successfully');
        } else {
            $notification = $this->message->error('Profile', 'Input field Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

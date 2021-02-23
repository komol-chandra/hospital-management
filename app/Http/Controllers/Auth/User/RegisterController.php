<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontendUserRequest;
use App\Services\Auth\Frontend\FrontendAuthService;
use App\Services\ResponseService;
use Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $responseService;
    protected $frontendAuthService;
    public function __construct()
    {
        $this->responseService = new ResponseService;
        $this->frontendAuthService = new FrontendAuthService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth-frontend.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function matchPassword(Request $request)
    {
        $password = $request->password;
        $passwordAgain = $request->password_confirmation;
        $match = ($password == $passwordAgain);
        if ($match) {
            echo "matched";
        } else {
            echo "error";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FrontendUserRequest $request)
    {
        $data = $request->all();
        $success = $this->frontendAuthService->create($data);
        if ($success) {
            $notification = $this->responseService->success('Patient', 'Patient Created Successfully');
        } else {
            $notification = $this->responseService->error('Patient', 'Input field Required');
        }
        return redirect("/user/login-view")->with($notification);
    }

    public function loginView()
    {
        return view('auth-frontend.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
        ];
        $remember = isset($input['remember']) ? $request->input('remember') : false;
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $notification = $this->responseService->success('User', 'User Login Successfully');
            return redirect("/")->with($notification);
        } else {
            $notification = $this->responseService->error('User', 'Login Failed');
            return redirect("/user/login-view")->with($notification);
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $notification = [
            'messege'    => 'Logout Successfully',
            'alert-type' => 'success',
        ];
        return redirect('/')->with($notification);
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
    public function update(Request $request, $id)
    {
        //
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

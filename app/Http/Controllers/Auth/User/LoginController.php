<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontendUserRequest;

class LoginController extends Controller
{
    public function registerForm()
    {
        return view('auth-frontend.register');
    }
    public function register(FrontendUserRequest $request)
    {
        $data = $request->all();
        dd($data);
    }
}

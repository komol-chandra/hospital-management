<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }
    public function login()
    {
        return view('auth.login');
    }
}

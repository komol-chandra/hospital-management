<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Services\FrontendService;

class FrontendController extends Controller
{
    protected $frontendService;
    public function __construct()
    {
        $this->frontendService = new FrontendService;
    }
    public function index()
    {
        $data = $this->frontendService->getLimitedDoctors();
        return view('frontend.dashboard', compact('data'));
    }
    public function appointment()
    {
        $departments = $this->frontendService->Department();
        $doctors = $this->frontendService->Doctor();
        return view('frontend.pages.appointment.appointment', compact('departments', 'doctors'));
    }
    public function getActiveDoctors()
    {
        $data = $this->frontendService->getActiveDoctors();
        return view('frontend.pages.doctors', compact('data'));
    }
    public function doctorId($id)
    {
        $doctors = Doctor::where('department', $id)->get();
        return response()->json($doctors, 200);
    }

}

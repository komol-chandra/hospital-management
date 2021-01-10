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
        $days = $this->frontendService->Days();
        return view('frontend.pages.appointment.appointment', compact('departments', 'doctors', 'days'));
    }
    public function getActiveDoctors()
    {
        $data = $this->frontendService->getActiveDoctors();
        return view('frontend.pages.doctors', compact('data'));
    }
    public function doctorView($id)
    {
        $doctor = $this->frontendService->getByDoctorId($id);
        $schedules = $this->frontendService->getByScheduleId($id);
        // dd($schedules);
        return view('frontend.pages.doctorView', compact('doctor', 'schedules'));
    }
    public function doctorId($id)
    {
        $doctors = Doctor::where('department_id', $id)->get();
        return response()->json($doctors, 200);
    }
    public function doctorId2($id)
    {
        $doctors = Doctor::where('department_id', $id)->get();
        return response()->json($doctors, 200);
    }

}

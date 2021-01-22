<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Employee;
use App\Models\NewAppointment;
use App\Models\Notice;
use App\Models\Patient;
use App\Models\Prescription;
use Carbon\Carbon;

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
    public function percentage()
    {
        $firstDay = Carbon::now()->startOfMonth()->toDateString();
        $toDay = Carbon::now()->toDateString();
        $patient = Patient::where('status', '1')->whereBetween('today_date', [$firstDay, $toDay])->count();
        $appointment = NewAppointment::whereBetween('today_date', [$firstDay, $toDay])->count();
        $prescription = Prescription::where('status', '1')->whereBetween('today_date', [$firstDay, $toDay])->count();
        $data['label'] = ['Patient', "appointment", "prescription"];
        $data['value'] = [$patient, $appointment, $prescription];
        return response()->json($data);

    }
    public function counters()
    {
        $data['doctors'] = Doctor::where('status', '1')->count();
        $data['patients'] = Patient::where('status', '1')->count();
        $data['admins'] = Employee::where('roll_id', '1')->where('status', '1')->count();
        $data['accountants'] = Employee::where('roll_id', '2')->where('status', '1')->get()->count();
        $data['nurses'] = Employee::where('roll_id', '3')->get()->count();
        $data['laboratorian'] = Employee::where('roll_id', '4')->where('status', '1')->count();
        $data['pharmacists'] = Employee::where('roll_id', '5')->where('status', '1')->count();
        $data['receptionists'] = Employee::where('roll_id', '6')->where('status', '1')->count();
        $data['representatives'] = Employee::where('roll_id', '7')->where('status', '1')->count();
        $data['caseManager'] = Employee::where('roll_id', '8')->where('status', '1')->count();
        return response()->json($data);
    }
    public function topDoctors()
    {
        // $data['topDoctors']= NewAppointment::where()
    }
    public function notices()
    {
        $firstDay = Carbon::now()->startOfMonth()->toDateString();
        $toDay = Carbon::now()->toDateString();
        $notices = Notice::where('status', '1')->whereBetween('today_date', [$firstDay, $toDay])->get();
        return view('backend.notice', compact('notices'));

    }
}

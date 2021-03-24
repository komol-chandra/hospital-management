<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\FrontendUser;
use App\Models\Notice;
use App\Models\Prescription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

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
        $firstDay = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $toDay = Carbon::now()->format('Y-m-d H:i:s');
        $first = Carbon::now()->startOfMonth()->toDateString();
        $last = Carbon::now()->toDateString();
        $patient = FrontendUser::where('type', 'patient')->whereBetween('created_at', [$firstDay, $toDay])->count();
        $appointment = Appointment::whereBetween('date', [$first, $last])->count();
        $prescription = Prescription::where('status', '1')->whereBetween('today_date', [$first, $last])->count();
        $data['label'] = ['Patient', "Appointment", "Prescription"];
        $data['value'] = [$patient, $appointment, $prescription];
        return response()->json($data);

    }
    public function counters()
    {
        $data['doctors'] = Doctor::where('status', '1')->count();
        $data['patients'] = FrontendUser::where('type', 'patient')->count();
        $data['admins'] = User::where('type', 'admin')->where('status', '1')->count();
        $data['accountants'] = User::where('type', 'Accountant')->where('status', '1')->count();
        $data['nurses'] = User::where('type', 'Nurse')->where('status', '1')->count();
        $data['laboratorian'] = User::where('type', 'Laboratorian')->where('status', '1')->count();
        $data['pharmacists'] = User::where('type', 'Pharmacist')->where('status', '1')->count();
        $data['receptionists'] = User::where('type', 'Receptionist')->where('status', '1')->count();
        $data['representatives'] = User::where('type', 'Representative')->where('status', '1')->count();
        $data['caseManager'] = User::where('type', 'Case Manager')->where('status', '1')->count();
        return response()->json($data);
    }
    public function notices()
    {
        $firstDay = Carbon::now()->startOfMonth()->toDateString();
        $toDay = Carbon::now()->toDateString();
        $notices = Notice::where('status', '1')->whereBetween('today_date', [$firstDay, $toDay])->get();
        return view('backend.notice', compact('notices'));

    }
    public function topDoctors()
    {
        $now = Carbon::now();
        $start = $now->firstOfMonth()->format('Y-m-d');
        $end = Carbon::now()->format('Y-m-d');
        $datas = Doctor::withCount(['appointments' => function (Builder $query) use ($start, $end) {
            $query->whereBetween('date', [$start, $end]);
        }])->limit(8)->get();
        $data = Doctor::withCount(['appointments' => function (Builder $query) use ($start, $end) {
            $query->whereBetween('date', [$start, $end]);
        }])->limit(8)->get()->map(function ($value) {
            return [
                'name'               => $value->full_name,
                'appointments_count' => $value->appointments_count,
            ];
        });
        $doctor['name'] = $data->pluck('name');
        $doctor['appointments_count'] = $data->pluck('appointments_count');
        // dd($doctor);

        return response()->json($doctor);

    }
}

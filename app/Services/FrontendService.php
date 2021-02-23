<?php
namespace App\Services;

use App\Models\Day;
use App\Models\Doctor;
use App\Models\DoctorDepartment;
use App\Models\Schedule;

class FrontendService
{
    public function getActiveDoctors()
    {
        return Doctor::with('users', 'departments')->where('status', '1')->orderBy('id', 'DESC')->paginate(4);
    }

    public function getByDoctorId($id)
    {
        $doctor = Doctor::with('users')->findOrFail($id);
        // $user = FrontendUser::where('type', 'doctor')->where('parentId', $doctor['id'])->first();
        return $doctor;
    }

    public function getByScheduleId($id)
    {
        return Schedule::where('doctor_id', $id)->get();
    }

    public function getLimitedDoctors()
    {
        return Doctor::with('users')->where('status', '1')->orderBy('id', 'DESC')->limit(2)->get();
    }

    public function Department()
    {
        return DoctorDepartment::where('status', '1')->pluck('name', 'id');
    }

    public function Doctor()
    {
        return Doctor::where('status', '1')->get();
    }

    public function Days()
    {
        return Day::pluck('name', 'id');
    }

}

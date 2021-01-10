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
        return Doctor::where('status', '1')->orderBy('id', 'DESC')->get();
    }
    public function getByDoctorId($id)
    {
        return Doctor::findOrFail($id);
    }
    public function getByScheduleId($id)
    {
        return Schedule::where('doctor_id', $id)->get();
    }
    public function getLimitedDoctors()
    {
        return Doctor::where('status', '1')->orderBy('id', 'DESC')->limit(2)->get();
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

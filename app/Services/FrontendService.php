<?php
namespace App\Services;

use App\Models\Day;
use App\Models\Doctor;
use App\Models\DoctorDepartment;

class FrontendService
{
    public function getActiveDoctors()
    {
        return Doctor::where('status', '1')->orderBy('id', 'DESC')->get();
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

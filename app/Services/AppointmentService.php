<?php
namespace App\Services;

use App\Models\Doctor;
use App\Models\DoctorDepartment;

class AppointmentService
{
    public function getByDepartments()
    {
        return DoctorDepartment::where('status', '1')->pluck('name', 'id');
    }
    public function getByDoctors()
    {
        return Doctor::where('status', '1')->pluck('name', 'id');
    }
}

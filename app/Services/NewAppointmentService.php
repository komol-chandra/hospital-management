<?php
namespace App\Services;

use App\Models\Day;
use App\Models\NewAppointment;
use App\Models\Patient;
use App\Models\Schedule;
use DateTime;

class NewAppointmentService
{
    public function createNewAppointment($data)
    {
        $appointment = new NewAppointment();
        $doctor_id = $data['doctor_id'];
        $date = $data['date'];
        $dateTime = new DateTime($date);
        $dateToDay = $dateTime->format('l');
        $findDay = Day::where('name', $dateToDay)->first();
        $getDoctor = Schedule::where('doctor_id', $doctor_id)->where('day_id', $findDay->id)->first();
        $doctorAppointmentCount = NewAppointment::where('doctor_id', $doctor_id)->where('date', $date)->count();
        if ($doctorAppointmentCount < $getDoctor->quantity && $getDoctor) {
            $appointment->fill($data)->save();
            return $appointment;
        } else {
            return null;
        }
    }
    public function createOldAppointment($data)
    {
        $code = $data['code'];
        $patient = Patient::where('code', '=', $code)->first();
        $appointment = new NewAppointment();
        $appointment->patient_id = $patient['patient_id'];
        $appointment->name = $patient['name'];
        $appointment->email = $patient['email'];
        $appointment->mobile = $patient['mobile'];
        $appointment->date = $data['date'];
        $appointment->department_id = $data['department_id'];
        $appointment->doctor_id = $data['doctor_id'];
        $appointment->message = $data['message'];
        $appointment->today_date = $data['today_date'];
        $doctor_id = $data['doctor_id'];
        $date = $data['date'];
        $dateTime = new DateTime($date);
        $dateToDay = $dateTime->format('l');
        $findDay = Day::where('name', $dateToDay)->first();
        $getDoctor = Schedule::where('doctor_id', $doctor_id)->where('day_id', $findDay->id)->first();
        $doctorAppointmentCount = NewAppointment::where('doctor_id', $doctor_id)->where('date', $date)->count();
        if ($doctorAppointmentCount < $getDoctor->quantity && $getDoctor) {
            $appointment->save();
            return $appointment;
        } else {
            return null;
        }
    }
    public function lists()
    {
        return NewAppointment::with('departments', 'doctors')->orderBy('id', 'asc')->get();
    }
    public function view($id)
    {
        return NewAppointment::with('doctors', 'departments')->findOrFail($id);
    }
}

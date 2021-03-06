<?php
namespace App\Services;

use App\Models\Day;
use App\Models\NewAppointment;
use App\Models\Patient;
use App\Models\Schedule;
use DateTime;
use Illuminate\Support\Facades\Auth;

class NewAppointmentService
{
    public function createNewAppointment($data)
    {
        $userId = Auth::user()->id;
        $appointment = new NewAppointment();
        $patient = new Patient();
        $patient->created_by = $userId;
        $patient->name = $data['name'];
        $patient->email = $data['email'];
        $patient->mobile = $data['mobile'];
        $patient->today_date = $data['today_date'];
        $patient->code = $data['code'];
        // dd($patient->toArray());
        $doctor_id = $data['doctor_id'];
        $date = $data['date'];
        $dateTime = new DateTime($date);
        $dateToDay = $dateTime->format('l');
        $findDay = Day::where('name', $dateToDay)->first();
        $getDoctor = Schedule::where('doctor_id', $doctor_id)->where('day_id', $findDay->id)->first();
        $doctorAppointmentCount = NewAppointment::where('doctor_id', $doctor_id)->where('date', $date)->count();
        if ($doctorAppointmentCount < $getDoctor->quantity && $getDoctor) {
            $appointment->fill($data)->save();
            $patient->save();

            return $appointment;
        } else {
            return null;
        }
    }
    public function createOldAppointment($data)
    {
        $mobile = $data['mobile'];
        $patient = Patient::where('mobile', $mobile)->first();

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
        // dd($getDoctor);
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

<?php
namespace App\Services;

use App\Models\Appointment;
use App\Models\Day;
use App\Models\Doctor;
use App\Models\DoctorDepartment;
use App\Models\FrontendUser;
use App\Models\Income;
use App\Models\Schedule;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;

class AppointmentService
{
    public function lists()
    {
        return Appointment::orderBy('id', 'ASC')->get();
    }

    public function getByDepartments()
    {
        return DoctorDepartment::where('status', '1')->pluck('name', 'id');
    }

    public function getByDoctors()
    {
        return Doctor::where('status', '1')->pluck('full_name', 'id');
    }

    public function getAllPatients()
    {
        return FrontendUser::where('type', 'patient')->get();
    }
    public function create($data)
    {
        $appointment = new Appointment();
        $doctor_id = $data['doctor_id'];
        $date = $data['date'];
        $dateTime = new DateTime($date);
        $dateToDay = $dateTime->format('l');
        $findDay = Day::where('name', $dateToDay)->first();
        $getDoctor = Schedule::where('doctor_id', $doctor_id)->where('day_id', $findDay->id)->first();

        $id = $getDoctor->doctor_id;
        $doctor = Doctor::findOrFail($id);
        $count = Appointment::where('doctor_id', $doctor_id)->where('date', $date)->count();

        if ($data['type'] == 1) {
            $payment = $doctor->feeNew;
        } elseif ($data['type'] == 2) {
            $payment = $doctor->feeInMonth;
        } else {
            $payment = $doctor->feeReport;
        }
        $appointment->payment_amount = $payment;

        $serial = $count + 1;
        $appointment->serial_no = $serial;

        $perPatientTime = $getDoctor->per_patient_time;
        $starting = $getDoctor->starting;
        $ending = $getDoctor->ending;
        $time = Carbon::parse($starting)->addMinutes($perPatientTime * $serial)->format('H:i:s');
        $appointment->time = $time;

        if ($count < $getDoctor->quantity && $getDoctor) {
            $appointment->fill($data)->save();
            return $appointment;
        } else {
            return null;
        }
    }

    public function status($id)
    {
        $data = Appointment::findOrFail($id);
        if ($data->status == 0) {
            $data->status = 1;
        }
        return $data->save();
    }

    public function payment($id)
    {
        $data = Appointment::findOrFail($id);
        if ($data->payment_status == 0) {
            $data->payment_status = 1;
        }
        $data->save();

        $user_id = Auth::user()->id;
        $income = new Income();
        $income->invoice_id = $data->id;
        $today = Carbon::today();
        $date = new DateTime($today);
        $format = $date->format('Y-m-d');
        $income->date = $format;
        $income->amount = $data->payment_amount;
        $income->type = "Appointment Bill";
        $income->patient_id = $data->patient_id;
        $income->created_by = $user_id;
        $income->save();

        if ($data && $income) {
            return $data;
        } else {
            return null;
        }

    }

    public function payments($id)
    {

        $data = Appointment::findOrFail($id);
        $status = $this->savePaymentStatus($data);
        $payment = $this->savePayment($data);

        if ($status && $payment) {
            return $status;
        } else {
            return null;
        }

    }
    public function savePaymentStatus($data)
    {
        if ($data->payment_status == 0) {
            $data->payment_status = 1;
        }
        return $data->save();
    }

    public function savePayment($data)
    {
        $user_id = Auth::user()->id;
        $income = new Income();
        $income->invoice_id = $data->id;
        $today = Carbon::today();
        $date = new DateTime($today);
        $format = $date->format('Y-m-d');
        $income->date = $format;
        $income->amount = $data->payment_amount;
        $income->type = "Appointment Bill";
        $income->patient_id = $data->patient_id;
        $income->updated_by = $user_id;
        $income->save();
    }

}

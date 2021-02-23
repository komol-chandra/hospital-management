<?php
namespace App\Services;

use App\Models\Day;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleService
{
    public function lists()
    {
        return Schedule::with('days', 'doctors')->orderBy('id', 'DESC')->get();
    }
    public function getDays()
    {
        return Day::pluck('name', 'id');
    }
    public function getActiveDoctors()
    {
        return Doctor::with('users')->where('status', '1')->pluck('full_name', 'id');
    }
    public function createOrUpdate($data)
    {
        $userId = Auth::user()->id;
        if (!empty($data["id"])) {
            $schedule = Schedule::findOrFail($data["id"]);
            $schedule->updated_by = $userId;
        } else {
            $schedule = new Schedule();
            $schedule->created_by = $userId;
        }
        $patient = $data['quantity'];
        $starting = strtotime($data['starting']);
        $ending = strtotime($data['ending']);
        //time in minute
        $different = (($ending - $starting) / 60);
        $perPatientTime = ($different / $patient);
        $data['per_patient_time'] = $perPatientTime;
        return $schedule->fill($data)->save() ? $schedule : null;
    }
    public function delete($id)
    {
        return Schedule::findOrFail($id)->delete();
    }
    public function getById($id)
    {
        return Schedule::findOrFail($id);
    }
    public function status($id)
    {
        $schedule = Schedule::findOrFail($id);
        if ($schedule->status == 1) {
            $schedule->status = 0;
        } else {
            $schedule->status = 1;
        }
        $schedule->save();
        return $schedule;
    }
}

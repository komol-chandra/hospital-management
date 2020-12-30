<?php
namespace App\Services;

use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;
use Carbon\Carbon;

class PrescriptionService
{
    public function getDoctors()
    {
        return Doctor::where('status', '1')->pluck('name', 'id');
    }
    public function getPatients()
    {
        return Patient::where('status', '1')->pluck('name', 'id');
    }
    public function getMedicines()
    {
        return Medicine::where('status', '1')->pluck('name', 'id');
    }
    public function getMedicineJs()
    {
        return Medicine::where('status', '1')->get();
    }
    public function getById($id)
    {
        return Prescription::with('user', 'doctor', 'doctor.departments', 'patient')->findOrFail($id);
    }
    public function getByIdMedicine($id)
    {
        return PrescriptionMedicine::with('medicines', 'medicines.medicineType')->where('prescription_id', $id)->get();
    }
    public function getAgeAttribute($birthday)
    {
        return Carbon::parse($birthday)->age;
    }
    public function lists()
    {
        return Prescription::with('user', 'patient', 'doctor')->orderBy('id', 'DESC')->get();
    }
    public function status($id)
    {
        $data = Prescription::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
    public function delete($id)
    {
        return Prescription::findOrFail($id)->delete();
    }
}

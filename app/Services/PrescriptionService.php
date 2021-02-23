<?php
namespace App\Services;

use App\Models\Doctor;
use App\Models\FrontendUser;
use App\Models\Medicine;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PrescriptionService
{

    public function create($data)
    {
        $data['today_date'] = Carbon::now()->format('y-m-d');
        $prescription = new Prescription();
        $user_id = Auth::user()->id;
        $prescription->created_by = $user_id;
        $prescription->fill($data)->save();
        // dd($prescription);

        foreach ($data['day'] as $key => $value) {
            $medicineData[] = [
                'prescription_id' => $prescription->id,
                'day'             => $value,
                'medicine'        => $data['medicine'][$key],
                'duration'        => $data['duration'][$key],
                'sequence'        => $data['sequence'][$key],
                'day'             => $data['day'][$key],
                'instruction'     => $data['instruction'][$key],
            ];
        }
        $medicine_model = PrescriptionMedicine::insert($medicineData);
        // dd($medicine_model);
        if ($prescription && $medicine_model) {
            return $prescription;
        } else {
            return null;
        }
    }

    public function getDoctors()
    {
        return Doctor::where('status', '1')->pluck('full_name', 'id');
    }
    public function getPatients()
    {
        return FrontendUser::where('type', 'patient')->pluck('full_name', 'id');
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

<?php
namespace App\Services;

use App\Models\Blood;
use App\Models\Patient;
use File;
use Illuminate\Support\Facades\Auth;

class PatientService
{
    public function lists($data)
    {
        return Patient::orderBy('id', 'DESC')->paginate(10);
    }
    public function createOrUpdate($data)
    {
        $userId = Auth::user()->id;
        if (isset($data['id'])) {
            $patient = Patient::findOrFail($data['id']);
            if (isset($data['picture'])) {
                if (File::exists($patient->picture)) {
                    File::delete($patient->picture);
                }
                $patient->picture = $data['picture'];
            }
            $patient->updated_by = $userId;
        } else {
            $patient = new Patient();
            $patient->created_by = $userId;
        }
        $patient->fill($data)->save() ? $patient : null;
        return $patient ?? null;
    }
    public function getById($id)
    {
        return Patient::findOrFail($id);
    }
    public function getBloods()
    {
        return Blood::pluck('name', 'id');
    }
    public function delete($id)
    {
        $patient = Patient::findOrFail($id);
        if ($patient) {
            if (File::exists($patient->picture)) {
                File::delete($patient->picture);
            }
        }
        $patient->delete();
        return $patient;

    }
    public function status($id)
    {
        $patient = Patient::findOrFail($id);
        if ($patient->status == 1) {
            $patient->status = 0;
        } else {
            $patient->status = 1;
        }
        return $patient->save();
    }
}

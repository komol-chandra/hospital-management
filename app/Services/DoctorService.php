<?php
namespace App\Services;

use App\Models\Blood;
use App\Models\Doctor;
use App\Models\DoctorDepartment;
use File;
use Illuminate\Support\Facades\Auth;

class DoctorService
{
    public function lists()
    {
        return Doctor::orderBy('id', 'DESC')->get();
    }
    public function createOrUpdate($data)
    {
        $user_id = Auth::user()->id;
        if (!empty($data["id"])) {
            $doctor = Doctor::findOrFail($data['id']);
            if ($data['picture']) {
                if (File::exists($doctor->picture)) {
                    File::delete($doctor->picture);
                }
            }
            $doctor->updated_by = $user_id;
        } else {
            $doctor = new Doctor();
            $doctor->created_by = $user_id;
        }
        if (isset($data['picture'])) {
            $doctor->picture = $data['picture'];
        }
        return $doctor->fill($data)->save() ? $doctor : null;
    }
    public function getById($id)
    {
        return Doctor::findOrFail($id);
    }
    public function getDeterment()
    {
        return DoctorDepartment::where('status', '1')->pluck('name', 'id');
    }
    public function getBloods()
    {
        return Blood::all()->pluck('name', 'id');

    }
    public function getByIdWithUser($id)
    {
        return Doctor::with('user')->findOrFail($id);
    }
    public function delete($id)
    {
        $doctor = Doctor::findOrFail($id);
        if ($doctor) {
            if (File::exists($doctor->picture)) {
                File::delete($doctor->picture);
            }
        }
        $doctor->delete();
        return $doctor;

    }
    public function status($id)
    {
        $doctor = Doctor::findOrFail($id);
        if ($doctor->status == 1) {
            $doctor->status = 0;
        } else {
            $doctor->status = 1;
        }
        return $doctor->save();
    }
}

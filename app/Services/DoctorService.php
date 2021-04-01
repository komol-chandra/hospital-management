<?php
namespace App\Services;

use App\Models\Blood;
use App\Models\Doctor;
use App\Models\DoctorDepartment;
use App\Models\FrontendUser;
use App\Models\User;
use File;
use Illuminate\Support\Facades\Auth;

class DoctorService
{
    public function lists()
    {
        return (Doctor::with('departments')->orderBy('id', 'DESC')->get());
    }

    public function create($data)
    {
        $user_id = Auth::user()->id;
        $doctor = new Doctor();
        $doctor->created_by = $user_id;
        $doctor->fill($data)->save();
        return $doctor ? $doctor : null;

    }

    public function update($data, $id)
    {
        $user_id = Auth::user()->id;
        $doctor = Doctor::findOrFail($id);
        // dd($doctor);
        $user = FrontendUser::where('type', 'doctor')->where('parentId', $doctor['id'])->first();
        if (isset($data['picture'])) {
            if (File::exists($user->picture)) {
                File::delete($user->picture);
            }
        }
        $doctor->updated_by = $user_id;
        $doctor->fill($data)->save();

        $user->full_name = $data['full_name'];
        $user->address = $data['address'];
        $user->mobile = $data['mobile'];
        $user->birthday = $data['birthday'];

        if (!empty($data['picture'])) {
            $user->picture = $data['picture'];
        }

        $user->blood_id = $data['blood_id'];
        $user->gender = $data['gender'];
        $user->save();
        return $doctor ? $doctor : null;
    }

    public function getById($id)
    {
        return Doctor::with('departments', 'users')->findOrFail($id);
    }

    public function getUserById($id)
    {
        $doctorId = Doctor::findOrFail($id)->toArray();
        return FrontendUser::where('type', 'doctor')->where('parentId', $doctorId['id'])->first();
    }

    public function getDeterment()
    {
        return DoctorDepartment::where('status', '1')->pluck('name', 'id');
    }

    public function getBloods(): \Illuminate\Support\Collection
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
        $user = FrontendUser::where('type', 0)->where('parentId', $doctor['id'])->first();
        if ($user) {
            if (File::exists($user->picture)) {
                File::delete($user->picture);
            }
        }
        $user->delete();
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

<?php
namespace App\Services;

use App\Models\Blood;
use App\Models\FrontendUser;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientService
{

    public function create($data)
    {
        $user_id = Auth::user()->id;

        $user = new FrontendUser();
        $user->type = 'patient';
        $user->password = Hash::make($data['password']);
        $user->name = $data['name'];
        $user->full_name = $data['full_name'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->mobile = $data['mobile'];
        $user->birthday = $data['birthday'];
        $user->picture = isset($data['picture']) ? $data['picture'] : 'backend/files/profile.jpg';
        $user->blood_id = $data['blood_id'];
        $user->gender = $data['gender'];
        return $user->save() ? $user : null;
    }

    public function update($data, $id)
    {
        $user_id = Auth::user()->id;
        $user = FrontendUser::where('type', 'patient')->findOrFail($id);
        if (isset($data['picture'])) {
            if (File::exists($user->picture)) {
                File::delete($user->picture);
            }
        }
        return $user->fill($data)->save() ? $user : null;
    }

    public function getById($id)
    {
        return FrontendUser::where('type', 'patient')->findOrFail($id);
    }
    public function getBloods()
    {
        return Blood::pluck('name', 'id');
    }
    public function delete($id)
    {
        $patient = FrontendUser::findOrFail($id);
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
        $patient = FrontendUser::findOrFail($id);
        if ($patient->status == 1) {
            $patient->status = 0;
        } else {
            $patient->status = 1;
        }
        return $patient->save();
    }
}

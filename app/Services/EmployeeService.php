<?php
namespace App\Services;

use App\Models\Blood;
use App\Models\RoleModel;
use App\Models\User;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{
    public function role()
    {
        return RoleModel::pluck('name', 'name');
    }

    public function bloodDropDown()
    {
        return Blood::pluck('name', 'id');
    }

    public function create($data)
    {
        $user_id = Auth::user()->id;

        $user = new User();
        $user->type = $data['type'];
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
        $user->created_by = $user_id;
        return $user->save() ? $user : null;
    }

    public function update($data, $id)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($id);
        if (isset($data['picture'])) {
            if (File::exists($user->picture)) {
                File::delete($user->picture);
            }
        }
        $user->updated_by = $user_id;
        return $user->fill($data)->save() ? $user : null;
    }

    public function lists()
    {
        return User::orderBy('id', 'DESC')->get();
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function getEmployeeRoll()
    {
        return User::pluck('name', 'id');
    }
    public function delete($id)
    {
        $data = User::findOrFail($id);
        if ($data) {
            if (File::exists($data->picture)) {
                File::delete($data->picture);
            }
        }
        $data->delete();
        return $data;

    }
    public function status($id)
    {
        $data = User::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
}

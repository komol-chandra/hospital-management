<?php
namespace App\Services;

use App\Models\DoctorDepartment;
use Illuminate\Support\Facades\Auth;

class DoctorDepartmentService
{

    public function __construct()
    {

    }

    public function lists()
    {
        return DoctorDepartment::all();
    }
    public function createOrUpdate($data)
    {
        $user_id = Auth::user()->id;
        if (!empty($data["id"])) {
            $department = DoctorDepartment::findOrFail($data['id']);
            $department->updated_by = $user_id;
        } else {
            $department = new DoctorDepartment();
            $department->created_by = $user_id;
        }
        $department->name = $data['name'];
        $department->description = $data['description'];
        $department->status = $data['status'];
        return $department->save() ? $department : null;
    }
    public function getById($id)
    {
        return DoctorDepartment::findOrFail($id)->toArray();
    }
    public function delete($id)
    {
        $department = DoctorDepartment::findOrFail($id);

        return $department->delete();
    }
    public function status($id)
    {
        $department = DoctorDepartment::findOrFail($id);
        if ($department->status == 1) {
            $department->status = 0;
        } else {
            $department->status = 1;
        }
        return $department->save();
    }
}

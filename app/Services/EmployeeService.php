<?php
namespace App\Services;

use App\Models\Blood;
use App\Models\Employee;
use App\Models\EmployeeRoll;
use File;
use Illuminate\Support\Facades\Auth;

class EmployeeService
{

    public function lists()
    {
        return Employee::with('blood', 'user', 'employeeRoll')->orderBy('id', 'DESC')->get();
    }
    public function createOrUpdate($value)
    {
        $userId = Auth::user()->id;
        if (isset($value['id'])) {
            $data = Employee::findOrFail($value['id']);
            if ($value['picture']) {
                if (File::exists($data->picture)) {
                    File::delete($data->picture);
                }
            }
            $data->updated_by = $userId;
        } else {
            $data = new Employee();
            $data->created_by = $userId;
        }
        $data->fill($value)->save() ? $data : null;
        return $data ?? null;
    }
    public function getById($id)
    {
        return Employee::findOrFail($id);
    }
    public function getBloods()
    {
        return Blood::pluck('name', 'id');
    }
    public function getEmployeeRoll()
    {
        return EmployeeRoll::pluck('name', 'id');
    }
    public function delete($id)
    {
        $data = Employee::findOrFail($id);
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
        $data = Employee::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
}

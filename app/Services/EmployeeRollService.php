<?php
namespace App\Services;

use App\Models\EmployeeRoll;
use Illuminate\Support\Facades\Auth;

class EmployeeRollService
{
    public function lists()
    {
        return EmployeeRoll::orderBy('id', 'DESC')->get();
    }
    public function createOrUpdate($data)
    {
        $userId = Auth::user()->id;
        if (isset($data['id'])) {
            $employee = EmployeeRoll::findOrFail($data['id']);
            $employee->updated_by = $userId;
        } else {
            $employee = new EmployeeRoll();
            $employee->created_by = $userId;
        }
        return $employee->fill($data)->save() ? $employee : null;
    }
    public function delete($id)
    {
        return EmployeeRoll::findOrFail($id)->delete();

    }
    public function status($id)
    {
        $data = EmployeeRoll::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
    public function getById($id)
    {
        return EmployeeRoll::findOrFail($id);
    }
}

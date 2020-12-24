<?php
namespace App\Services;

use App\Models\MedicineType;
use Illuminate\Support\Facades\Auth;

class MedicineTypeService
{
    public function lists()
    {
        return MedicineType::orderBy('id', 'DESC')->get();
    }
    public function createOrUpdate($data)
    {
        $userId = Auth::user()->id;
        if (isset($data['id'])) {
            $medicineType = MedicineType::findOrFail($data['id']);
            $medicineType->updated_by = $userId;
        } else {
            $medicineType = new MedicineType();
            $medicineType->created_by = $userId;
        }
        return $medicineType->fill($data)->save() ? $medicineType : null;
    }
    public function delete($id)
    {
        return MedicineType::findOrFail($id)->delete();

    }
    public function status($id)
    {
        $data = MedicineType::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
    public function getById($id)
    {
        return MedicineType::findOrFail($id);
    }
}

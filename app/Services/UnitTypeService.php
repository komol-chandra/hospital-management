<?php
namespace App\Services;

use App\Models\UnitType;
use Illuminate\Support\Facades\Auth;

class UnitTypeService
{
    public function lists()
    {
        return unitType::orderBy('id', 'DESC')->get();
    }
    public function createOrUpdate($data)
    {
        $userId = Auth::user()->id;
        if (isset($data['id'])) {
            $unitType = UnitType::findOrFail($data['id']);
            $unitType->updated_by = $userId;
        } else {
            $unitType = new UnitType();
            $unitType->created_by = $userId;
        }
        return $unitType->fill($data)->save() ? $unitType : null;
    }
    public function delete($id)
    {
        return unitType::findOrFail($id)->delete();

    }
    public function status($id)
    {
        $data = unitType::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
    public function getById($id)
    {
        return unitType::findOrFail($id);
    }
}

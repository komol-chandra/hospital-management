<?php
namespace App\Services;

use App\Models\Generic;
use App\Models\Manufacturer;
use App\Models\Medicine;
use App\Models\MedicineType;
use App\Models\UnitType;
use File;
use Illuminate\Support\Facades\Auth;

class MedicineService
{
    public function lists()
    {
        return Medicine::with('user', 'medicineType', 'generic', 'manufacturer')->orderBy('id', 'DESC')->get();
    }

    public function createOrUpdate($data)
    {
        $userId = Auth::user()->id;
        if (isset($data['id'])) {
            $medicine = Medicine::findOrFail($data['id']);
            if (isset($data['picture'])) {
                if (File::exists($medicine->picture)) {
                    File::delete($medicine->picture);
                }
                $medicine->picture = $data['picture'];
            }
            $medicine->updated_by = $userId;
        } else {
            $medicine = new Medicine();
            $medicine->created_by = $userId;
        }
        return $medicine->fill($data)->save() ? $medicine : null;
    }

    public function getById($id)
    {
        return Medicine::findOrFail($id);
    }
    public function getMedicineType()
    {
        return MedicineType::where('status', '1')->pluck('name', 'id');
    }
    public function getUnitType()
    {
        return UnitType::where('status', '1')->pluck('name', 'id');
    }
    public function getGeneric()
    {
        return Generic::where('status', '1')->pluck('name', 'id');
    }
    public function getManufacturer()
    {
        return Manufacturer::where('status', '1')->pluck('name', 'id');
    }
    public function status($id)
    {
        $data = Medicine::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
    public function delete($id)
    {
        $medicine = Medicine::findOrFail($id);
        if ($medicine) {
            if (File::exists($medicine->picture)) {
                File::delete($medicine->picture);
            }
        }
        return $medicine->delete();
    }
}

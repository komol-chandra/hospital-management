<?php
namespace App\Services;

use App\Models\Manufacturer;
use File;
use Illuminate\Support\Facades\Auth;

class ManufacturerService
{
    public function lists()
    {
        return Manufacturer::with('user')->orderBy('id', 'DESC')->get();
    }
    public function status($id)
    {
        $data = Manufacturer::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
    public function delete($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        if ($manufacturer) {
            if (File::exists($manufacturer->picture)) {
                File::delete($manufacturer->picture);
            }
        }
        $manufacturer->delete();
        return $manufacturer;
    }
    public function createOrUpdate($data)
    {
        $user_id = Auth::user()->id;
        if (!empty($data["id"])) {
            $manufacturer = Manufacturer::findOrFail($data['id']);
            if ($data['picture']) {
                if (File::exists($manufacturer->picture)) {
                    File::delete($manufacturer->picture);
                }
            }
            $manufacturer->updated_by = $user_id;
        } else {
            $manufacturer = new Manufacturer();
            $manufacturer->created_by = $user_id;
        }
        if (isset($data['picture'])) {
            $manufacturer->picture = $data['picture'];
        }
        return $manufacturer->fill($data)->save() ? $manufacturer : null;
    }
}

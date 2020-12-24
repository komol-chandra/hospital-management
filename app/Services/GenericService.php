<?php
namespace App\Services;

use App\Models\Generic;
use Illuminate\Support\Facades\Auth;

class GenericService
{
    public function lists()
    {
        return Generic::orderBy('id', 'DESC')->get();
    }
    public function delete($id)
    {
        return Generic::findOrFail($id)->delete();
    }
    public function status($id)
    {
        $data = Generic::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();

    }
    public function createOrUpdate($data)
    {
        $userId = Auth::user()->id;
        if (isset($data['id'])) {
            $generic = Generic::findOrFail($data['id']);
            $generic->updated_by = $userId;
        } else {
            $generic = new Generic();
            $generic->created_by = $userId;
        }
        return $generic->fill($data)->save() ? $generic : null;
    }
    public function getById($id)
    {
        return Generic::findOrFail($id);
    }
}

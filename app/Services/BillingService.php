<?php
namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class BillingService
{
    public function lists()
    {
        return Service::orderBy('id', 'DESC')->paginate(10);
    }
    public function getById($id)
    {
        return Service::findOrFail($id);
    }
    public function status($id)
    {
        $data = Service::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
    public function delete($id)
    {
        return Service::findOrFail($id)->delete();

    }
    public function createOrUpdate($value)
    {
        $user_id = Auth::user()->id;
        if (!empty($value["id"])) {
            $data = Service::findOrFail($value['id']);
            $data->updated_by = $user_id;
        } else {
            $data = new Service();
            $data->created_by = $user_id;
        }
        return $data->fill($value)->save() ? $data : null;
    }
}

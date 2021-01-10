<?php
namespace App\Services;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;

class PaymentMethodService
{
    public function lists()
    {
        return PaymentMethod::orderBy('id', 'DESC')->paginate(10);
    }
    public function getById($id)
    {
        return PaymentMethod::findOrFail($id);
    }
    public function status($id)
    {
        $data = PaymentMethod::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
    public function delete($id)
    {
        return PaymentMethod::findOrFail($id)->delete();

    }
    public function createOrUpdate($value)
    {
        $user_id = Auth::user()->id;
        if (!empty($value["id"])) {
            $data = PaymentMethod::findOrFail($value['id']);
            $data->updated_by = $user_id;
        } else {
            $data = new PaymentMethod();
            $data->created_by = $user_id;
        }
        return $data->fill($value)->save() ? $data : null;
    }
}

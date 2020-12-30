<?php
namespace App\Services;

use App\Models\Account;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentService
{
    public function lists()
    {
        return Payment::orderBy('id', 'DESC')->get();
    }
    public function getDropdownList()
    {
        return Account::where('status', '1')->orderBy('id', 'DESC')->pluck('name', 'id');
    }

    public function createOrUpdate($value)
    {
        $userId = Auth::user()->id;
        if (isset($value['id'])) {
            $data = Payment::findOrFail($value['id']);
            $data->updated_by = $userId;
        } else {
            $data = new Payment();
            $data->created_by = $userId;
        }
        return $data->fill($value)->save() ? $data : null;
    }
    public function delete($id)
    {
        return Payment::findOrFail($id)->delete();

    }
    public function status($id)
    {
        $data = Payment::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
    public function getById($id)
    {
        return Payment::findOrFail($id);
    }
}

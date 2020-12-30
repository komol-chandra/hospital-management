<?php
namespace App\Services;

use App\Models\Account;
use App\Models\AccountType;
use Illuminate\Support\Facades\Auth;

class AccountService
{
    public function lists()
    {
        return Account::with('user', 'accountType')->orderBy('id', 'DESC')->get();
    }
    public function getDropdownList()
    {
        return AccountType::orderBy('id', 'DESC')->pluck('name', 'id');
    }
    public function createOrUpdate($value)
    {
        $userId = Auth::user()->id;
        if (isset($value['id'])) {
            $data = Account::findOrFail($value['id']);
            $data->updated_by = $userId;
        } else {
            $data = new Account();
            $data->created_by = $userId;
        }
        return $data->fill($value)->save() ? $data : null;
    }
    public function delete($id)
    {
        return Account::findOrFail($id)->delete();

    }
    public function status($id)
    {
        $data = Account::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
    public function getById($id)
    {
        return Account::findOrFail($id);
    }
}

<?php
namespace App\Services;

use App\Models\Account;
use App\Models\AccountInvoice;
use App\Models\AccountInvoicedetail;
use Illuminate\Support\Facades\Auth;

class AccountInvoiceService
{
    public function lists()
    {
        return AccountInvoice::with('patient')->orderBy('id', "desc")->paginate(10);
    }
    public function getById($id)
    {
        return AccountInvoice::findOrFail($id);
    }
    public function getByPatient($id)
    {
        return AccountInvoice::with('patient')->where('id', $id)->first();
    }
    public function accountDetail($id)
    {
        return AccountInvoicedetail::with('accountInvoice', 'account')->where('account_invoice_id', $id)->get();
    }
    public function createOrUpdate($value)
    {
        $user_id = Auth::user()->id;
        if (!empty($value["id"])) {
            $department = AccountInvoice::findOrFail($value['id']);
            $department->updated_by = $user_id;
        } else {
            $department = new AccountInvoice();
            $department->created_by = $user_id;
        }
        $department->name = $value['name'];
        $department->description = $value['description'];
        $department->status = $value['status'];
        return $department->save() ? $department : null;
    }
    public function getAccountDropdownList()
    {
        return Account::where('status', '1')->get();
    }
    public function delete($id)
    {
        return AccountInvoice::findOrFail($id)->delete();
    }
    public function status($id)
    {
        $data = AccountInvoice::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
}

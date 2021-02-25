<?php
namespace App\Services;

use App\Models\Account;
use App\Models\Expense;
use App\Models\ExpenseBill;
use Illuminate\Support\Facades\Auth;

class ExpenseBillService
{
    public function getExpenseType()
    {
        return Expense::pluck('name', 'id');
    }

    public function lists()
    {
        return ExpenseBill::paginate(10);
    }

    public function createOrUpdate($value)
    {
        $userId = Auth::user()->id;
        if (isset($value['id'])) {
            $data = ExpenseBill::findOrFail($value['id']);
            $data->updated_by = $userId;
        } else {
            $data = new ExpenseBill();
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

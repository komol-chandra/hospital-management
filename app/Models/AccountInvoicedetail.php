<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountInvoicedetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "account_invoice_details";
    protected $primaryKey = "id";
    protected $fillable = [
        "account_invoice_id",
        "account_id",
        "description",
        "quantity",
        "price",
        "sub_total",
    ];

    public function accountInvoice()
    {
        return $this->belongsTo("App\Models\AccountInvoice", "account_invoice_id", "id");
    }
    public function account()
    {
        return $this->belongsTo("App\Models\Account", "account_id", "id");
    }
}

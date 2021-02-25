<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountInvoice extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "account_invoices";
    protected $primaryKey = "id";
    protected $fillable = [
        "patient_id",
        "date",
        "total",
        "vat",
        "discount",
        "grand_total",
        "paid",
        "due",
        "status",
    ];

    public function patient()
    {
        return $this->belongsTo("App\Models\FrontendUser", "patient_id", "id");
    }
    public function account()
    {
        return $this->belongsTo("App\Models\Account", "account_id", "id");
    }
    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }
}

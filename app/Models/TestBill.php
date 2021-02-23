<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestBill extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "test_bills";
    protected $primaryKey = "id";
    protected $fillable = [
        "reference",
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

    public function users()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");

    }
}

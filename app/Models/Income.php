<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "incomes";
    protected $primaryKey = "id";
    protected $fillable = [
        "invoice_id",
        "date",
        "amount",
        "type",
        "patient_id",
    ];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
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

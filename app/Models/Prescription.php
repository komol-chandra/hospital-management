<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "prescriptions";
    protected $primaryKey = "id";
    protected $fillable = [
        "date",
        "patient_id",
        "doctor_id",
        "history",
        "note",
        "old_prescription_id",
        "today_date",
    ];
    public function patient()
    {
        return $this->belongsTo("App\Models\FrontendUser", "patient_id", "id");
    }
    public function doctor()
    {
        return $this->belongsTo("App\Models\FrontendUser", "doctor_id", "id");
    }
    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }

}

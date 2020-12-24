<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientTest extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "patient_tests";
    protected $primaryKey = "id";
    protected $fillable = [
        "test_id",
        "doctor_id",
        "patient_id",
        "details",
        "file",
        "status",
    ];
    public function tests()
    {
        return $this->belongsTo("App\Models\Test", "test_id", "id");
    }
    public function doctors()
    {
        return $this->belongsTo("App\Models\Doctor", "doctor_id", "id");
    }
    public function patients()
    {
        return $this->belongsTo("App\Models\Patient", "patient_id", "id");
    }
}

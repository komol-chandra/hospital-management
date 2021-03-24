<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "appointments";
    protected $primaryKey = "id";
    protected $fillable = [
        "type",
        "serial_no",
        "patient_id",
        "department_id",
        "doctor_id",
        "date",
        "payment_amount",
        "payment_status",
        "message",
        "status",
        "time",
        "created_by",
        "updated_by",

    ];

    // protected $casts = [
    //     'created_at' => 'date:Y-m-d',
    // ];

    public function departments()
    {
        return $this->belongsTo("App\Models\DoctorDepartment", "department_id", 'id');
    }
    public function doctors()
    {
        return $this->belongsTo("App\Models\Doctor", "doctor_id", 'id');
    }

    public function days()
    {
        return $this->belongsTo("App\Models\Day", "date", 'id');
    }

    public function users()
    {
        return $this->belongsTo("App\Models\FrontendUser", 'patient_id', 'id');
    }
}

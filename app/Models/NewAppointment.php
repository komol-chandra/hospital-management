<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewAppointment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "new_appointments";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "email",
        "mobile",
        "date",
        "department_id",
        "doctor_id",
        "message",
        "created_at",
        "today_date",

    ];
    public function departments()
    {
        return $this->belongsTo("App\Models\DoctorDepartment", "department_id", 'id');
    }
    public function doctors()
    {
        return $this->belongsTo("App\Models\Doctor", "doctor_id", 'id');
    }

}

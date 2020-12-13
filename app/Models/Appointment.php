<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = "appointments";
    protected $primaryKey = "id";
    protected $fillable = [
        "code",
        "department",
        "doctor",
        "date",
        "serial",
        "Problem",
        "status",
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'name');
    }
    public function department()
    {
        return $this->belongsTo('App\Models\DoctorDepartment', 'name');
    }

}

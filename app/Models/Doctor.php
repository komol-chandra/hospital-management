<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "doctors";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "email",
        "designation",
        "department_id",
        "address",
        "mobile",
        "phone",
        "biography",
        "specialist",
        "birthday",
        "gender",
        "blood_id",
        "education",
        "picture",
        "status",
    ];

    public function blood()
    {
        return $this->belongsTo("App\Models\Blood", "blood_id", "id");
    }
    public function departments()
    {
        return $this->belongsTo("App\Models\DoctorDepartment", "department_id", "id");
    }
}

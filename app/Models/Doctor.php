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
        "full_name",
        "designation",
        "department_id",
        "phone",
        "biography",
        "specialist",
        "education",
        "feeNew",
        "feeInMonth",
        "feeReport",
        "salary",
        "status",
    ];
    public function users()
    {
        return $this->hasOne("App\Models\FrontendUser", 'parentId', 'id');
    }
    public function departments()
    {
        return $this->belongsTo("App\Models\DoctorDepartment", "department_id", "id");
    }
}

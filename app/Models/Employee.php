<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "employees";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "roll_id",
        "email",
        "address",
        "mobile",
        "phone",
        "birthday",
        "gender",
        "blood_id",
        "picture",
        "status",
    ];
    public function blood()
    {
        return $this->belongsTo("App\Models\Blood", "blood_id", 'id');
    }
    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", 'id');
    }
    public function employeeRoll()
    {
        return $this->belongsTo("App\Models\EmployeeRoll", "roll_id", 'id');
    }
}

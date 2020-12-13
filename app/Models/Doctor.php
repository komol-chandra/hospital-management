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
        "department",
        "address",
        "mobile",
        "phone",
        "biography",
        "specialist",
        "birthday",
        "gender",
        "blood",
        "education",
        "picture",
        "status",
    ];

    public function blood()
    {
        return $this->belongsTo("App\Models\Blood", "name");
    }
    public function department()
    {
        return $this->belongsTo("App\Models\DoctorDepartment", "name");
    }
    public function user()
    {
        return $this->hasOne(User::class, 'parentId', 'id');
    }
}

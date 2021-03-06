<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorDepartment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "departments";
    protected $primaryKey = "id";
    protected $fillable = ["name", "description", "status"];

}

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
        "department",
        "doctor",
        "message",
    ];
}

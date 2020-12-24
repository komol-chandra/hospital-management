<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "tests";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "details",
        "lab_name",
        "prize",
        "status",
    ];
}

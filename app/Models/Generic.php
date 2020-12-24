<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Generic extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "generics";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "description",
        "status",
    ];
}

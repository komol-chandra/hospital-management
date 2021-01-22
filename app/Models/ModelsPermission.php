<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelsPermission extends Model
{
    use HasFactory;
    protected $table = "permissions";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'guard_name',
        'module_name',
        'details',
        'type',
    ];
}

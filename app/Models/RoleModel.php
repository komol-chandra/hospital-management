<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'guard_name',
    ];
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', '%' . $search . '%');
    }
}

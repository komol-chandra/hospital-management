<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "customers";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "phone",
        "address",
        "due_able",
        "status",
        "created_by",
        "updated_by",
    ];
    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }
}

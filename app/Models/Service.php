<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "services";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "quantity",
        "description",
        "rate",
        "status",
    ];
    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "medicines";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "type_id",
        "generic_id",
        "manufacturer_id",
        "sku",
        "tax",
        "details",
        "picture",
        "per_box",
        "price",
        "status",
    ];
}

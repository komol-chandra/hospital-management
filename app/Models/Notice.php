<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "notices";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "designation",
        "start_date",
        "end_date",
        "today_date",
        "today_time",
        "status",
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }
}

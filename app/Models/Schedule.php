<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = "schedules";
    protected $primaryKey = "id";
    protected $fillable = [
        "doctor",
        "day",
        "starting",
        "ending",
        "quantity",
        "status",
    ];

    public function day()
    {
        return $this->belongsTo("App\Models\Day", "name");
    }
    public function doctor()
    {
        return $this->belongsTo("App\Models\Doctor", "name");
    }
}

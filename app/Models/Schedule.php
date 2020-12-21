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

    public function days()
    {
        return $this->belongsTo("App\Models\Day", "day", "id");
    }
    public function doctors()
    {
        return $this->belongsTo("App\Models\Doctor", "doctor", "id");
    }
}

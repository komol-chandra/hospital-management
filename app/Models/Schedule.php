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
        "doctor_id",
        "day_id",
        "starting",
        "ending",
        "quantity",
        "per_patient_time",
        "status",
    ];

    public function days()
    {
        return $this->belongsTo("App\Models\Day", "day_id", "id");
    }
    public function doctors()
    {
        return $this->belongsTo("App\Models\Doctor", "doctor_id", "id");
    }
    public function users()
    {
        return $this->hasMany("App\Models\FrontendUser");
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('doctor_id', 'LIKE', '%' . $search . '%')
            ->orWhere('day_id', 'LIKE', '%' . $search . '%')
            ->orWhere('starting', 'LIKE', '%' . $search . '%')
            ->orWhere('ending', 'LIKE', '%' . $search . '%');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicine extends Model
{
    use HasFactory;
    protected $table = "prescription_medicines";
    protected $primaryKey = "id";
    protected $fillable = [
        "prescription_id",
        "medicine",
        "duration",
        "sequence",
        "day",
        "instruction",
    ];
    public function medicines()
    {
        return $this->belongsTo("App\Models\Medicine", "medicine_id");
    }
}

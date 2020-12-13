<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = "patients";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "code",
        "email",
        "address",
        "mobile",
        "phone",
        "birthday",
        "gender",
        "blood",
        "picture",
        "status",
    ];
    public function blood()
    {
        return $this->belongsTo("App\Models\Blood", "name");
    }
}

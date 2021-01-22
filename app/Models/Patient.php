<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;
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
        "blood_id",
        "picture",
        "status",
        "today_date",
    ];
    public function blood()
    {
        return $this->belongsTo("App\Models\Blood", "blood_id", 'id');
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('code', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->orWhere('mobile', 'LIKE', '%' . $search . '%');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "accounts";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "type_id",
        "description",
        "status",
    ];
    public function accountType()
    {
        return $this->belongsTo("App\Models\AccountType", "type_id", "id");
    }
    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }
}

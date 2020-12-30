<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "payments";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "account_id",
        "pay_to",
        "description",
        "status",
    ];
    public function account()
    {
        return $this->belongsTo("App\Models\Account", "account_id", "id");
    }
    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }
}

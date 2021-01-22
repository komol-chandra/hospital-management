<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "mails";
    protected $primaryKey = "id";
    protected $fillable = [
        "mail_to",
        "subject",
        "message",
        "file",
        "today_date",
        "today_time",
        "status",
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }
}

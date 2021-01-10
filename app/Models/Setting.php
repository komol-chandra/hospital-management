<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = "settings";
    protected $primaryKey = "id";
    protected $fillable = [
        "title",
        "contact",
        "email",
        "address",
        "facebook",
        "linkedin",
        "twitter",
        "instagram",
        "google",
        "youtube",
        "footer_text",
        "footer_year",
        "favicon",
        "small_logo",
        "logo",
        "white_logo",
    ];
}

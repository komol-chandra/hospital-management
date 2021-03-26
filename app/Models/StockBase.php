<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockBase extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "stock_bases";
    protected $primaryKey = "id";
    protected $fillable = [
        "manufacturer_id",
        "today_date",
        "discounted_amount",
        "vat_amount",
        "other_amount",
        "grand_total",
        "pay",
        "due",
        "status",
    ];
    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockDetails extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "stock_details";
    protected $primaryKey = "id";
    protected $fillable = [
        "medicine_id",
        "stock_base_id",
        "today_date",
        "qty",
        "batch",
        "purchase_rate",
        "sale_rate",
        "exp_date",
        "sub_total",
    ];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }
    public function medicine(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo("App\Models\Medicine", "medicine_id", "id");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineStockSale extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "medicine_stock_sales";
    protected $primaryKey = "id";
    protected $fillable = [
        "medicine_id",
        "today_date",
        "batch",
        "total_stock",
        "total_sale",
        "stock_count",
        "sale_count",
        "exp_date",
    ];
    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }
}

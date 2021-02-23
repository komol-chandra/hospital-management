<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestBillInfo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "test_bill_infos";
    protected $primaryKey = "id";
    protected $fillable = [
        "test_bill_id",
        "test_id",
        "description",
        "quantity",
        "price",
        "sub_total",
    ];

    public function testBill()
    {
        return $this->belongsTo("App\Models\TestBill", "test_bill_id", "id");
    }
    public function test()
    {
        return $this->belongsTo("App\Models\Test", "test_id", "id");
    }
}

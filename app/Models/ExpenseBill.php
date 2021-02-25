<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseBill extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "expense_bills";
    protected $primaryKey = "id";
    protected $fillable = [
        "date",
        "expense_id",
        "amount",
        "details",
        "status",
    ];

    public function expenses()
    {
        return $this->belongsTo("App\Models\Expense", "expense_id", "id");
    }

    public function users()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");

    }
}

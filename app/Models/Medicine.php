<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "medicines";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "type_id",
        "generic_id",
        "manufacturer_id",
        "sku",
        "tax",
        "details",
        "picture",
        "per_box",
        "price",
        "dosage",
        "vat",
        "unit_type_id",
        "single_unit_weight",
        "box_weight",
        "minimum_unit",
        "unit_location",
        "status",
    ];
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('sku', 'LIKE', '%' . $search . '%')
            ->orWhereHas('medicineType', function ($query) use ($search) {
                $query->Where("name", "LIKE", "%" . $search . "%");
            })
            ->orWhereHas('generic', function ($query) use ($search) {
                $query->Where("name", "LIKE", "%" . $search . "%");
            })
            ->orWhereHas('manufacturer', function ($query) use ($search) {
                $query->Where("name", "LIKE", "%" . $search . "%");
            });
    }

    public function unit()
    {
        return $this->belongsTo("App\Models\UnitType", "unit_type_id", "id");
    }
    public function user()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }
    public function medicineType()
    {
        return $this->belongsTo("App\Models\MedicineType", "type_id", "id");
    }
    public function generic()
    {
        return $this->belongsTo("App\Models\Generic", "generic_id", "id");
    }
    public function manufacturer()
    {
        return $this->belongsTo("App\Models\Manufacturer", "manufacturer_id", "id");
    }
    public function medicineGet()
    {
        return $this->hasMany(PrescriptionMedicine::class, 'medicine_id', 'id');
    }
}

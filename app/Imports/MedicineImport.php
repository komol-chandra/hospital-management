<?php

namespace App\Imports;

use App\Models\Medicine;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MedicineImport implements
ToModel,
WithHeadingRow,
SkipsOnError
// WithValidation

{
    use Importable, SkipsErrors;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Medicine([
            'name'            => $row['name'],
            'type_id'         => $row['type name'],
            'generic_id'      => $row['generic name'],
            'manufacturer_id' => $row['manufacturer name'],
            'dosage'          => $row['dosage'],
            'vat'             => $row['vat'],
            'unit_type_id'    => $row['phone'],
            'unit_type_id'    => $row['phone'],
            'box_weight'      => $row['box_weight'],
            'minimum_unit'    => $row['minimum_unit'],
            'unit_location'   => $row['unit_location'],
            'sku'             => $row['sku'],
            'tax'             => $row['tax'],
            'details'         => $row['details'],
            'per_box'         => $row['per_box'],
            'price'           => $row['price'],
            'created_by'      => 1,
        ]);
    }
    // public function rules(): array
    // {
    //     return [
    //         '*.email' => ['email', 'unique:patients,email'],
    //         '*.code'  => ['code', 'unique:patients,code'],
    //     ];
    // }

}

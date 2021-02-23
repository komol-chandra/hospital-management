<?php

namespace App\Imports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PatientImport implements
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
        return new Patient([
            'name'    => $row['name'],
            'code'    => $row['code'],
            'email'   => $row['email'],
            'address' => $row['address'],
            'mobile'  => $row['mobile'],
            'phone'   => $row['phone'],
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

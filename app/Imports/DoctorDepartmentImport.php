<?php

namespace App\Imports;

use App\DoctorDepartment;
use Maatwebsite\Excel\Concerns\ToModel;

class DoctorDepartmentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DoctorDepartment([
            //
        ]);
    }
}

<?php

namespace App\Exports;

use App\Models\Medicine;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MedicineViewExport implements FromView
{
    public function view(): View
    {
        $data = Medicine::with('user', 'medicineType', 'generic', 'manufacturer', 'unit')->get();
        return view('backend.exports.medicine.view', compact('data'));
    }
}

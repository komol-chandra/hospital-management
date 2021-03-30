<?php

namespace App\Exports;

use App\Models\Medicine;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class MedicineExport implements
FromCollection,
ShouldAutoSize,
WithMapping,
WithHeadings,
WithEvents
{
    use Exportable;
    private $fileName = "medicine.xlsx";

    public function collection()
    {
        $data = Medicine::with('user', 'medicineType', 'generic', 'manufacturer', 'unit')->get();
        // dd($data);
        return $data;
    }

    public function map($data): array
    {
        return [
            $data->name ?? null,
            $data->medicineType['name'] ?? null,
            $data->generic['name'] ?? null,
            $data->manufacturer['name'] ?? null,
            $data->dosage ?? null,
            $data->vat ?? null,
            $data->unit['name'] ?? null,
            $data->single_unit_weight ?? null,
            $data->box_weight ?? null,
            $data->minimum_unit ?? null,
            $data->unit_location ?? null,
            $data->sku ?? null,
            $data->tax ?? null,
            $data->details ?? null,
            $data->per_box ?? null,
            $data->price ?? null,
            $data->user['name'] ?? null,
        ];
    }
    public function headings(): array
    {
        return [
            "Name",
            "Type Name",
            "Generic Name",
            "Manufacturer Name",
            "Dosage",
            "Vat",
            "Unit Type Name",
            "Single Unit Weight",
            "Box Weight",
            "Minimum Unit",
            "Unit Location",
            "Sku",
            "Tax",
            "Details",
            "Per Box",
            "Price",
            "Created By",
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:Q1')->applyFromArray([
                    'font'      => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'borders'   => [
                        'top' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                    'fill'      => [
                        'fillType'   => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        'rotation'   => 90,
                        'startColor' => [
                            'argb' => 'FFA0A0A0',
                        ],
                        'endColor'   => [
                            'argb' => 'FFFFFFFF',
                        ],
                    ],

                ]);
            },
        ];
    }
}

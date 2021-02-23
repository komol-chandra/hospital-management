<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class PatientExport implements
FromCollection,
ShouldAutoSize,
WithMapping,
WithHeadings,
WithEvents
{
    use Exportable;
    private $fileName = "patients.xlsx";

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Patient::with('blood', 'user')->get();
        return $data;
        // dd($data);
    }
    /**
     * @return \Illuminate\Support\Collection
     * @return  App\Models\Patient
     */
    public function map($patient): array
    {
        return [
            $patient->name ?? null,
            $patient->code ?? null,
            $patient->email ?? null,
            $patient->address ?? null,
            $patient->mobile ?? null,
            $patient->phone ?? null,
            $patient->birthday ?? null,
            $patient->blood['name'] ?? null,
        ];
    }
    public function headings(): array
    {
        return [
            "Name",
            "Code",
            "Email",
            "Address",
            "Mobile",
            "Phone",
            "Birthday",
            "Blood",
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:H1')->applyFromArray([
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

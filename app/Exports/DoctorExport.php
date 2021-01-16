<?php

namespace App\Exports;

use App\Models\Doctor;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class DoctorExport implements
ShouldAutoSize,
WithMapping,
WithHeadings,
WithEvents,
FromQuery
{
    use Exportable;
    private $fileName = "doctors.xlsx";

    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return Doctor::query();
    }
    // public function view(): View
    // {

    //     return view('backend.exports.department.department', [
    //         "departments" => DoctorDepartment::all(),
    //     ]);
    // }
    public function map($doctor): array
    {
        return [
            $doctor->name,
            $doctor->departments->name,
            $doctor->mobile,
        ];
    }
    public function headings(): array
    {
        return [
            "Name",
            "Department",
            "Mobile",
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:B1:C1')->applyFromArray([
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

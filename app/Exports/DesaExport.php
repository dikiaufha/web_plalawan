<?php

namespace App\Exports;

use App\Models\DesaExcelModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DesaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DesaExcelModel::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'Desa',
            'Laki - Laki',
            'Perempuan',
            'L + P',
            'Rumah Tangga',
        ];
    }
}

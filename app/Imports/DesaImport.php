<?php

namespace App\Imports;

use App\Models\DesaExcelModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DesaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DesaExcelModel([
            'desa'     => $row['Desa'],
            'lakilaki'    => $row['Laki - Laki'],
            'perempuan'    => $row['Perempuan'],
            'total'    => $row['L + P'],
            'rumah_tangga'    => $row['Rumah Tangga'],
        ]);
    }
}

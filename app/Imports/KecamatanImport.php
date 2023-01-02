<?php

namespace App\Imports;

use App\Models\KecamatanModel;
use Maatwebsite\Excel\Concerns\ToModel;

class KecamatanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KecamatanModel([
            'puskesmas' => $row['puskesmas'],
            'lakilaki' => $row['laki-laki'],
            'perempuan' => $row['perempuan'],
            'total' => $row['l+p'],
            'rumah_tangga' => $row['rumah tangga'],
            'luas_wilayah' => $row['luas wilayah'],
        ]);
    }
}

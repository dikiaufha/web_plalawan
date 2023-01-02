<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KecamatanExcelModel extends Model
{
    protected $table = 'kecamatan_excel';
    protected $primaryKey = 'id_kecamatan_excel';
    protected $fillable = [
        'puskesmas',
        'laki_laki',
        'perempuan',
        'total',
        'rumah_tangga',
        'luas_wilayah',
    ];
    use HasFactory;
}

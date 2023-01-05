<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesaExcelModel extends Model
{
    protected $table = 'desa_excel';
    protected $primaryKey = 'id_desa_excel';
    protected $fillable = [
        'desa',
        'lakilaki',
        'perempuan',
        'total',
        'rumah_tangga',
        'defunct_ind',
    ];
    use HasFactory;
}

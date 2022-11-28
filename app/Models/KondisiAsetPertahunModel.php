<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiAsetPertahunModel extends Model
{
    protected $table = 'kondisiaset_pertahun';
    protected $primaryKey = 'id_kondisiaset_pertahun';
    protected $fillable = [
        'id_tahun',
        'baik',
        'rusak_ringan',
        'rusak_berat',
        'defunct_ind'
    ];
    use HasFactory;
}

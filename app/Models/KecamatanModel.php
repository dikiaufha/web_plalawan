<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KecamatanModel extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kec';
    protected $fillable = [
        'nama_kecamatan',
        'defunct_ind'
    ];
    use HasFactory;
}

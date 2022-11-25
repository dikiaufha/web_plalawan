<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsentrasiNakesModel extends Model
{
    protected $table = 'konsentrasi_nakes';
    protected $primaryKey = 'id_konsentrasi';
    protected $fillable = [
        'nama',
        'defunct_ind'
    ];
    use HasFactory;
}

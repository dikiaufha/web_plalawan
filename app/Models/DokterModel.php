<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterModel extends Model
{
    protected $table = 'dokter';
    protected $fillable = [
        'name_dokter',
        'alamat',
        'defunct_ind',
    ];
    use HasFactory;
}

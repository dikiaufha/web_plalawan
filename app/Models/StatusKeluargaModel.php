<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKeluargaModel extends Model
{
    protected $table = 'status_dalamkeluarga';
    protected $primaryKey = 'id_status_dalamkeluarga';
    protected $fillable = [
        'status_dalamkeluarga',
        'defunct_ind'
    ];
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaskesModel extends Model
{
    protected $table = 'faskes';
    protected $fillable = [
        'name_faskes',
        'alamat_faskes',
        'defunct_ind'
    ];
    use HasFactory;
}

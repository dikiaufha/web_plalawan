<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datafaskes extends Model
{
    use HasFactory;

    protected $table = 'tb_customer_tabel';
    protected $primaryKey = 'customer_id';
    protected $fillable = ['customer_name', 'contact_name', 'address', 'city'];

}

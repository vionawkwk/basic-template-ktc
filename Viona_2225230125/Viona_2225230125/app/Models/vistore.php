<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vistore extends Model
{
    use HasFactory;
    protected $fillable = ['id_produk', 'nama_produk', 'stok'];
    protected $table = 'vistore';
    public $timestamps = false;
}

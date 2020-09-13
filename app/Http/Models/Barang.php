<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model{
    public $timestamps = false;
    protected $fillable = [
        'namabarang', 'hargabarang', 'stock'
    ];
}
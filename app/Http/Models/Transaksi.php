<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model{
    public $timestamps = false;
    protected $fillable = [
        'itemid', 'usrid', 'status'
    ];

}
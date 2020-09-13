<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model{
    public $timestamps = false;
    protected $fillable = [
        'itemid', 'usrid', 'status'
    ];

}
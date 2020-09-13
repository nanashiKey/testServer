<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Redeemed extends Model{
    public $timestamps = false;
    protected $fillable = [
        'hadiahid', 'usrid', 'redeemed'
    ];

}
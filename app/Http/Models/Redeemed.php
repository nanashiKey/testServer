<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redeemed extends Model{

    protected $fillable = [
        'hadiahid', 'usrid', 'redeemed'
    ];

}
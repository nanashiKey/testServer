<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hadiah extends Model{

    protected $fillable = [
        'namahadiah', 'point', 'banyakitem'
    ];
    
}
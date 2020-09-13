<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Hadiah extends Model{
    public $timestamps = false;
    protected $fillable = [
        'namahadiah', 'point', 'banyakitem'
    ];
    
}
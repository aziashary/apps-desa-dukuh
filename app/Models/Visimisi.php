<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    protected $table = 'visimisi';
    
    protected $fillable = [
        'id_visimisi',
        'visi',
        'misi',
    ];
}

          
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    
    protected $fillable = [
        'id_komentar',
        'nama',
        'email',
        'subjek',
        'komentar',
    ];
}

          
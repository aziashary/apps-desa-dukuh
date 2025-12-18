<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    protected $table = 'sejarah';
    
    protected $fillable = [
        'id_sejarah',
        'isi_sejarah',
        'gambar_sejarah',
    ];
}

          
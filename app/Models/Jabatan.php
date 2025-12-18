<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    
    protected $fillable = [
        'id_jabatan',
        'nama_jabatan',
        'id_kategori_jabatan',
        'kategori_jabatan',
    ];
}

          
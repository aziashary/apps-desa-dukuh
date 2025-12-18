<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aparaturdesa extends Model
{
    protected $table = 'aparaturdesa';
    
    protected $fillable = [
        'id_aparatur',
        'nama_aparatur',
        'id_jabatan',
        'nama_jabatan',
        'kategori_jabatan',
        'facebook_aparatur',
        'instagram_aparatur',
        'foto_aparatur',
    ];
}

          
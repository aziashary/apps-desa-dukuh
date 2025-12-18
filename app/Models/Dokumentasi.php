<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';
    
    protected $fillable = [
        'id_aparatur',
        'nama_dokumentasi',
        'kategori_dokumentasi',
        'deskripsi',
        'tanggal_dokumentasi',
        'gambar_dokumentasi',
    ];
}

          
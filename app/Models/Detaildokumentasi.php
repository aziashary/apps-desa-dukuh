<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detaildokumentasi extends Model
{
    protected $table = 'detaildokumentasi';
    
    protected $fillable = [
        'id_detaildokumentasi',
        'id_dokumentasi',
        'gambar_detaildokumentasi',
    ];

    public function dokumentasi()
    {
        return $this->hasOne('App\Model\Dokumentasi', 'id_dokumentasi', 'id_dokumentasi');
    }
}

          
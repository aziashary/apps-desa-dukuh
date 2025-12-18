<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK extends Model
{
    use HasFactory;

    protected $table = 'sk';
    
    protected $fillable = [
        'id_sk',
        'id_kodesk',
        'kode_sk',
        'jenis_sk',
        'no_sk',
        'id_warga',
        'detail_sk',
        'keterangan_sk'
    ];

    public function wargas()
    {
        return $this->hasOne('App\Models\Warga', 'id_warga', 'id_warga');
    }
    public function sks()
    {
        return $this->hasOne('App\Models\Kodesk', 'id_kodesk', 'id_kodesk');
    }
    public function kets()
    {
        return $this->hasOne('App\Models\Keterangansk', 'id_kodesk', 'id_kodesk');
    }
}

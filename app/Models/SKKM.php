<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKKM extends Model
{
    use HasFactory;

    protected $table = 'skkm';
    
    protected $fillable = [
        'no_skkm',
        'id_warga',
        'keterangan',
        'usulan_surat',
    ];

    public function wargas()
    {
        return $this->hasOne('App\Models\Warga', 'id_warga', 'id_warga');
    }
}

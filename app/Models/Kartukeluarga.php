<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kartukeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartukeluarga';
    
    protected $fillable = [
        'id_kk',
        'no_kk',
        'kepala_keluarga',
    ];

    public function wargas()
    {
        return $this->hasOne('App\Models\Warga', 'no_kk', 'no_kk');
    }
}

          
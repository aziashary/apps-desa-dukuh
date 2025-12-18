<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangansk extends Model
{
    use HasFactory;
    protected $table = 'keterangansk';
    
    protected $fillable = [
        'id_keterangansk',
        'id_kodesk',
        'kode_sk',
        'detail_keterangansk',
        'keterangan',
    ]; 
    public function sks()
    {
        return $this->hasOne('App\Models\Kodesk', 'id_kodesk', 'id_kodesk');
    }
}


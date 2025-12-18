<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_warga',   // Jika menggunakan id_warga
        'id_sk',
        'message',
        'is_read',
    ];

    // Relasi ke model User jika menggunakan id_warga
    public function warga()
    {
        return $this->belongsTo(User::class, 'id_warga', 'id_warga');
    }
    public function sks()
    {
        return $this->hasOne('App\Models\SK', 'id_sk', 'id_sk');
    }
}

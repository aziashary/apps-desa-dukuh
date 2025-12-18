<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable;


class Warga extends AuthenticatableUser implements Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'warga';
    
    protected $fillable = [
        'nik',
        'no_kk',
        'nama_warga',
        'tempat_lahir',
        'tanggal_lahir',
        'RT',
        'RW',
        'desa',
        'alamat',
        'jenis_pekerjaan',
        'jenis_kelamin',
        'agama',
        'email',
    ];

    // protected $hidden = [
    //     'remember_token',
    // ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function isAdmin()
    // {
    //     return false;
    // }

    public function isWarga()
    {
        return true;
    }
}

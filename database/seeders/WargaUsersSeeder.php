<?php

namespace Database\Seeders;
use App\Models\Warga;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


use Illuminate\Database\Seeder;

class WargaUsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'=>'Admin',
            'username'=>'admindesa',
            'email'=>'admin.net@gmail.com',
            'password'=>Hash::make('12345678'),
            'level'=>1,
        ]);
        // Mengambil data dari tabel warga
        $wargaData = Warga::get();

        // Looping data warga dan membuat record baru di tabel users
        foreach ($wargaData as $warga) {
            User::insert([
                'name' => $warga->nama_warga,
                'id_warga' => $warga->id_warga,
                'password'=>Hash::make($warga->nik), // Menggunakan bcrypt untuk mengenkripsi password
                'level' => 2,
                'username' => $warga->nik,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

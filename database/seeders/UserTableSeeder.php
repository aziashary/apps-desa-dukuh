<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin',
            'username'=>'admindesa',
            'email'=>'admin.net@gmail.com',
            'password'=>Hash::make('12345678'),
            'level'=>1,
        ]);

        User::create([
            'name'=>'Warga',
            'username'=>3202321230,
            'email'=>'warga.net@gmail.com',
            'password'=>Hash::make('12345678'),
            'level'=>2,
        ]);
    }
}

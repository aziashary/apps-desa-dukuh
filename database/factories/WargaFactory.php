<?php

namespace Database\Factories;

use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class WargaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Warga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->unique->numberBetween(3202321230, 3202332000),
            'no_kk' => $this->faker->numberBetween(3202321130, 3202321150),
            'nama_warga' => $this->faker->name,
            'tempat_lahir' => $this->faker->randomElement(['Bogor','Jakarta','Bandung','Yogyakarta']),
            'tanggal_lahir' => $this->faker->date(),
            'RT' => $this->faker->numberBetween(1, 15),
            'RW' => $this->faker->numberBetween(1, 15),
            'desa' => 'Ciaruteun Ilir',
            'alamat' => $this->faker->address,
            'jenis_pekerjaan' => $this->faker->randomElement([
                'Belum/Tidak Bekerja',
                'Aparatur/Pejabat Negara',
                'Tenaga Pengajar',
                'Wiraswasta',
                'Wirausaha',
                'Pensiunan',
                'Pelajar',
                'Mahasiswa',
            ]),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki','Perempuan']),
            'agama' => $this->faker->randomElement(['Islam','Kristen']),
            'email' => $this->faker->email
        ];
    }
}


                                    

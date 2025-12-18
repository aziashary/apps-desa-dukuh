<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keterangansk;
use Illuminate\Support\Facades\Hash;

class KeteranganskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keterangansk::create([
            'id_kodesk' => 1,
            'kode_sk' => '503',
            'detail_keterangansk' => json_encode([
                'no_sk' => 'I8',
                'nik' => 'F14',
                'warga' => [
                    [
                        'nama_warga' => 'F13',
                        'jenis_kelamin' => 'F14',
                        'tempat_lahir' => 'F15',
                        'tanggal_lahir' => 'G15',
                        'alamat' => 'F18',
                        'jenis_pekerjaan' => 'F16',
                        'agama' => 'F17',
                    ]
                ],
                'tanggal' => 'J27',
                'ttd_kepala' => 'G34',
                'jabatan' => 'G28',
            ]),
            'keterangan' => json_encode([
                'keterangan_1' => 'F22',
                'keterangan_2' => 'F33',
            ]),
            'created_at' => '2024-01-22 20:11:13',
            'updated_at' => '2024-01-22 20:54:11',
        ]);

        Keterangansk::create([
            'id_kodesk' => 2,
            'kode_sk' => '400.3.5.6',
            'detail_keterangansk' => json_encode([
                'no_sk' => 'E8',
                'warga' => [
                    [
                        'nik' => 'F14',
                        'nama_warga' => 'F13',
                        'jenis_kelamin' => 'F14',
                        'tempat_lahir' => 'F15',
                        'tanggal_lahir' => 'H15',
                        'alamat' => 'F18',
                        'jenis_pekerjaan' => 'F16',
                        'agama' => 'F17',
                    ]
                ],
                'tanggal' => 'J28',
                'ttd_kepala' => 'G33',
                'jabatan' => 'G28',
            ]),
            'keterangan' => json_encode([
                'keterangan_1' => 'F22',
                'keterangan_2' => 'F23',
            ]),
            'created_at' => '2024-01-22 20:11:13',
            'updated_at' => '2024-01-24 00:43:33',
        ]);

        Keterangansk::create([
            'id_kodesk' => 3,
            'kode_sk' => '474.3',
            'detail_keterangansk' => json_encode([
                'no_sk' => 'C4',
                'warga' => [
                    [
                        'nik' => null,
                        'nama_warga' => 'C9',
                        'jenis_kelamin' => 'C10',
                        'tempat_lahir' => null,
                        'tanggal_lahir' => null,
                        'alamat' => 'C12',
                        'jenis_pekerjaan' => null,
                        'agama' => null,
                        'umur' => 'C11'
                    ],
                    [
                        'nik' => null,
                        'nama_warga' => null,
                        'jenis_kelamin' => null,
                        'tempat_lahir' => null,
                        'tanggal_lahir' => null,
                        'alamat' => null,
                        'jenis_pekerjaan' => null,
                        'agama' => null,
                        'umur' => null
                    ]
                ],
                'tanggal' => 'D26',
                'jabatan' => 'C27',
                'ttd_pengaju' => null,
                'ttd_kepala' => 'C31',
            ]),
            'keterangan' => json_encode([
                'keterangan_1' => 'C18',
                'keterangan_2' => 'C19',
                'keterangan_3' => 'C20',
                'keterangan_4' => 'C21',
                'keterangan_5' => null,
                'keterangan_6' => null,
                'keterangan_7' => null,
                'keterangan_8' => null,
                'keterangan_9' => null,
                'keterangan_10' => null,
            ]),
            'created_at' => '2024-01-22 20:16:43',
            'updated_at' => '2024-01-22 20:45:01',
        ]);

        Keterangansk::create([
            'id_kodesk' => 4,
            'kode_sk' => '400.8.2.7',
            'detail_keterangansk' => json_encode([
                'no_sk' => 'E7',
                'warga' => [
                    [
                        'nik' => 'E19',
                        'nama_warga' => 'E13',
                        'jenis_kelamin' => 'E15',
                        'tempat_lahir' => 'E14',
                        'tanggal_lahir' => 'I14',
                        'alamat' => 'E20',
                        'jenis_pekerjaan' => 'E17',
                        'agama' => 'E18',
                        'umur' => null,
                    ],
                    [
                        'nik' => 'E29',
                        'nama_warga' => 'E23',
                        'jenis_kelamin' => 'E25',
                        'tempat_lahir' => 'E24',
                        'tanggal_lahir' => 'I24',
                        'alamat' => 'E30',
                        'jenis_pekerjaan' => 'E27',
                        'agama' => 'E28',
                        'umur' => null,
                    ]
                ],
                'tanggal' => 'M40',
                'jabatan' => 'J41',
                'ttd_pengaju' => null,
                'ttd_kepala' => 'J46',
            ]),
            'keterangan' => json_encode([
                'keterangan_1' => 'E35',
                'keterangan_2' => null,
                'keterangan_3' => null,
                'keterangan_4' => null,
                'keterangan_5' => null,
                'keterangan_6' => null,
                'keterangan_7' => null,
                'keterangan_8' => null,
                'keterangan_9' => null,
                'keterangan_10' => null,
            ]),
            'created_at' => '2024-01-22 20:53:48',
            'updated_at' => '2024-01-22 22:09:17',
        ]);

        Keterangansk::create([
            'id_kodesk' => 5,
            'kode_sk' => '400',
            'detail_keterangansk' => json_encode([
                'no_sk' => 'G7',
                'warga' => [
                    [
                        'nik' => 'E19',
                        'nama_warga' => 'E13',
                        'jenis_kelamin' => 'E15',
                        'tempat_lahir' => 'E14',
                        'tanggal_lahir' => 'G14',
                        'alamat' => 'E20',
                        'jenis_pekerjaan' => 'E17',
                        'agama' => 'E18',
                        'umur' => null,
                    ],
                    [
                        'nik' => null,
                        'nama_warga' => null,
                        'jenis_kelamin' => null,
                        'tempat_lahir' => null,
                        'tanggal_lahir' => null,
                        'alamat' => null,
                        'jenis_pekerjaan' => null,
                        'agama' => null,
                        'umur' => null,
                    ]
                ],
                'tanggal' => 'K32',
                'jabatan' => 'H33',
                'ttd_pengaju' => null,
                'ttd_kepala' => 'H38',
            ]),
            'keterangan' => json_encode([
                'keterangan_1' => 'A24',
                'keterangan_2' => null,
                'keterangan_3' => null,
                'keterangan_4' => null,
                'keterangan_5' => null,
                'keterangan_6' => null,
                'keterangan_7' => null,
                'keterangan_8' => null,
                'keterangan_9' => null,
                'keterangan_10' => null,
            ]),
            'created_at' => '2024-01-23 23:27:31',
            'updated_at' => '2024-01-23 23:34:00',
        ]);

        Keterangansk::create([
            'id_kodesk' => 6,
            'kode_sk' => '331',
            'detail_keterangansk' => json_encode([
                'no_sk' => 'F7',
                'warga' => [
                    [
                        'nik' => 'E19',
                        'nama_warga' => 'E13',
                        'jenis_kelamin' => 'E15',
                        'tempat_lahir' => 'E14',
                        'tanggal_lahir' => 'G14',
                        'alamat' => 'E20',
                        'jenis_pekerjaan' => 'E17',
                        'agama' => 'E18',
                        'umur' => null,
                    ],
                    [
                        'nik' => null,
                        'nama_warga' => null,
                        'jenis_kelamin' => null,
                        'tempat_lahir' => null,
                        'tanggal_lahir' => null,
                        'alamat' => null,
                        'jenis_pekerjaan' => null,
                        'agama' => null,
                        'umur' => null,
                    ]
                ],
                'tanggal' => 'I32',
                'jabatan' => 'G33',
                'ttd_pengaju' => null,
                'ttd_kepala' => 'G38',
            ]),
            'keterangan' => json_encode([
                'keterangan_1' => 'F26',
                'keterangan_2' => null,
                'keterangan_3' => null,
                'keterangan_4' => null,
                'keterangan_5' => null,
                'keterangan_6' => null,
                'keterangan_7' => null,
                'keterangan_8' => null,
                'keterangan_9' => null,
                'keterangan_10' => null,
            ]),
            'created_at' => '2024-01-23 23:43:52',
            'updated_at' => '2024-01-23 23:51:59',
        ]);
    }
}

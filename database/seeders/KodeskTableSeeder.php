<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kodesk;
use Illuminate\Support\Facades\Hash;

class KodeskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            Kodesk::create([
                'kode_sk' => '503',
                'jenis_sk' => 'Surat Keterangan Usaha',
                'singkatan_sk' => 'SKU',
                'keterangan_kodesk' => json_encode([
                    'keterangan_1' => 'Jenis Usaha',
                    'keterangan_2' => 'Alamat Usaha',
                ]),
                'jumlah_warga' => 1,
                'file_name' => 'sku.xlsx',
                'url_print' => 'plugin/xls/sku.xlsx',
                'created_at' => '2024-01-22 20:11:13',
                'updated_at' => '2024-01-22 20:54:11',
            ]);
    
            Kodesk::create([
                'kode_sk' => '400.3.5.6',
                'jenis_sk' => 'Surat Keterangan Keluarga Miskin',
                'singkatan_sk' => 'SKKM',
                'keterangan_kodesk' => json_encode([
                    'keterangan_1' => 'Keterangan Surat',
                    'keterangan_2' => 'Usulan Surat',
                ]),
                'jumlah_warga' => 1,
                'file_name' => 'skkm.xlsx',
                'url_print' => 'plugin/xls/skkm.xlsx',
                'created_at' => '2024-01-22 20:11:13',
                'updated_at' => '2024-01-24 00:43:33',
            ]);
    
            Kodesk::create([
                'kode_sk' => '474.3',
                'jenis_sk' => 'Surat Kematian',
                'singkatan_sk' => 'SKM',
                'keterangan_kodesk' => json_encode([
                    'keterangan_1' => 'Hari',
                    'keterangan_2' => 'Tanggal',
                    'keterangan_3' => 'Di',
                    'keterangan_4' => 'Disebabkan',
                ]),
                'jumlah_warga' => 1,
                'file_name' => 'Surat Kematian.xlsx',
                'url_print' => 'plugin/xls/Surat Kematian.xlsx',
                'created_at' => '2024-01-22 20:16:43',
                'updated_at' => '2024-01-22 20:16:43',
            ]);
    
            Kodesk::create([
                'kode_sk' => '400.8.2.7',
                'jenis_sk' => 'Surat Keterangan Tidak Memiliki Buku Nikah',
                'singkatan_sk' => 'SKBM',
                'keterangan_kodesk' => json_encode([
                    'keterangan_1' => 'Tahun Menikah',
                ]),
                'jumlah_warga' => 2,
                'file_name' => 'Surat Keterangan Tidak memiliki buku nikahh.xlsx',
                'url_print' => 'plugin/xls/Surat Keterangan Tidak memiliki buku nikahh.xlsx',
                'created_at' => '2024-01-22 20:53:48',
                'updated_at' => '2024-01-22 20:53:48',
            ]);
    
            Kodesk::create([
                'kode_sk' => '400',
                'jenis_sk' => 'Surat Keterangan Domisili',
                'singkatan_sk' => 'SKD',
                'keterangan_kodesk' => json_encode([
                    'keterangan_1' => 'Alamat',
                ]),
                'jumlah_warga' => 1,
                'file_name' => 'Surat Keterangan Domisili.xlsx',
                'url_print' => 'plugin/xls/Surat Keterangan Domisili.xlsx',
                'created_at' => '2024-01-23 23:27:31',
                'updated_at' => '2024-01-23 23:27:31',
            ]);
    
            Kodesk::create([
                'kode_sk' => '331',
                'jenis_sk' => 'Surat Keterangan Catatan Kepolisian',
                'singkatan_sk' => 'SKCK',
                'keterangan_kodesk' => json_encode([
                    'keterangan_1' => 'Keterangan Untuk',
                ]),
                'jumlah_warga' => 1,
                'file_name' => 'Surat Keterangan Catatan Kepolisian.xlsx',
                'url_print' => 'plugin/xls/Surat Keterangan Catatan Kepolisian.xlsx',
                'created_at' => '2024-01-23 23:43:52',
                'updated_at' => '2024-01-23 23:43:52',
            ]);

        }
    }
}
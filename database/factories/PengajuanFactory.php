<?php

namespace Database\Factories;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PengajuanFactory extends Factory
{

    protected $model = Pengajuan::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $MonthNow = date('M');
        $month_number = date("n",strtotime($MonthNow));

        $map = array('X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($month_number > 0) {
        foreach ($map as $roman => $int) {
            if($month_number >= $int) {
                $month_number -= $int;
                $returnValue .= $roman;
                break;
                }
            }
        }
        

        $yearNow = date('Y');
        for ($i = 0; $i < 10; $i++) {
        return [
            'no_pengajuan' => $this->faker->randomElement."PNG"."/"." ".$this->faker->unique()->numberBetween(1, 500)."  "."/ ".$returnValue." / ".$yearNow,
            'kode_sk' => $this->faker->randomElement([510,140]),
            'jenis_pengajuan' => $this->faker->randomElement(['Surat Keterangan Usaha','Surat Keterangan Keluarga Miskin']),
            'id_warga' => $this->faker->numberBetween(1, 500),
            'status_pengajuan' => $this->faker->randomElement(['Process','Denied','Approved']),
            'keterangan_1' => $this->faker->randomElement(['Aneka Gorengan','Rumah Makan','Toko','Warung','Kedai','Bengkel','Keluarga Miskin']),
            'keterangan_2' => $this->faker->address,
            'created_at' => Carbon::now()->month(rand(1, 12)),
            'updated_at' => Carbon::now()
        ];
    }
}
}

<?php

namespace Database\Factories;

use App\Models\SKKM;
use Illuminate\Database\Eloquent\Factories\Factory;

class SKKMFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SKKM::class;

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

        return [
            'no_skkm' => "140"." /"."  ".$this->faker->unique()->numberBetween(1, 500)."  "."/ ".$returnValue." / ".$yearNow,
            'id_warga' => $this->faker->numberBetween(1, 500),
            'keterangan' => 'Keluarga Miskin',
            'usulan_surat' => $this->faker->randomElement(['Untuk Berobat','Penerima Bantuan','Mustahik','Asuransi'])
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Kartukeluarga;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class KartukeluargaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kartukeluarga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no_kk' => $this->faker->numberBetween(3202321130, 3202321150),
        ];
    }
}


                                    

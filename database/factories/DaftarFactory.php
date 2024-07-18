<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Daftar>
 */
class DaftarFactory extends Factory
{
    
    
    public function definition(): array
    {
        $idPasien = \App\Models\Pasien::pluck('id')->toArray();
        return [
            'pasien_id' => $this->faker->randomElement($idPasien),
            'tanggal_daftar' => $this->faker->date(),
            'poli' => $this->faker->randomElement(['Umum', 'Gigi', 'Kandungan', 'Anak']),
            'keluhan' => $this->faker->sentence(),
            'diagnosis' => $this->faker->sentence(),
            'tindakan' => $this->faker->sentence(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SoldeConge;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoldeConge>
 */
class SoldeCongeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $year = now()->year;
        $solde_fin = 00;

        return [
            'solde_final' => $solde_fin,
            'annee' => $year
        ];
    }
}

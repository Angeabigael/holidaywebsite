<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Personnel;
use App\Models\TypeDemande;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demande>
 */
class DemandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $personnelIds = Personnel::pluck('id')->toArray();
        $typedemandeIds = TypeDemande::pluck('id')->toArray();
        $statut = ['En attente', 'Approuvé', 'Rejeté'];
        $datedebut = $this->faker->dateTimeBetween('now', '+1 month');
        return [
            'motif' => $this->faker->sentence(5, true),
            'statut' => $this->faker->randomElement($statut),
            'date_debut_conge' => $datedebut,
            'date_fin_conge' => (clone $datedebut)->modify('+'.$this->faker->numberBetween(1, 15).'days'),
            'periode_conge' => $this->faker->numberBetween(1, 15),
            'personnels_id' => $this->faker->randomElement($personnelIds),
            'types_demandes_id' => $this->faker->randomElement($typedemandeIds)
        ];
    }
}

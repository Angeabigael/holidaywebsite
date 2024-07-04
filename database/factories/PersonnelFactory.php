<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Structure;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personnel>
 */
class PersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $structureIds = Structure::pluck('id')->toArray();
        $corps = ['Civils', 'Militaires'];
        return [
            'matricule' => $this->faker->numberBetween(10260623, 18756289),
            'nom' => $this->faker->lastName,
            'prenoms' => $this->faker->firstName,
            'corps' => $this->faker->randomElement($corps),
            'structures_id' => $this->faker->randomElement($structureIds)
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SoldeConge;

class SoldeCongeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lastyear = now()->year - 1;
        $personnel = SoldeConge::where('annee', $lastyear)->get();
        $personnel->each(function ($person) {
            SoldeConge::factory()->create([
                'solde_initial' => $person->solde_final + 30,
                'personnels_id' => $person->personnels_id
            ]);
        });
    }
}

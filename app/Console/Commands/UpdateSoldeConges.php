<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SoldeConge;

class UpdateSoldeConges extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-solde-conges';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mettre à jour le solde chaque année';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lastYear = now()->year - 1;
        $users = SoldeConge::where('annee', $lastYear)->get();

        foreach ($users as $user) {
            SoldeConge::create([
                'personnels_id'  => $user->personnels_id,
                'solde_initial' => $user->solde_final + 30,
                'solde_final'   => $user->solde_final,
                'annee'         => now()->year,
            ]);
        }
    }
}

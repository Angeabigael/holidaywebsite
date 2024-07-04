<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Database\Factories\StructureFactory;
use App\Models\User;
use App\Models\Structure;
use App\Models\Personnel;
use App\Models\TypeDemande;
use App\Models\Demande;
use App\Models\SoldeConge;
use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Personnel::factory(100)->create();
        //DB::table('users')->delete();

       /* User::create([
            'email'  => 'lucfranc@gmail.com',
            'password'  => 'azerty',
            'personnels_id' => 1
        ]);

        User::create([
            'email'  => 'assogbaangemarie@gmail.com',
            'password'  => 'azerty',
            'personnels_id' => 2
        ]);

        User::create([
            'email'  => 'princegrand@gmail.com',
            'password'  => 'azerty',
            'personnels_id' => 3
        ]); */

       /* $pers = Personnel::where('id', '>', 3)->get();
        $pers->each(function ($per) {
            User::factory()->create([
                'personnels_id' => $per->id
            ]);
        });*/

        /*Admin::create([
            'name' => 'superieur',
            'password' => Hash::make('admin')
        ]);

        Admin::create([
            'name' => 'grh',
            'password' => Hash::make('admin')
        ]);*/

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;

class AdminRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Créer des roles
       // $roleGrh = Role::create(['name' => 'grh', 'guard_name' => 'admin']);
        //$roleSuperieur = Role::create(['name' => 'superieur', 'guard_name' => 'admin']);

        // Créer des permissions
        //ermission::create(['name' => 'manage-soldes',  'guard_name' => 'admin']);
        //Permission::create(['name' => 'manage-personnel', 'guard_name' => 'admin']);
        //Permission::create(['name' => 'manage-demandes', 'guard_name' => 'admin']);

        // Assigner les permissions aux rôles
        //$roleGrh->givePermissionTo(['manage-soldes', 'manage-personnel']);
        //$roleSuperieur->givePermissionTo(['manage-demandes']);

        // Assigner les rôles aux administrateurs (remplace les emails par ceux de tes admins)
        $adminGrh = Admin::where('name', 'grh')->first();
        $adminSuperieur = Admin::where('name', 'superieur')->first();

        if ($adminGrh) {
            $adminGrh->assignRole('grh');
        }

        if ($adminSuperieur) {
            $adminSuperieur->assignRole('superieur');
        }
    }
}

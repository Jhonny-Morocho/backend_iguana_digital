<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'admin']);


        $roleAdmin = Role::create(['name' => 'Administrator']);
        $roleAdmin->syncPermissions($permission);

        $roleDevFront = Role::create(['name' => 'Desarrollador Frontend']);
        $roleDevFront->syncPermissions($permission);


        $roleAbogado = Role::create(['name' => 'Abogado']);
        $roleAbogado->syncPermissions($permission);


        $roleGuardia = Role::create(['name' => 'Guardia']);
        $roleGuardia->syncPermissions($permission);


        $roleGuardia = Role::create(['name' => 'Pallero']);
        $roleGuardia->syncPermissions($permission);

    }
}

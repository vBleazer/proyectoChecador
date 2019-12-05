<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission list
    	Permission::create(['name' => 'Administrar usuarios']); 
    	Permission::create(['name' => 'Visualizar usuarios']); 
    	Permission::create(['name' => 'Editar usuarios']); 
    	Permission::create(['name' => 'Agregar usuarios']); 
    	Permission::create(['name' => 'Eliminar usuarios']);  

    	//Admin
        $admin = Role::create(['name' => 'Administrator']);
        $admin->givePermissionTo([
            'Visualizar usuarios',
            'Editar usuarios',
            'Agregar usuarios',
            'Eliminar usuarios'
        ]);

        //Guest
        $guest = Role::create(['name' => 'Guest']); 
        $guest->givePermissionTo([
            'Visualizar usuarios'
        ]);

        $users = User::all();
        foreach ($users as $user) {
            $user->assignRole($user->role);
        }
    }

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role0 = Role::create(['name' => 'Superadmin']);
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Secretari@']);
        $role3 = Role::create(['name' => 'Educador']);
        $role4 = Role::create(['name' => 'Auxiliar']);
        $role5 = Role::create(['name' => 'Padre']);
        $role5 = Role::create(['name' => 'Terapeuta']);
        //users y roles
        Permission::create(['name' => 'ver-rol'])->syncRoles($role0);
        Permission::create(['name' => 'crear-rol'])->syncRoles($role0);
        Permission::create(['name' => 'editar-rol'])->syncRoles($role0);
        Permission::create(['name' => 'borrar-rol'])->syncRoles($role0);

        //personal
        Permission::create(['name' => 'ver-personal'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'crear-personal'])->syncRoles([$role0, $role1]);
        Permission::create(['name' => 'editar-personal'])->syncRoles([$role0, $role1, $role2]);
        Permission::create(['name' => 'borrar-personal'])->syncRoles([$role0, $role1]);

        //infantes
        Permission::create(['name' => 'ver-infante'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'crear-infante'])->syncRoles([$role0, $role1]);
        Permission::create(['name' => 'editar-infante'])->syncRoles([$role0, $role1, $role2]);
        Permission::create(['name' => 'borrar-infante'])->syncRoles([$role0, $role1]);

        //evaluacion
        Permission::create(['name' => 'ver-evaluacion'])->syncRoles([$role1, $role2, $role4,$role5,$role6]);
        Permission::create(['name' => 'crear-evaluacion'])->syncRoles([$role0, $role3]);
        Permission::create(['name' => 'editar-evaluacion'])->syncRoles([$role0, $role3, $role4]);
        Permission::create(['name' => 'borrar-evaluacion'])->syncRoles([$role0]);


        $user = new User();
        $user->name = 'Carla Cruz';       
        $user->email = 'carla.ccc344@gmail.com';       
        $user->password = bcrypt('12345');
        $user->save();
        $user->assignRole('Superadmin');

        
        $user = new User();
        $user->name = 'Carol Selena';       
        $user->email = 'admin.carol@gmail.com';       
        $user->password = bcrypt('12345');
        $user->save();
        $user->assignRole('Superadmin');

        $user = new User();
        $user->name = 'Guillermo Antelo';
        $user->email = 'guillermo@gmail.com';       
        $user->password = bcrypt('123123');
        $user->save();
        $user->assignRole('Administrador');

        $user = new User();
        $user->name = 'Sebastian Zeballo';
        $user->email = 'sebastian@gmail.com';       
        $user->password = bcrypt('123123');
        $user->save();
        $user->assignRole('Secretari@');

        $user = new User();
        $user->name = 'Daniel Maldonado';
        $user->email = 'daniel@gmail.com';       
        $user->password = bcrypt('123123');
        $user->save();
        $user->assignRole('Educador');

        $user = new User();
        $user->name = 'David Rojas';
        $user->email = 'david@gmail.com';       
        $user->password = bcrypt('123123');
        $user->save();
        $user->assignRole('Auxiliar');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Role1 = Role::create(['name'=>'Admin']);
        $Role2 = Role::create(['name'=>'User']);
        $Role3 = Role::create(['name'=>'Invitado']);

        Permission::create(['name'=>'user.transaccion.dashboard',
                            'description'=>'Ver el dashboard de transacciones'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name'=>'user.transaccion.informe',
                            'description'=>'Crear informes'])->syncRoles([$Role1,$Role2]);
        
        Permission::create(['name'=>'admin.user.index',
                            'description'=>'Ver listado de usuarios'])->assignRole($Role1);
        Permission::create(['name'=>'admin.user.create',
                            'description'=>'Crear usuario'])->assignRole($Role1);
        Permission::create(['name'=>'admin.user.update',
                            'description'=>'Editar usuario'])->assignRole($Role1);
        Permission::create(['name'=>'admin.user.destroy',
                            'description'=>'Eliminar usuario'])->assignRole($Role1);
                            
        Permission::create(['name'=>'admin.role.index',
                            'description'=>'Ver listado de roles'])->assignRole($Role1);
        Permission::create(['name'=>'admin.role.create',
                            'description'=>'Crear rol'])->assignRole($Role1);
        Permission::create(['name'=>'admin.rol.update',
                            'description'=>'Editar rol'])->assignRole($Role1);
        Permission::create(['name'=>'admin.rol.destroy',
                            'description'=>'Eliminar rol'])->assignRole($Role1);
    }
}

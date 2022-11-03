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

        Permission::create(['name'=>'user.transaccion.dashboard'])->syncRoles([$Role1,$Role2]);
        Permission::create(['name'=>'user.transaccion.create'])->syncRoles([$Role1,$Role2]);
        Permission::create(['name'=>'user.transaccion.informe'])->syncRoles([$Role1,$Role2]);
        
        Permission::create(['name'=>'admin.user.index'])->assignRole($Role1);
        Permission::create(['name'=>'admin.user.create'])->assignRole($Role1);
        Permission::create(['name'=>'admin.user.update'])->assignRole($Role1);
        Permission::create(['name'=>'admin.user.destroy'])->assignRole($Role1);
    }
}

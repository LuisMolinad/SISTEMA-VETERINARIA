<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //aca tengo que crear los roles y los permisos

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        Permission::create(['name' => 'ver-rol']);
        Permission::create(['name' => 'editar-rol']);
        Permission::create(['name' => 'crear-rol']);
        Permission::create(['name' => 'borrar-rol']);
        // create roles and assign created permissions
        //$role = Role::create(['name' => 'Asistente'])->givePermissionTo(Permission::all());
        $role = Role::create(['name' => 'Asistente']);
        //$role->givePermissionTo('edit articles');

        // or may be done by chaining
        /*  $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']); */

        /*        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all()); */
    }
}

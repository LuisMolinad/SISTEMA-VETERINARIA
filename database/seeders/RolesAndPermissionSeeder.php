<?php

namespace Database\Seeders;

use App\Models\propietario;
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
        // TODO aca tengo que crear los roles y los permisos

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // TODO usuarios
        Permission::create(['name' => 'ver-Usuarios']);
        Permission::create(['name' => 'editar-Usuarios']);
        Permission::create(['name' => 'crear-Usuarios']);
        Permission::create(['name' => 'borrar-Usuarios']);

        // TODO Roles
        Permission::create(['name' => 'ver-rol']);
        Permission::create(['name' => 'editar-rol']);
        Permission::create(['name' => 'crear-rol']);
        Permission::create(['name' => 'borrar-rol']);


        // TODO Propietario
        $propietario = [
            Permission::create(['name' => 'ver-Propietario']),
            Permission::create(['name' => 'editar-Propietario']),
            Permission::create(['name' => 'crear-Propietario']),
            Permission::create(['name' => 'borrar-Propietario']),
        ];

        // TODO Mascota
        $Mascota = [
            Permission::create(['name' => 'ver-Mascota']),
            Permission::create(['name' => 'editar-Mascota']),
            Permission::create(['name' => 'crear-Mascota']),
            Permission::create(['name' => 'borrar-Mascota']),
        ];

        // TODO Cirugia
        $cirugia = [
            Permission::create(['name' => 'ver-Cirugia']),
            Permission::create(['name' => 'editar-Cirugia']),
            Permission::create(['name' => 'crear-Cirugia']),
            Permission::create(['name' => 'borrar-Cirugia']),
        ];

        //TODO Actas Defuncion
        $actasDefuncion = [
            Permission::create(['name' => 'ver-ActasDefuncion']),
            Permission::create(['name' => 'crear-ActasDefuncion']),
        ];
        // TODO RecetaMedica  
        $recetaMedica = [
            Permission::create(['name' => 'ver-RecetaMedica']),
            Permission::create(['name' => 'crear-RecetaMedica']),

        ];

        //TODO Vacuna 
        $vacuna = [
            Permission::create(['name' => 'ver-Vacuna']),
            Permission::create(['name' => 'editar-Vacuna']),
            Permission::create(['name' => 'crear-Vacuna']),
            Permission::create(['name' => 'borrar-Vacuna']),
        ];

        //TODO CitaVacuna si se dan cuenta aca hay permisos extras, pero estos se adecuan al flujo de las pantallas en mi caso necesito como extra, gestionar y consultar 
        $citaVacuna = [
            Permission::create(['name' => 'ver-CitaVacuna']),//para nav que redirecicona al index principal,tabla 1
            Permission::create(['name' => 'editar-CitaVacuna']),
            Permission::create(['name' => 'consultar-CitaVacuna']),//consultar del CRUD
            Permission::create(['name' => 'gestionar-CitaVacuna']),//vista gestionar para una mascota especifica, tabla 2
            Permission::create(['name' => 'crear-CitaVacuna']),
            Permission::create(['name' => 'borrar-CitaVacuna']),
        ];
        //TODO Limpieza Dental
        $limpiezaDental = [
            Permission::create(['name' => 'ver-LimpiezaDental']),
            Permission::create(['name' => 'editar-LimpiezaDental']),
            Permission::create(['name' => 'crear-LimpiezaDental']),
            Permission::create(['name' => 'borrar-LimpiezaDental']),
        ];
        //TODO CITA SERVICIO 
        $citaServicio = [
            Permission::create(['name' => 'ver-CitaServicio']),
            Permission::create(['name' => 'editar-CitaServicio']),
            Permission::create(['name' => 'crear-CitaServicio']),
            Permission::create(['name' => 'borrar-CitaServicio']),
        ];

        //TODO Recordatorio
        $recordatorio = [
            Permission::create(['name' => 'ver-Recordatorio']),
            Permission::create(['name' => 'editar-Recordatorio']),
            Permission::create(['name' => 'crear-Recordatorio']),
            Permission::create(['name' => 'borrar-Recordatorio']),
        ];


        //TODO TIPO SERVICIO
        $tipoServicio = [
            Permission::create(['name' => 'ver-TipoServicio']),
            Permission::create(['name' => 'editar-TipoServicio']),
            Permission::create(['name' => 'crear-TipoServicio']),
            Permission::create(['name' => 'borrar-TipoServicio']),
        ];

        // create roles and assign created permissions
        //$role = Role::create(['name' => 'Asistente'])->givePermissionTo(Permission::all());
        $roleDoctora = Role::create(['name' => 'Doctora'])->givePermissionTo([
            $propietario, $Mascota, $cirugia,
            $actasDefuncion, $recetaMedica,  $vacuna

        ]);
        $roleAsistente = Role::create(['name' => 'Asistente Administrativo'])->givePermissionTo([
            $propietario, $Mascota, $citaVacuna,
            $vacuna, $cirugia, $limpiezaDental,
            $citaServicio, $recordatorio
        ]);
        $roleGerente = Role::create(['name' => 'Gerente General'])->givePermissionTo([
            $citaVacuna, $limpiezaDental,
            $cirugia, $tipoServicio,
            $citaServicio, $recordatorio
        ]);
        //$role = Role::create(['name' => 'Asistente']);
        //$role->givePermissionTo('edit articles');

        // or may be done by chaining
        /*  $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']); */

        /*        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all()); */
    }
}

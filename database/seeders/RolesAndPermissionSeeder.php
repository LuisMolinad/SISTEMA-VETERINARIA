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

        // TODO Cirugia para todos menos la doctora
        $cirugia = [
            Permission::create(['name' => 'ver-Cirugia']), //index
            Permission::create(['name' => 'editar-Cirugia']), //editar
            Permission::create(['name' => 'crear-Cirugia']), //crear
            Permission::create(['name' => 'borrar-Cirugia']), //borrar
            Permission::create(['name' => 'consultar-Cirugia']), //consultar
            Permission::create(['name' => 'gestionar-Cirugia']), //vista gestionar tabla2
            Permission::create(['name' => 'crear-recetaPostoperatoria']), //crear receta postoperatoria

        ];
        //TODO Especificamente la doctora

        /*
        Estos son solo para la doctora
        ver-Cirugia, consultar-Cirugia,gestionar-Cirugia,crear-recetaPostoperatoria, 
        
        Estos son todos menos la doctora
        ver-Cirugia, crear-Cirugia,consultar-Cirugia,gestionar-Cirugia,
        editar-Cirugia,borrar-Cirugia*/

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
            Permission::create(['name' => 'consultar-Vacuna']),
        ];

        //TODO CitaVacuna si se dan cuenta aca hay permisos extras, pero estos se adecuan al flujo de las pantallas en mi caso necesito como extra, gestionar y consultar 
        $citaVacuna = [
            Permission::create(['name' => 'ver-CitaVacuna']), //para nav que redirecicona al index principal,tabla 1
            Permission::create(['name' => 'editar-CitaVacuna']),
            Permission::create(['name' => 'consultar-CitaVacuna']), //consultar del CRUD
            Permission::create(['name' => 'gestionar-CitaVacuna']), //vista gestionar para una mascota especifica, tabla 2
            Permission::create(['name' => 'crear-CitaVacuna']),
            Permission::create(['name' => 'borrar-CitaVacuna']),
        ];
        //TODO Limpieza Dental
        $limpiezaDental = [
            Permission::create(['name' => 'ver-LimpiezaDental']), //para nav que redirecicona al index principal,tabla 1
            Permission::create(['name' => 'editar-LimpiezaDental']),
            Permission::create(['name' => 'consultar-LimpiezaDental']), //consultar del CRUD
            Permission::create(['name' => 'gestionar-LimpiezaDental']), //vista gestionar para una mascota especifica, tabla 2 [Consultar, eliminar, editar]
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
            Permission::create(['name' => 'enviar-Recordatorio']),
        ];


        //TODO TIPO SERVICIO
        $tipoServicio = [
            Permission::create(['name' => 'ver-TipoServicio']),
            Permission::create(['name' => 'editar-TipoServicio']),
            Permission::create(['name' => 'crear-TipoServicio']),
            Permission::create(['name' => 'borrar-TipoServicio']),
            Permission::create(['name' => 'consultar-TipoServicio']),
        ];


        //?Permisos no creados para reporte, porque se determino que todos puedieran verlo

        //TODO Linea Historial
        $lineaHistorial = [
            Permission::create(['name' => 'ver-LineaHistorial']),
            Permission::create(['name' => 'editar-LineaHistorial']),
            Permission::create(['name' => 'crear-LineaHistorial']),
            Permission::create(['name' => 'borrar-LineaHistorial']),
            Permission::create(['name' => 'consultar-LineaHistorial']),
        ];

        //TODO Record Vacunacion
        $RecordVacunacion = [
            Permission::create(['name' => 'ver-RecordVacunacion']),
            Permission::create(['name' => 'editar-RecordVacunacion']),
            Permission::create(['name' => 'crear-RecordVacunacion']),
            Permission::create(['name' => 'borrar-RecordVacunacion']),
            Permission::create(['name' => 'consultar-RecordVacunacion']),
        ];




        // create roles and assign created permissions
        //$role = Role::create(['name' => 'Asistente'])->givePermissionTo(Permission::all());
        $roleDoctora = Role::create(['name' => 'Doctora'])->givePermissionTo([
            $propietario, $Mascota,
            $actasDefuncion, $recetaMedica,  $vacuna,
            'ver-Cirugia', 'consultar-Cirugia', 'gestionar-Cirugia', 'crear-recetaPostoperatoria', $lineaHistorial, $RecordVacunacion

        ]);
        $roleAsistente = Role::create(['name' => 'Asistente Administrativo'])->givePermissionTo([
            $propietario, $Mascota, $citaVacuna,
            $vacuna, $limpiezaDental,
            $citaServicio, $recordatorio,
            'ver-Cirugia', 'crear-Cirugia', 'consultar-Cirugia', 'gestionar-Cirugia', 'editar-Cirugia', 'borrar-Cirugia',
            'ver-LineaHistorial',
            'consultar-LineaHistorial',
            'ver-RecordVacunacion',
            'consultar-RecordVacunacion'
        ]);
        $roleGerente = Role::create(['name' => 'Gerente General'])->givePermissionTo([
            $citaVacuna, $limpiezaDental,
            $tipoServicio,
            $citaServicio, $recordatorio,
            'ver-Cirugia', 'crear-Cirugia', 'consultar-Cirugia', 'gestionar-Cirugia', 'editar-Cirugia', 'borrar-Cirugia',
            'ver-LineaHistorial',
            'consultar-LineaHistorial',
            'ver-RecordVacunacion',
            'consultar-RecordVacunacion'
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

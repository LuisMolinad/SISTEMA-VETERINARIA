<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//SPATIE
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [

            //Tabla rol
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Tabla Propietario
            'ver-propietario',
            'crear-propietario',
            'editar-propietario',
            'borrar-propietario',

            //tabla cita vacuna

            'ver-citaVacuna',
            'crear-citaVacuna',
            'editar-citaVacuna',
            'borrar-citaVacuna',

            //tabla citasServicios

            'ver-citasServicios',
            'crear-citasServicios',
            'editar-citasServicios',
            'borrar-citasServicios',

        ];
        foreach ($permisos as $permiso) {
            /* Estoy insertando todo en la tabla Permission de la BASE */
            Permission::create(['name' => $permiso]);
        }
    }
}

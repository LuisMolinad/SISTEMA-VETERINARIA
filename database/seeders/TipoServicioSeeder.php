<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\tipoServicio;
use Illuminate\Support\Facades\DB;


class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  $data= [
                [
                    'nombreServicio'=> 'Corte',
                    'descripcionServicio'=> 'Servicio de corte de cabello a mascotas que se programa según disponibilidad',
                    'disponibilidadServicio'=>'1',
                ],
                [
                    'nombreServicio'=> 'Baño',
                    'descripcionServicio'=> 'Servicio de baño para mascotas que se programa según disponibilidad',
                    'disponibilidadServicio'=>'1',
                    
                ],
                [
                    'nombreServicio'=> 'Baño y corte',
                    'descripcionServicio'=> 'Servicio de corte y baño a mascotas que se programa según disponibilidad',
                    'disponibilidadServicio'=>'1',
                ],
                [
                    'nombreServicio'=> 'Grooming felino',
                    'descripcionServicio'=> 'Servicio de limpieza de gatos. Incluye baño completo, cepillado y corte de pelo, corte de uñas y limpieza de oídos.',
                    'disponibilidadServicio'=>'0',
                ],
            ];

            DB::table('tipo_servicios')->insert($data);
    }
}

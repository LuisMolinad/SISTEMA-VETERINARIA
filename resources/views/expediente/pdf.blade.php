<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte {{$expediente->mascota->idMascota}}</title>

    <!--CSS Local-->
    <!--
    <link rel="stylesheet" href="{{secure_asset('css/pdf.css')}}">-->

    <link rel="stylesheet" href="{{ public_path('css/Expediente/tabla_vacuna.css') }}">

</head>
<body>
    <header class="header">
    </header>
        <main>
            <div class="container">

                <div class="page-1">
                    <center><h1>CLINICA VETERINARIA PET'S PARADISE</h1></center>
                    <center><h2>REPORTE DE LA MASCOTA {{$expediente->mascota->idMascota}}</h2></center>
                    <fieldset class="seccion">
                        <legend>Mascota</legend>
                        <p class="articulo"><span class="campo">ID: </span>{{$expediente->mascota->id}}</p>
                        <p class="articulo"><span class="campo">Codigo de la mascota: </span> {{$expediente->mascota->idMascota}}</p>
                        <p class="articulo"><span class="campo">Nombre de la mascota: </span> {{$expediente->mascota->nombreMascota}}</p>
                        <p class="articulo"><span class="campo">Estado de la mascota: </span> {{$expediente->mascota->fallecidoMascota}}</p>
                        <p class="articulo"><span class="campo">Raza mascota: </span> {{$expediente->mascota->razaMascota}}</p>
                        <p class="articulo"><span class="campo">Especie: </span> {{$expediente->mascota->especie}}</p>
                        <p class="articulo"><span class="campo">Color:</span> {{$expediente->mascota->colorMascota}}</p>
                        <p class="articulo"><span class="campo">Sexo de la mascota: </span> {{$expediente->mascota->sexoMascota}}</p>
                        <p class="articulo"><span class="campo">Fecha de nacimiento: </span> {{$expediente->mascota->fechaNacimiento}}</p>
                        <p class="articulo"><span class="campo">Caracteristicas especiales:</span><br>{{$expediente->mascota->caracteristicasEspeciales}}</p>
                    </fieldset>
                    <br>
                    <fieldset class="seccion">
                        <legend>Propietario de la mascota</legend>
                        <p class="articulo"><span class="campo">ID: </span>{{$expediente->mascota->propietario->id}}</p>
                        <p class="articulo"><span class="campo">Nombre del propietario: </span>{{$expediente->mascota->propietario->nombrePropietario}}</p>
                        <p class="articulo"><span class="campo">Telefono: </span>{{$expediente->mascota->propietario->telefonoPropietario}}</p>
                        <p class="articulo"><span class="campo">Direccion: </span>{{$expediente->mascota->propietario->direccionPropietario}}</p>
                    </fieldset>
                    <br>
                    {{-- <fieldset class="seccion">
                        <legend>Expediente</legend>
                        <p class="articulo"><span class="campo">ID: </span>{{$expediente->id}}</p>
                        <?php
                            if($expediente->mascota->fallecidoMascota == "Fallecido"){
                                echo '<p class="articulo"><span class="campo">Causa del fallecimiento: </span>' . $expediente->causaFallecimiento . '</p>';
                            }                        
                        ?>
                    </fieldset> --}}
                </div>

                <div class="page-break"></div>

                <div class="page-2">
                    <center><h1>VACUNAS APLICADAS</h1></center>
                    <table id="expediente-vacunas-tabla">
                        <thead>
                            <tr>
                                <th>Aplicacion</th>
                                <th>Refuerzo</th>
                                <th>Peso (libras)</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr><p>Rabia</p></tr>
                            <tr>
                                <td>24 de mayo del 2021</td>
                                <td>24 de mayo del 2022</td>
                                <td>8.9</td>
                            </tr>

                            <tr><p>Rabia</p></tr>
                            <tr>
                                <td>24 de mayo del 2021</td>
                                <td>24 de mayo del 2022</td>
                                <td>8.9</td>
                            </tr>
                            <tr>
                                <td>24 de mayo del 2021</td>
                                <td>24 de mayo del 2022</td>
                                <td>8.9</td>
                            </tr>
                            <tr>
                                <td>24 de mayo del 2021</td>
                                <td>24 de mayo del 2022</td>
                                <td>8.9</td>
                            </tr>
                            <tr>
                                <td>24 de mayo del 2021</td>
                                <td>24 de mayo del 2022</td>
                                <td>8.9</td>
                            </tr>
                            <tr>
                                <td>24 de mayo del 2021</td>
                                <td>24 de mayo del 2022</td>
                                <td>8.9</td>
                            </tr>
                            <tr><p>Rabia</p></tr>
                            <tr>
                                <td>24 de mayo del 2021</td>
                                <td>24 de mayo del 2022</td>
                                <td>8.9</td>
                            </tr>
                            <tr><p>Rabia</p></tr>
                            <tr>
                                <td>24 de mayo del 2021</td>
                                <td>24 de mayo del 2022</td>
                                <td>8.9</td>
                            </tr>
                            <tr><p>Rabia</p></tr>
                            <tr>
                                <td>24 de mayo del 2021</td>
                                <td>24 de mayo del 2022</td>
                                <td>8.9</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="page-break"></div>

                <div class="page-3">
                    <center><h1>HISTORIAL MEDICO</h1></center>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                    <div class="historial-medico">
                        <span>24 de mayo, 2019</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum hic necessitatibus error tenetur pariatur fugiat temporibus, quaerat alias. Dicta repellat minima sit sunt earum, asperiores sequi neque eum harum quos.Ipsa optio mollitia eaque explicabo animi quam a enim maxime dolorem quisquam, tenetur laborum sint blanditiis illum nemo exercitationem illo officiis quia, iste pariatur. Sunt nemo enim quo at qui.</p>
                    </div>
                </div>

                <style>
                    .page-break {
                        page-break-after: always;
                    }
                </style>

            </div>
        </main>
</body>
</html>
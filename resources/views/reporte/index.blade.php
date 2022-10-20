@extends('app')

@section('titulo')
    Reportes
@endsection


<link rel="stylesheet" href=" {{ asset('css/grafico.css') }} ">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

<meta charset="UTF-8">

@section('header')
    <h1 class="header">Reportes </h1>
@endsection

@section('content')
    {{-- TODO: Campos ocultos para pasar los valores al grafico --}}
    <input type="text" id="nombreServicios" value="{{ $nombresServicios }}">
    <input type="number" id="citasVacuna" value="{{ $citasVacunaMesActual }}">
    <div class="graficos-container">
        <div>
            <canvas id="myChart">
            </canvas>
        </div>
        <div>
            <canvas id="myChart1">
            </canvas>
        </div>
        <div>
            <canvas id="myChart2">
            </canvas>
        </div>
    </div>

    {{--  <div class="container">

    </div> --}}
@endsection

@section('js')
    <script>
        //Capturo el contenido encontrado en un div oculto
        const citasClinicas = ['Vacunación', 'Cirugía', 'Limpieza Dental'];
        console.log(Array.isArray(citasClinicas)); //confirmando que si es arreglo

        const arreglo = document.getElementById('nombreServicios').value;
        const stringLation = unicodeToChar(arreglo);
        const stringLimpio = stringLation.replaceAll("[", "").replaceAll("]", "").replaceAll(/"/g, "");
        console.log(stringLation); //String traducido sin unicode
        console.log(stringLimpio); //string limpio sin llaves ni comas
        //Inico de separacion de cada servicio para ser mostrado en barras
        const arragloNombresTiposServicios = stringLimpio.split(',');
        console.log(arragloNombresTiposServicios);
        console.log(Array.isArray(arragloNombresTiposServicios)); //confirmando que si es arreglo
        const arregloCitas = citasClinicas.concat(arragloNombresTiposServicios);
        console.log(arregloCitas);




        /**
         *  *Funcion encargada de cambiar los valores unicode a texto
         */
        function unicodeToChar(text) {
            return text.replace(/\\u[\dA-F]{4}/gi,
                function(match) {
                    return String.fromCharCode(parseInt(match.replace(/\\u/g, ''), 16));
                });
        }









        /**
         ** Mes Actual
         */
        const ctx = document.getElementById('myChart');
        const citasVacuna = document.getElementById('citasVacuna').value;
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                // labels: arregloCitas,
                labels: ["Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
                datasets: [{
                    /** 
                     * ? El orden de la informacion en data depende del array arregloCitas
                     * ? A resolver
                     *  ? 1. Mostrar el mes en curso en el label
                     *  ? 2. En el caso se creara un nuevo servicio como se integraria la informacion a la grafica
                     */

                    data: [citasVacuna, 19, 3, 5, 2, 3],

                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            /**  
             ** Las opciones van al final de los data set
             */
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },

                plugins: {
                    title: {
                        display: true,
                        text: 'Citas programadas para mes actual',
                        font: {
                            size: 20
                        }
                        // text: 'Citas programadas para mes actual'
                    },
                    legend: {
                        display: false
                    }
                },


            }
        });

        // Any of the following formats may be used
        const ctx1 = document.getElementById('myChart1');

        const myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Vacunación', 'Cirugía', 'Limpieza Dental', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    /*   label: '# of Votes', */
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Últimos 6 meses',
                        font: {
                            size: 20
                        }
                        // text: 'Citas programadas para mes actual'
                    },
                    legend: {
                        display: false
                    },
                }
            }
        });
        // Any of the following formats may be used
        const ctx2 = document.getElementById('myChart2');

        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    /* label: '# of Votes', */
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Últimos 12 meses',
                        font: {
                            size: 20
                        }
                        // text: 'Citas programadas para mes actual'
                    },
                    legend: {
                        display: false
                    },
                }
            }
        });
    </script>
@endsection

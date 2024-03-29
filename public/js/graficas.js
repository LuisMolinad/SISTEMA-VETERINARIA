
//*Mes en curso
const ctx = document.getElementById('myChart');
const citasVacuna = document.getElementById('citasVacuna').value;

const citasCirugia = document.getElementById('citasCirugia').value;
const citasLimpiezaDental = document.getElementById('citasLimpiezaDental').value;
const citasServicios = document.getElementById('citasServicios').value;
//Fecha actual
const fecha = new Date();
const hoy = fecha.getDate();
const mesActual = fecha.getMonth() + 1;
//console.log(mesActual);
let anio = fecha.getFullYear();
//console.log(anio);
const mesChart = obtenerMes(mesActual);//Se obtiene el mes actal
//console.log(mesChart);

function obtenerMes( mes ){
    var numMes='';
    switch (mes) {
        case 1:
          numMes = "Enero";
          break;
        case 2:
          numMes = "Febrero";
          break;
        case 3:
          numMes = "Marzo";
          break;
        case 4:
          numMes = "Abril";
          break;
        case 5:
          numMes = "Mayo";
          break;
        case 6:
          numMes = "Junio";
          break;
        case 7:
          numMes = "Julio";
          break;
        case 8:
          numMes = "Agosto";
          break;
        case 9:
          numMes = "Septiembre";
          break;
        case 10:
          numMes = "Octubre";
          break;
        case 11:
          numMes = "Noviembre";
          break;
        case 12:
            numMes = "Diciembre";
            break;
      }
      return numMes;
}
//*Se define el tamanio de letra por default 
Chart.defaults.font.size = 14;
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        // labels: arregloCitas,
        labels: ["*Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
    
        datasets: [{


            data: [citasVacuna, citasCirugia, citasLimpiezaDental, citasServicios],

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
        maintainAspectRatio: true,
        scales: {
            y: {
                beginAtZero: true,
            },
        },

        plugins: {
            title: {
                display: true,
                text: 'Citas Atendidas Mes Actual: '+mesChart + ' '+anio,
                font: {
                    size: 20
                }
                // text: 'Citas programadas para mes actual'
            },
            legend: {
                display: false
            },
            
            subtitle: {
                display: true,
                text: '*Fecha de aplicación de vacuna',
                position: 'bottom',
                align:'start',
                font: {
                    size: 12
                }
            }
        },


    }
});


//*TODO Inicio calendario trimestrales
const ctx3 = document.getElementById('myChart3');

//*TODO VACUNAS
var TrimestresVacunas = document.getElementById('vacunasTrimestre').value;
//*Luego de recibida el array como string lo transforme a un arreglo como entero
const arregloTrimestresVacunas = TrimestresVacunas.replace('[','').replace(']','').split(",").map(Number);
//console.log(arregloTrimestresVacunas);//Debe coincidir con el valor del input

//*Para que se almacene de mejor manera los guardo en variables 
var VacunaTrimestre1=arregloTrimestresVacunas[0];
var VacunaTrimestre2=arregloTrimestresVacunas[1];
var VacunaTrimestre3=arregloTrimestresVacunas[2];
var VacunaTrimestre4=arregloTrimestresVacunas[3];

//*TODO CIRUGIA
var TrimestresCirugia = document.getElementById('cirugiasTrimestre').value;
//*Luego de recibida el array como string lo transforme a un arreglo como entero
const arregloTrimestresCirugias = TrimestresCirugia.replace('[','').replace(']','').split(",").map(Number);
//console.log(arregloTrimestresCirugias);//Debe coincidir con el valor del input
//*Para que se almacene de mejor manera los guardo en variables 
var CirugiaTrimestre1=arregloTrimestresCirugias[0];
var CirugiaTrimestre2=arregloTrimestresCirugias[1];
var CirugiaTrimestre3=arregloTrimestresCirugias[2];
var CirugiaTrimestre4=arregloTrimestresCirugias[3];

//*TODO LIMPIEZA
var LimpiezaCirugia = document.getElementById('limpiezaTrimestre').value;
//*Luego de recibida el array como string lo transforme a un arreglo como entero
const arregloTrimestresLimpiezas = LimpiezaCirugia.replace('[','').replace(']','').split(",").map(Number);
//console.log(arregloTrimestresLimpiezas);//Debe coincidir con el valor del input
//*Para que se almacene de mejor manera los guardo en variables 
var LimpiezaTrimestre1=arregloTrimestresLimpiezas[0];
var LimpiezaTrimestre2=arregloTrimestresLimpiezas[1];
var LimpiezaTrimestre3=arregloTrimestresLimpiezas[2];
var LimpiezaTrimestre4=arregloTrimestresLimpiezas[3];


//*TODO SERVICIO
var CitaServicio = document.getElementById('servicioTrimestre').value;
//*Luego de recibida el array como string lo transforme a un arreglo como entero
const arregloTrimestresServicios = CitaServicio.replace('[','').replace(']','').split(",").map(Number);
//console.log(arregloTrimestresServicios);//Debe coincidir con el valor del input
//*Para que se almacene de mejor manera los guardo en variables 
var ServicioTrimestre1=arregloTrimestresServicios[0];
var ServicioTrimestre2=arregloTrimestresServicios[1];
var ServicioTrimestre3=arregloTrimestresServicios[2];
var ServicioTrimestre4=arregloTrimestresServicios[3];

const myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ["*Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
        datasets: [{
            /* label: '# of Votes', */
            data: [VacunaTrimestre1, CirugiaTrimestre1, LimpiezaTrimestre1, ServicioTrimestre1],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
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
        maintainAspectRatio: true, 
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Primer Trimestre Enero-Marzo '+anio,
                font: {
                    size: 20
                }
                // text: 'Citas programadas para mes actual'
            },
            legend: {
                display: false
            },
            subtitle: {
                display: true,
                text: '*Fecha de aplicación de vacuna',
                position: 'bottom',
                align:'start',
                font: {
                    size: 12
                }
            }
        }
    }
});


//TODO Inicio Segundo Trimestre
const ctx4 = document.getElementById('myChart4');

const myChart4 = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: ["*Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
        datasets: [{
            /* label: '# of Votes', */
            data: [VacunaTrimestre2, CirugiaTrimestre2, LimpiezaTrimestre2, ServicioTrimestre2],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
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
        maintainAspectRatio: true, 
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Segundo Trimestre Abril-Junio '+anio,
                font: {
                    size: 20
                }
                // text: 'Citas programadas para mes actual'
            },
            legend: {
                display: false
            },
            subtitle: {
                display: true,
                text: '*Fecha de aplicación de vacuna',
                position: 'bottom',
                align:'start',
                font: {
                    size: 12
                }
            }
        }
    }
});

//TODO Inicio Tercer Trimestre
const ctx5 = document.getElementById('myChart5');

const myChart5 = new Chart(ctx5, {
    type: 'bar',
    data: {
        labels: ["*Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
        datasets: [{
            /* label: '# of Votes', */
            data: [VacunaTrimestre3, CirugiaTrimestre3, LimpiezaTrimestre3, ServicioTrimestre3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
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
        maintainAspectRatio: true, 
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Tercer Trimestre Julio-Septiembre '+anio,
                font: {
                    size: 20
                }
                // text: 'Citas programadas para mes actual'
            },
            legend: {
                display: false
            },
            subtitle: {
                display: true,
                text: '*Fecha de aplicación de vacuna',
                position: 'bottom',
                align:'start',
                font: {
                    size: 12
                }
            }
        }
    }
});

//TODO Inicio Cuarto Trimestre
const ctx6 = document.getElementById('myChart6');
/* var arregloTrimestresVacunas = @json($vacunasTrimestres); */
/* console.log(arregloTrimestresVacunas); */
const myChart6 = new Chart(ctx6, {
    type: 'bar',
    data: {
        labels: ["*Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
        datasets: [{
            /* label: '# of Votes', */
            data: [VacunaTrimestre4, CirugiaTrimestre4, LimpiezaTrimestre4, ServicioTrimestre4],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
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
        maintainAspectRatio: true,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Cuarto Trimestre Octubre-Diciembre '+anio,
                font: {
                    size: 20
                }
                // text: 'Citas programadas para mes actual'
            },
            legend: {
                display: false
            },
            subtitle: {
                display: true,
                text: '*Fecha de aplicación de vacuna',
                position: 'bottom',
                align:'start',
                font: {
                    size: 12
                }
            }
        }
    }
});

//*TODO FIN calendario trimestrales


//*Inicio calendario Anual
const ctx7 = document.getElementById('myChart7');


var anualConsolidado = document.getElementById('consolidadoAnual').value;
//*Luego de recibida el array como string lo transforme a un arreglo como entero
const arregloConsolidadoAnual = anualConsolidado.replace('[','').replace(']','').split(",").map(Number);
//console.log('Consolidado '+arregloConsolidadoAnual);//Debe coincidir con el valor del input
//*Para que se almacene de mejor manera los guardo en variables 
var consolidadoVacuna=arregloConsolidadoAnual[0];
var consolidadoCirugia=arregloConsolidadoAnual[1];
var consolidadoLimpieza=arregloConsolidadoAnual[2];
var consolidadoServicio=arregloConsolidadoAnual[3];
//console.log(arrServicio);
const myChart7 = new Chart(ctx7, {
    type: 'bar',
    data: {
        labels: ["*Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
        datasets: [{
            /* label: '# of Votes', */
            data: [consolidadoVacuna, consolidadoCirugia, consolidadoLimpieza, consolidadoServicio],
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
        maintainAspectRatio: true,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Consolidado Anual '+anio,
                font: {
                    size: 20
                }
                // text: 'Citas programadas para mes actual'
            },
            legend: {
                display: false
            },
            subtitle: {
                display: true,
                text: '*Fecha de aplicación de vacuna',
                position: 'bottom',
                align:'start',
                font: {
                    size: 12
                }
            }
        }
    }
});
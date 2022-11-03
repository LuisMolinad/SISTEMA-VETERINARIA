
//*Mes en curso
const ctx = document.getElementById('myChart');
const citasVacuna = document.getElementById('citasVacuna').value;

const citasCirugia = document.getElementById('citasCirugia').value;
const citasLimpiezaDental = document.getElementById('citasLimpiezaDental').value;
const citasServicios = document.getElementById('citasServicios').value;

const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        // labels: arregloCitas,
        labels: ["Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
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
        maintainAspectRatio: false,
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
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Últimos Trimestre',
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
        maintainAspectRatio: false,
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


//*TODO Inicio calendario trimestrales
const ctx3 = document.getElementById('myChart3');
var TrimestresVacunas = document.getElementById('vacunasTrimestre').value;
//*Luego de recibida el array como string lo transforme a un arreglo como entero
const arregloTrimestresVacunas = TrimestresVacunas.replace('[','').replace(']','').split(",").map(Number);

//*Para que se almacene de mejor manera los guardo en variables 
var VacunaTrimestre1=arregloTrimestresVacunas[0];
var VacunaTrimestre2=arregloTrimestresVacunas[1];
var VacunaTrimestre3=arregloTrimestresVacunas[2];
var VacunaTrimestre4=arregloTrimestresVacunas[3];
//console.log(TrimestresVacunas);
console.log(arregloTrimestresVacunas);

const myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ["Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
        datasets: [{
            /* label: '# of Votes', */
            data: [VacunaTrimestre1, 19, 3, 5, 2, 3],
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
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Primer Trimestre Enero-Marzo',
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


//TODO Inicio Segundo Trimestre
const ctx4 = document.getElementById('myChart4');

const myChart4 = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: ["Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
        datasets: [{
            /* label: '# of Votes', */
            data: [VacunaTrimestre2, 19, 3, 5, 2, 3],
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
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Segundo Trimestre Abril-Junio',
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

//TODO Inicio Tercer Trimestre
const ctx5 = document.getElementById('myChart5');

const myChart5 = new Chart(ctx5, {
    type: 'bar',
    data: {
        labels: ["Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
        datasets: [{
            /* label: '# of Votes', */
            data: [VacunaTrimestre3, 19, 3, 5, 2, 3],
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
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Tercer Trimestre Julio-Septiembre',
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

//TODO Inicio Cuarto Trimestre
const ctx6 = document.getElementById('myChart6');
/* var arregloTrimestresVacunas = @json($vacunasTrimestres); */
/* console.log(arregloTrimestresVacunas); */
const myChart6 = new Chart(ctx6, {
    type: 'bar',
    data: {
        labels: ["Vacunas", "Cirugía", "Limpieza Dental", "Servicios"],
        datasets: [{
            /* label: '# of Votes', */
            data: [VacunaTrimestre4, 19, 3, 5, 2, 3],
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
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Cuarto Trimestre Octubre-Diciembre',
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

//*TODO FIN calendario trimestrales

const ctx7 = document.getElementById('myChart7');

const myChart7 = new Chart(ctx7, {
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
        maintainAspectRatio: true,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: '7',
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
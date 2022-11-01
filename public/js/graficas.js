
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
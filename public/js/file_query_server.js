//!A ver en cuanto tiempo me encuentran esto.
//!No me funen

function cargar_imagen(login, nombre){
    fetch(`//api.github.com/users/${login}`)
    .then((result)=>{
        return result.json()
    })  
    .then((result) => {
        Swal.fire({
            title: nombre,
            text: `${result.login}, uno de los colaboradores para el desarrollo de este proyecto.` ,
            imageUrl: result.avatar_url
            })
    })
}

function random_creador(){
    let min = 0;
    let max = 4;
    let x = Math.floor(Math.random()*(max-min+1)+min);

    switch(x){
        case 0:
            cargar_imagen('Rosalioalfre2', 'Rosalio Monterrosa');
            break;
        case 1:
            cargar_imagen('abenabi', 'Andres Garcia');
            break;
        case 2:
            cargar_imagen('LuisMolinad', 'Luis Duque');
            break;
        case 3:
            cargar_imagen('ChristianG0816', 'Christian Ayala');
            break;
        case 4:
            cargar_imagen('KatyaCarbajal', 'Kathya Carbajal');
            break;
    }
}
const dropArea = document.querySelector(".drop-area");
const dragText = dropArea.querySelector('h3');
const button = dropArea.querySelector('div');
const input = dropArea.querySelector('#input-file');
let files;

button.addEventListener('click', (e)=>{
    input.click();
});

input.addEventListener("change", (e)=>{
    files = input.files;
    dropArea.classList.add('active');
    showFiles(files);
    dropArea.classList.remove("active");
});

dropArea.addEventListener("dragover", (e)=>{
    e.preventDefault();
    dropArea.classList.add("active");
    dragText.textContent = "Suelta para cargar los archivos";
});

dropArea.addEventListener("dragleave", (e)=>{
    e.preventDefault();
    dropArea.classList.remove("active");
    dragText.textContent = "Arrastra y suelta sus archivos";
});

dropArea.addEventListener("drop", (e)=>{
    e.preventDefault();
    files = e.dataTransfer.files;
    showFiles(files);
    dropArea.classList.remove("active");
    dragText.textContent = "Arrastra y suelta sus archivos";
});

function showFiles(files){
    if(files.length === undefined){
        processFile(file);
    }
    else{
        for(const file of files){
            processFile(file);
        }
    }
}

function processFile(file){
    const doctype = file.type;
    const validExtension = ['image/jpeg','image/jpg', 'image/png'];

    if(validExtension.includes(doctype)){
        //Archivo valido
        const fileReader = new FileReader();
        const id = `file-${Math.random().toString(32).substring(7)}`;

        fileReader.addEventListener('load', (e)=>{
            const fileUrl = fileReader.result;
            const image = `
                <div id="${id}" class="file-container">
                    <img src="${fileUrl}" alt="${file.name}" width="50"
                    <div class="status">
                        <span>${file.name}</span>
                    </div>
                </div>
            `;

            const html = document.querySelector('#preview').innerHTML;
            document.querySelector('#preview').innerHTML = image + html;
        });

        fileReader.readAsDataURL(file);
        uploadFile(file, id);
    }
    else{
        //Archivo no valido
        alert('No es un archivo valido');
    }
}

/* async function uploadFile(file, id){
    const formData = new FormData();
    formData.append("file", "file");

    try{
        const response = await fetch("https:localhost:8000/upload", {
            method: "POST",
            body: formData,
        });

        const responseText = await response.text();
        console.log(responseText);

        document.querySelector(`#${id}.status-text`).innerHTML = `<span class="success">Archivo subido correctamente ... </span>`;
    }
    catch(error){
        document.querySelector(`#${id}.status-text`).innerHTML = `<span class="failure">El archivo no pudo ser subido... </span>`;
    }
} */
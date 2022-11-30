const dropArea = document.querySelector(".drop-area");
const dragText = dropArea.querySelector("h3");
const button = dropArea.querySelector("div");
const input = dropArea.querySelector("#input-file");
let files;

button.addEventListener("click", (e) => {
    input.click();
});

input.addEventListener("change", (e) => {
    files = input.files;
    dropArea.classList.add("active");
    showFiles(files);
    dropArea.classList.remove("active");
});

dropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropArea.classList.add("active");
    dragText.textContent = "Suelta para cargar los archivos";
});

dropArea.addEventListener("dragleave", (e) => {
    e.preventDefault();
    dropArea.classList.remove("active");
    dragText.textContent = "Arrastra y suelta sus archivos";
});

dropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    files = e.dataTransfer.files;

    input.files = files;

    showFiles(files);
    dropArea.classList.remove("active");
    dragText.textContent = "Arrastra y suelta sus archivos";
});

function showFiles(files) {
    if (files.length === undefined) {
        processFile(file);
    } else {
        for (const file of files) {
            processFile(file);
        }
    }
}

function processFile(file) {
    const doctype = file.type;
    const validExtension = [
        "image/jpeg",
        "image/jpg",
        "image/png",
        "application/pdf",
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
    ];

    if (validExtension.includes(doctype)) {
        //Archivo valido
        const fileReader = new FileReader();
        const id = `file-${file.name}`;

        if (
            doctype ==
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
        ) {
            fileReader.addEventListener("load", (e) => {
                const fileUrl = fileReader.result;
                const image = `
                    <div id="${id}" class="file-container">
                        <img src="/images/icono_word.png" alt="${file.name}" width="50"
                        <div class="status">
                            <span>${file.name}</span>
                        </div>
                    </div>
                    <input name="name" type="hidden" value="${file.name}">
                `;

                const html = document.querySelector("#preview").innerHTML;
                document.querySelector("#preview").innerHTML = image;
            });
        } else if (doctype == "application/pdf") {
            fileReader.addEventListener("load", (e) => {
                const fileUrl = fileReader.result;
                const image = `
                    <div id="${id}" class="file-container">
                        <img src="/images/icono_pdf.png" alt="${file.name}" width="50"
                        <div class="status">
                            <span>${file.name}</span>
                        </div>
                    </div>
                    <input name="name" type="hidden" value="${file.name}">
                `;

                const html = document.querySelector("#preview").innerHTML;
                document.querySelector("#preview").innerHTML = image;
            });
        } else {
            fileReader.addEventListener("load", (e) => {
                const fileUrl = fileReader.result;
                const image = `
                    <div id="${id}" class="file-container">
                        <img src="${fileUrl}" alt="${file.name}" width="50"
                        <div class="status">
                            <span>${file.name}</span>
                        </div>
                    </div>
                    <input name="name" type="hidden" value="${file.name}">
                `;

                const html = document.querySelector("#preview").innerHTML;
                document.querySelector("#preview").innerHTML = image;
            });
        }

        fileReader.readAsDataURL(file);
        uploadFile(file, id);
    } else {
        //Archivo no valido
        //console.log(doctype); //Para saber que tipo de archivo es en dado caso no lo acepte
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "No es un archivo valido!",
        });
    }
}

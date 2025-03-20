import './bootstrap';
import Dropzone from 'dropzone';

Dropzone.autoDiscover=false;

const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage: 'Sube tu Imagen',
    acceptedFiles: '.png,.jpg,.git,.jpeg',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivos',
    maxFiles: 1,
    uploadMultiple: false,

    init: function (){
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imagenPublicada = {}
            imagenPublicada.size = 0,
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada );
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success');

        }else{
            console.log('No hay nada')
        }
    }
})

dropzone.on('success', (file, response) =>{
    console.log(response.imagen),
    document.querySelector('[name="imagen"]').value = response.imagen
    document.querySelector('[name="imagen"]').alt = 'Imagen Desde servidro'
    console.log(document.querySelector('[name="imagen"]'))
})
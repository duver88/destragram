import './bootstrap';
import Dropzone from 'dropzone';

Dropzone.autoDiscover=false;

const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage: 'Sube tu Imagen',
    acceptedFiles: '.png,.jpg,.git,.jpeg',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivos',
    maxFiles: 1,
    uploadMultiple: false
})

dropzone.on('success', (file, response) =>{
    console.log(response)
})
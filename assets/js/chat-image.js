/* ================== Click para enviar una imagen ================= */

import { url_ubicacion } from "./variable";


function btnImagen(areaEnviarImagen, BtnImg, btnCloseAreaImg){

    
    const contentInput = areaEnviarImagen.querySelector('.img__content-input');
    const inputFile = contentInput.querySelector('input');

    const submitImage = areaEnviarImagen.querySelector('.area__img-submit');

    const contentView = areaEnviarImagen.querySelector('.img__content-view');
    const viewImg = contentView.querySelector('img');
    
    inputFile.multiple = false;

    inputFile.addEventListener('change', (e)=>{

        if(inputFile.files.length > 0){

            let urlAux = URL.createObjectURL(inputFile.files[0])

            contentInput.style.display = "none";
            viewImg.src = urlAux;
            contentView.style.display = "block";
            submitImage.style.display = "block";
        }

    });

    submitImage.addEventListener('click', ()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("POST", `${url_ubicacion}controller/EnviarMessageControlador.php`, true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    console.log(data);
                }
            }
        }
        let form = new FormData();
        form.append('mensaje', "");
        form.append('receptor_id', receptor_id);
        form.append('image', inputFile.files[0]);
        xhr.send(form);
        cerrarModalImagen();
    });
    

    if(BtnImg){
        BtnImg.onclick = ()=>{
            areaEnviarImagen.classList.add('area__img-active');
        };
    }
    
    if(btnCloseAreaImg){
        btnCloseAreaImg.onclick = cerrarModalImagen;
    }

    function cerrarModalImagen(){
        areaEnviarImagen.classList.remove('area__img-active');
        contentInput.style.display = "block";
        contentView.style.display = "none";
        submitImage.style.display = "none";
    }
}




/* ================== animacion del microfono ================ */


function submitasd(submitInput, buttonSubmit){
    buttonSubmit.onclick = ()=>{
            enviarMensage(submitInput);
    };
}


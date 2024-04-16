/* ===================== REGISTRO ======================= */

import { url_ubicacion } from "./variable";

const formulario = document.querySelector(".form"),
        btnRegistrar = document.getElementById('registrar'),
        errors= document.querySelector('.form__errors');

formulario.onsubmit = (event)=>{
    event.preventDefault();
};

if(btnRegistrar){
    btnRegistrar.onclick = ()=>{

        let xhr = new XMLHttpRequest();
        xhr.open('POST', `${url_ubicacion}controller/RegistroControlador.php`, true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    if(data === "sussess"){
                        location.href = `${url_ubicacion}/view/chat.php`;
                    }else{
                        errors.textContent = data;
                    }
                }
            }
        }
        let formData = new FormData(formulario);
        xhr.send(formData);

    };
}


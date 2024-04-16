import {url_ubicacion} from './variable';

const   containerBoxChat = document.querySelector('.boxchat__container');

let bodyWidth = window.innerWidth;

if(bodyWidth < 760){
    containerBoxChat.style.display = "none";
    containerUsers.style.display = "block";
}

function resizeWidth(btnRetroceder){
    
    if(btnRetroceder){
        btnRetroceder.style.display = "none";
    }
    
    if(bodyWidth > 760){
        containerBoxChat.style.display = "block";
        containerUsers.style.display = "block";
        btnRetroceder.style.display = "none";
    }else if(bodyWidth < 760){
        btnRetroceder.style.display = "block";
        containerUsers.style.display = "none";
    }

    if(containerBoxChat){
        window.addEventListener('resize', (event)=>{
            bodyWidth = window.innerWidth;
        
            if(bodyWidth > 760){
                containerBoxChat.style.display = "block";
                containerUsers.style.display = "block";
                btnRetroceder.style.display = "none";
            }else if(bodyWidth < 760){
                btnRetroceder.style.display = "block";
                containerUsers.style.display = "none";
            }
        }); 
    }
    
    
    if(btnRetroceder && containerBoxChat){
        btnRetroceder.onclick = ()=>{
            containerUsers.style.display = "block";
            containerBoxChat.style.display = "none";
        }; 
    }
}

let receptor_id;

/* ================================================================== */

function clicked(element){
    //console.log(element.getAttribute("unique"));
    if(bodyWidth < 760){ 
        containerUsers.style.display = "none";
        containerBoxChat.style.display = "block";
    }else{
        containerUsers.style.display = "block";
        containerBoxChat.style.display = "block";
    }

    receptor_id = element.getAttribute("unique");
    if(receptor_id != ""){
        mandarDatos(element.getAttribute("unique"));
    }
    
}


function mandarDatos(unique_id){

    const boxChatContainer = document.querySelector('.boxchat__container');
    

    let xhr = new XMLHttpRequest();
    xhr.open("POST", `${url_ubicacion}controller/BoxChatControlador.php`, true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                boxChatContainer.innerHTML = data;
                verMessages(receptor_id);
                

                const btnRetroceder = document.querySelector('.boxchat__header-icon');
                resizeWidth(btnRetroceder);

                const areaEnviarImagen = document.querySelector('.area__img'),
                    BtnImg = document.querySelector('.submit__emoji'),
                    btnCloseAreaImg = document.querySelector('.area__img-close');
                btnImagen(areaEnviarImagen, BtnImg, btnCloseAreaImg);
                
                const   buttonSubmit = document.querySelector('.button__enviar');
                const submitInput = document.querySelector('.submit__input');
                submitasd(submitInput, buttonSubmit);
                
            }
        }
    };
    let formData = new FormData();
    formData.append("unique_id", unique_id);
    xhr.send(formData);

}


/* ========================= ENVIAR MESSAGE ========================= */

function enviarMensage(submitInput){

    let message = submitInput.value;
    submitInput.value = "";

    if(message != ""){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", `${url_ubicacion}controller/EnviarMessageControlador.php`, true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    
                    verMessages(receptor_id);
                    scrollBottom(boxChat);
                      
                }
            }
        };
        let form = new FormData();
        form.append('mensaje', message);
        form.append('receptor_id', receptor_id);
        xhr.send(form);
    }

}


/* =========== VER MENSAJES =================== */

let boxChat;

function verMessages(receptor_id){

    boxChat = document.querySelector('.boxchat__area');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", `${url_ubicacion}controller/VerMessagesControlador.php`, true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){       
                let data = xhr.response;
                if(boxChat){
                    boxChat.innerHTML = data;
                    mouseEnter(boxChat);
                    MouseLeave(boxChat);
                    if(!boxChat.classList.contains("active")){
                        scrollBottom(boxChat);
                    }
                }    
                               
            }
        }
    };
    let formData = new FormData();
    formData.append('receptor_id', receptor_id);
    xhr.send(formData);

    

}

setInterval(()=>{
    verMessages(receptor_id);
}, 500);


/* submit */






function mouseEnter(boxChat){
    containerBoxChat.onmouseenter = ()=>{
        boxChat.classList.add("active");
    }
}


function MouseLeave(boxChat){
    containerBoxChat.onmouseleave = ()=>{
        boxChat.classList.remove("active");
    }
}

function scrollBottom(boxChat){
    boxChat.scrollTop = boxChat.scrollHeight;
}
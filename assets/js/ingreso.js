const formulario = document.querySelector(".form"),
        btnIngreso = document.getElementById('ingresar'),
        errors = document.querySelector('.form__errors');

formulario.onsubmit = (event)=>{
    event.preventDefault();
};

btnIngreso.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", `${url_ubicacion}controller/IngresoControlador.php`, true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "success"){
                    location.href = `${url_ubicacion}view/chat.php`;
                }else{
                    errors.textContent = data;
                }
            }
        }
    };
    let formData = new FormData(formulario);
    xhr.send(formData);
}

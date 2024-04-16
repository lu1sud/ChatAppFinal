/* ==================== Manejo del responsive ================= */

import { url_ubicacion } from "./variable";

const containerUsers = document.querySelector('.users__container'),
        headerOptions = document.querySelector('.users__header-options');


/* ============ Activacion del buscador ========== */
const searchIcon = document.querySelector('.search__icon'),
        searchDescription = document.querySelector('.search__description'),
        searchInput = document.querySelector('.search__input'),
        headerIcon = document.querySelector('.header__icon'),
        userContainer = document.querySelector('.users__contact');

searchIcon.onclick = ()=>{  
    searchInput.classList.toggle('search__active');
    searchIcon.classList.toggle('ri-search-line');
    searchIcon.classList.toggle('ri-close-line');
    searchInput.focus();
    searchInput.value = "";
};

/* ============ Opciones del icono de la cabecera*/
headerIcon.onclick = ()=>{
    headerOptions.classList.toggle('options__active');
}

/* =================== buscador Usuario ================== */

searchInput.onkeyup = ()=>{
    let search = searchInput.value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", `${url_ubicacion}/controller/SearchControlador.php`, true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                userContainer.innerHTML = data;
                presionar();
            }
        }
    };
    xhr.setRequestHeader('Content-type', "application/x-www-form-urlencoded");
    xhr.send("search=" + search);
    
};

setInterval(()=>{
    if(searchInput.value === ""){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", `${url_ubicacion}/controller/TodosUsuariosControlador.php`, true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    userContainer.innerHTML = data;
                    presionar();
    
                }
            }
        };
        xhr.send();
    }
}, 500);



function presionar(){
    
    let unique_id = "";
    const contentUsers = document.querySelectorAll('.contact__content');
    
    if(contentUsers.length > 0){
        for(i = 0; i < contentUsers.length; i++){
            
            contentUsers[i].setAttribute("onclick", "clicked(this)");
        }
    }else{
        console.log("vacio"); 
    }
}



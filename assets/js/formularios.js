


const inputImg = document.querySelector('.form__input-img'),
        groupInput = document.querySelector('.group__input'),
        groupImg = document.querySelector('.group__img'),
        verImg = document.querySelector('.group__img img'),
        closeImg = document.querySelector('.group__img i'),
        inputPassword = document.querySelector("input[type='password']"),
        iconPassword = document.querySelector('.icon__password'); 

let file;
let urlFile;
let typeAccepts = ["image/png", "image/jpg", "image/jpeg"];



/* =================== ARRASTRAR IMAGEN  ===================== */

if(inputImg){
    inputImg.multiple = false;
    inputImg.addEventListener('change', InsertarImg);
}

if(closeImg){
    closeImg.onclick = ()=>{
        groupInput.classList.remove('img-active');
        groupImg.classList.add('img-active');
    };    
}

function InsertarImg(){ 
    if(inputImg.files.length > 0){

        console.log("asdasd");
        file = inputImg.files.item(0);

        for(var i = 0; i <= typeAccepts.length; i++){
            if(file.type == typeAccepts[i]){
                urlFile = URL.createObjectURL(file);
                verImg.src = urlFile;
                if(verImg.src !== ""){
                    groupInput.classList.add('img-active');
                    groupImg.classList.remove('img-active');
                }
            }
        }
    }
}

/* =================== ICON PASSWORD =================== */
iconPassword.onclick = ()=>{
    iconPassword.classList.toggle('ri-eye-off-fill');
    if(inputPassword.type === "password"){
        inputPassword.type = "text";
    }else{
        inputPassword.type = "password";
    }
}



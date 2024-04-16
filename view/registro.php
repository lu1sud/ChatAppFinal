<?php

    session_start();

    if(isset($_SESSION['unique_id'])){
        header("location: chat.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/formulario.css">
    

    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"
    />

    <title>Document</title>
</head>
<body>
    

    <div class="form__content">
        <form class="form" method="post" action="" enctype="multipart/form-data">
            <div class="form__icon">
                <i class="ri-user-fill"></i>
            </div>
            
            <div class="form__errors">
            </div>

            <div class="group__name group__form">
                <input type="text" class="form__input" name="nombre_usuario" id="nombre-usuario" placeholder="Nombre Usuario">
            </div>

            <div class="group__form">
                <input type="email" name="email" id="email" class="form__input" placeholder="Email">
            </div>

            <div class="group__form">
                <input type="password" name="password" id="password" class="form__input" placeholder="Contraseña">
                <i class="ri-eye-fill icon__password"></i>
            </div>

            <div class="group__form">
                <input type="password" name="verificar_password" id="verificar-password" class="form__input" placeholder="Verificar Contraseña">
                <i class="ri-eye-fill icon__password"></i>
            </div>

            <div class="group__input-img">
                <div class="group__input">
                    <label for="" class="form__label-img">
                        click o arrastre una imagen .jpg, .png o jpeg<br>
                    </label>
                    <i class="ri-arrow-up-fill form__img-icon"></i>
                    <input type="file" name="imagen" id="file-img" class="form__input-img" accept="image/*">
                </div>
                <div class="group__img img-active">
                    <img src="" alt="">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <input type="submit" value="REGISTRO" class="button button__form" id="registrar">
            <p class="form__option">¿Ya estas registrado? <a href="../index.php">ingresar</a></p>

        </form>
    </div>

    <script src="../assets/js/registrarse.js"></script>

    <script src="../assets/js/formularios.js"></script>
</body>
</html>
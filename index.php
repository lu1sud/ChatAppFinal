<?php

    session_start();

    if(isset($_SESSION['unique_id'])){
        header("location: view/chat.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/formulario.css">

    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"
    />

    <title>Document</title>
</head>
<body>
    <div class="form__content">
        <form action="#" class="form" method="POST">
            <div class="form__icon">
                <i class="ri-lock-fill"></i>
            </div>

            <div class="form__errors">
            </div>

            <div class="group__form">
                <input type="email" name="email" class="form__input" placeholder="Email">
            </div>

            <div class="group__form">
                <input type="password" name="password" class="form__input" placeholder="Contraseña">
                <i class="ri-eye-fill icon__password"></i>
            </div>

            <input type="submit" value="INGRESO" id="ingresar" class="button button__form">
            <p class="form__option">¿Aun no te registraste? <a href="View/registro.php">registrarse</a></p>
        </form>
    </div>

    <script src="./assets/js/ingreso.js"></script>
    <script src="./assets/js/formularios.js"></script>
    
</body>
</html>
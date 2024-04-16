<?php
    session_start();
    require_once('../model/Usuario.php');
    $usuario = new Usuario();

    if(isset($_SESSION['unique_id'])){
        $userDate = $usuario->selecionarUsuario($_SESSION['unique_id']);

    }else{
        header('location: ../index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--------------- CSS -------------->
    <link rel="stylesheet" href="../assets/css/chat-users.css">
    <link rel="stylesheet" href="../assets/css/chat-box.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"
    />
    <title>Document</title>
</head>
<body>

    <div class="section container chatApp">
        <div class="chatApp__container grid">
            <div class="users__container">
                <div class="users__header">
                    <ul class="users__header-options">
                        <li><!-- Perfil ---></li>
                        <li class="cerrar">
                            <a href="../controller/CerrarSesionControlador.php?logout=<?= $userDate['unique_id']?>">Cerrar Sesion</a>
                        </li>
                    </ul>
                    <div class="header__data">
                        <img src="../assets/img/<?= $userDate['img'] ?>" alt="" class="header__data-img">
                        <div class="header__data-description">
                            <p class="header__data-name">
                                <?= $userDate['nombre'] ?>
                            </p>
                            <span class="header__data-online"><?= $userDate['status']?></span>
                        </div>
                    </div>
                    <i class="ri-menu-line header__icon"></i>
                </div>
                <div class="users__search">
                    <p class="search__description">Buscar un contacto</p>
                    <input type="text" class="search__input search__active" placeholder="Buscar.....">
                    <i class="ri-search-line search__icon"></i>
                </div>
                <div class="users__contact">
                    
                </div>
            </div>
            <div class="boxchat__container">
                <div>
                    SELECCIONE UN USUARIO
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/chat-cerrar-sesion.js"></script>
    <script src="../assets/js/chat-user.js"></script>
    <script src="../assets/js/chat-boxs.js"></script>
    <script src="../assets/js/chat-image.js"></script>
    
    

</body>
</html>
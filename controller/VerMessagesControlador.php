<?php

    session_start();
        
    require_once("../model/Message.php");
    $message = new Message();

    require_once('../model/Usuario.php');
    $usuario = new Usuario();

    $img_usuario = $usuario->selecionarUsuario($_SESSION['unique_id']);

    $receptor_id = $_POST['receptor_id'];
    $list_message = $message->SelectMessage($_SESSION['unique_id'], $receptor_id);

    if(!empty($list_message)){
        foreach ($list_message as $date) {
            if($date['emisor_id'] == $_SESSION['unique_id']){
                if(!empty($date['messages'])){
                    echo '
                        <div class="chat__right">
                            <p class="chat__right-date">
                                '.$date['messages'].'
                            </p>
                        </div>   
                        
                    ';
                }else if(!empty($date['imagen'])){
                    echo '
                        <div class="chat__right">
                            <div class="chat__right-date">
                                <img class="left__date-img" src="../uploads/images/'.$date['imagen'].'" alt="">
                            </div>
                        </div>
                    ';
                }
            }else{
                if(!empty($date['messages'])){
                    echo '
                        <div class="chat__left">
                            <img src="../assets/img/'.$img_usuario['img'].'" class="chat__left-img" alt="">
                            <p class="chat__left-date">
                            '.$date['messages'].'
                            </p>
                        </div>
                    ';
                }else if(!empty($date['imagen'])){
                    echo '
                        <div class="chat__left">
                            <img src="../assets/img/65baa5b3069b2anime-devushki-noch-40975.jpeg" class="chat__left-img" alt="">
                            <div class="chat__left-date">
                                <img class="left__date-img" src="../uploads/images/'.$date['imagen'].'" alt="">
                            </div>
                        </div>
                    ';
                }
            }
        }
    }
    else{
        echo "sin mensajes";
    }

?>


<!----

<div class="chat__left">
    <img src="../assets/img/65baa5b3069b2anime-devushki-noch-40975.jpeg" class="chat__left-img" alt="">
    <div class="chat__left-date">
        <img class="left__date-img" src="../assets/img/65cd6cd6561b5Minotaur King.png" alt="">
    </div>
</div>

<div class="chat__left">
    <img src="../assets/img/65baa5b3069b2anime-devushki-noch-40975.jpeg" class="chat__left-img" alt="">
    <div class="chat__left-date">
        <div class="left__date-audio">
            <i class="ri-play-fill date__audio-icon"></i>
            <div class="date__audio-bar">
                <div class="bar__progress">
                    <span class="bar__rounded"></span>
                </div>
            </div>
        </div>
    </div>
</div>




/--------------------------

<div class="chat__right">
    <div class="chat__right-date">
        <img class="left__date-img" src="../assets/img/65bb055a10c1cperfil 1.jpg" alt="">
    </div>
</div>

<div class="chat__right">
    <div class="chat__right-date">
        <div class="left__date-audio">
            <i class="ri-play-fill date__audio-icon"></i>
            <div class="date__audio-bar">
                <div class="bar__progress">
                    <span class="bar__rounded"></span>
                </div>
            </div>
        </div>
    </div>
</div>
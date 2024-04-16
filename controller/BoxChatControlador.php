<?php 

    session_start();

    $receptor_id = $_POST['unique_id'];

    require_once('../model/Usuario.php');
    $usuario = new Usuario();

    require_once('../model/Message.php');
    $message = new Message();

    $user = $usuario->selecionarUsuario($receptor_id);
    //echo $user['nombre']."|".$user['status']."|".$user['img'];

    $list_message = $message->SelectMessage($_SESSION['unique_id'], $receptor_id);

    if(!empty($user)){
            echo '
                <div class="area__img">
                    <i class="ri-close-line area__img-close"></i>
                    <div class="area__img-content"> 
                        <div class="img__content-input">
                            <label for="">Click o arrastre una imagen</label>
                            <input  accept="image/*" type="file">
                        </div>
                        <div class="img__content-view">
                            <img src="../assets/img/65baa5b3069b2anime-devushki-noch-40975.jpeg" alt="">
                        </div>
                    </div>
                    <i class="ri-send-plane-2-line area__img-submit"></i>
                </div>

                <div class="boxchat__header">
                    <i class="ri-arrow-left-line boxchat__header-icon"></i>
                    <img src="../assets/img/'.$user['img'].'" alt="" class="header__data-img">
                    <div class="header__data-description">
                        <p class="header__data-name">'.$user['nombre'].'</p>
                        <span class="header__data-online">'.$user['status'].'</span>
                    </div>
                </div>

                <div class="boxchat__area">
                   
                </div>
                
                <div class="boxchat__submit">
                    <i class="ri-folder-image-fill submit__emoji"></i>
                    <input type="text" class="submit__input" placeholder="enviar mensaje">
                    <i class="ri-send-plane-2-fill button__enviar"></i>
                </div>
            ';
    }
    
?>
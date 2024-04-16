<?php

    require_once('../model/Message.php');
    $message = new Message();



    foreach($userTabla as $date){

        $list_message = $message->SelectUltimoMessage($_SESSION['unique_id'], $date['unique_id']);

        $messageAux = '';

        foreach ($list_message as $key) {
            if($_SESSION['unique_id'] == $key['emisor_id']){
                if($key['messages'] != ""){
                    $messageAux = "Tu: ".substr( $key['messages'], 0, 22)."....";
                }else{
                    $messageAux = 'Tu: <i>Archivo imagen<i> <i class="ri-file-image-line"></i>';

                }
            }else{
                if($key['messages'] != ""){
                    $messageAux = substr( $key['messages'], 0, 25)."....";
                }else{
                    $messageAux = '<i>Archivo imagen<i> <i class="ri-file-image-line"></i>';
                }
            }
        }
        

        if($date['status'] == "online"){
            $active = 'active';
        }else{
            $active = '';
        }

        $output .= '
                <div unique="'.$date['unique_id'].'" class="contact__content">
                    <div class="header__data">
                        <img src="../assets/img/'.$date['img'].'" alt="" class="header__data-img">
                        <div class="header__data-description">
                            <p class="header__data-name">'.$date['nombre'].'</p>
                            <span class="header__data-online">'.$messageAux.'</span>
                        </div>
                    </div>
                    <div class="contact__icon '.$active.'"></div>
                </div>
            ';
    }
    echo $output;

?>
<?php

    session_start();
    
    require_once("../model/Message.php");
    $message = new Message();
    
    $msg = "";
    $audio_name_aux= "";

    if(isset($_POST['mensaje'])){
        $msg= $_POST['mensaje'];
    }

    if(isset($_FILES['image'])){
        $image = $_FILES['image'];
        $image_carpeta = '../uploads/images/';
        $image_new_name = date(time()).$_FILES['image']['name'].".wav";
        $image_tmp = $image['tmp_name'];
        echo  $image_new_name;
    }

    

    if(move_uploaded_file($image_tmp, $image_carpeta.$image_new_name)){
        echo "Se guardo el image"; 
    }
    
    $receptor_id = $_POST['receptor_id'];
    
    if(!empty($receptor_id)){
        $insert_sql = $message->insertMessage($_SESSION['unique_id'], $msg, $image_new_name, $receptor_id);
        if($insert_sql){
            echo  "mensaje enviado";
        }else{
            echo "Error";
        }
    }else{
        echo "receptor no existe";
    }

    

?>
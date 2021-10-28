<?php     
session_start();

if(!isset($_SESSION['rol'])){

    header('location: ../clases/error404.html');
    session_destroy();
    //header('location: ../vista/v_autenticar.php');
}else{
    if($_SESSION['rol'] != 1 ){
        header('location: ../clases/error404.html');
        session_destroy();
       //echo "No tienes rol de admin";
    }
}

/*if(empty($_SESSION['active']))
{
    header('location: ../vista/v_autenticar.php');
}*/
 ?>
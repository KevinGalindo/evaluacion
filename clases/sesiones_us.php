<?php     
session_start();

if(!isset($_SESSION['rol'])){

    header('location: ../clases/error404.html');
    session_destroy();
}else{
    if($_SESSION['rol'] == 0 ){
        header('location: ../clases/error404.html');
        session_destroy();
    }else{
        if($_SESSION['rol'] != 2 ){
            // header('location: ../vista/lista_empresas.php');
            echo "admin";
            }
    }     
}

/*if(empty($_SESSION['active']))
{
    header('location: ../vista/v_autenticar.php');
}*/

?>
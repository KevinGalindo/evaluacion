<?php
    
    include ("../clases/conexion.php"); //incluye la conexion con la base de datos..
    $conexion = conexion::conectar(); // almacena la conexion en una variable..

    if(empty($_GET['id'])){ // Si el id de la empresa que viene por el get no existe entoces...
        header("location: v_lista_empresas.php"); //Lo regresa a la anterior ventana..
    }else{

        $id_empresa = $_GET['id']; //Declara el GET en una variable..
 
        //------------------inicia el codigo SQL para un selced por la variable id traida por el GET----------
        $query = mysqli_query($conexion, "SELECT t1.nit_empresa , t3.imagen , t1.nombre_empresa , t1.descripcion_empresa , t1.numero_contacto , t1.direccion , t2.tipo_empresa , t1.estado_produccion  
        FROM empresas t1 join tipo_empresa t2 on t1.id_tipo_empresa = t2.id_tipo_empresa
        JOIN gal_imagenes t3 on t1.nit_empresa = t3.nit_empresa
        WHERE t1.nit_empresa = $id_empresa");
        //-------------------Fin del codigo SQL---------//
     
        $result = mysqli_num_rows($query);

        if($result > 0){
            while($data = mysqli_fetch_array($query)){
              $nit = $data["nit_empresa"];
              $nombre_em = $data["nombre_empresa"];
              $descri = $data['descripcion_empresa'];
              $numero =  $data["numero_contacto"];
              $direccion =  $data["direccion"];
              $tipo_em =  $data["tipo_empresa"];
              $img_em = $data["imagen"];
                
               if($estado = $data["estado_produccion"] == 1){
                $estado = "si";
               }else{
                $estado = "no";
               }
            }
        }else{
            header("location: v_lista_empresas.php");
        }

        $id_prod = $_GET['id'];

        $query_pro = mysqli_query($conexion, "SELECT t1.id_producto , t3.imagen , t1.nombre_producto , t2.Tipo_producto 
                                            FROM productos t1 
                                            join tipo_producto t2 on t1.id_tipo_producto = t2.id_tipo_producto
                                            JOIN pro_imagenes t3 on t1.id_producto = t3.id_productos
                                            WHERE t1.nit_empresa = $id_prod");

        $result_pro = mysqli_num_rows($query_pro);
           
             /* $data["id_producto"];
              $nombre_pro = $data['nombre_producto'];
              $tipo_pro = $data['Tipo_producto'];
              $img_pro = $data["imagen"];*/
              
    }
    
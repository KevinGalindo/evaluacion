<?php

/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/




    require_once 'empresa_clase.php';
    class Vimprimir
    {
        /**
         * Esta funcion imprime una tabla que nos permitira almacenar datos en ella dependiendo
         * de cuantos datos haya en la base de datos.
         */
        static function imprimir( $resultado, $des = null )
        {
            return self::organizar( $resultado, $des );
        }

        static function organizar( $resultado, $des = null )
        {
            $salida = "";
            $id = "";
            $nit_empresa ="";
            $nombre_empresa="";
            $descripcion_empresa="";
            $numero_contacto="";
            $direccion="";
            $id_tipo_empresa="";
            $estado_produccion="";

            //$empres = new empresa_clase();
          
            

            if( $des == null ) $salida .= "<table border='1px'>";

            while( $fila = mysqli_fetch_array( $resultado ) )
            {
                if( $des == null ) $salida .= "<tr>";

                for( $i = 0; $i < mysqli_num_fields( $resultado ); $i ++ )
                {
                    if( $i == 0 ) $id = $fila[ 0 ]; 
                    

                    if( $des == null ) $salida .= "<td>";
                    $salida .= $fila[ $i ];
                    if( $des == null ) $salida .= "</td>";

                    if( $i + 1 == mysqli_num_fields( $resultado ) )
                    {
                        if( $des == null ) $salida .= "<td><a href='../vista/v_editar_empresa.php?nit_empresa=$id'>Editar</a></td>";
                        if( $des == null ) $salida .= "<td><a href='../controlador/c_seccion_borrar.php?id=$id'>Borrar</a></td>";
                    }
                }

                if( $des == null ) $salida .= "</tr>";
            }            

            if( $des == null ) $salida .= "</table>";

            return $salida;
        }
    }
    
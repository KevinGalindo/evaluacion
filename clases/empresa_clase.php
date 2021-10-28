<?php

/*AUTORES: GRUPO PROYECTO FONDO EMPRENDER
* Copyright © Todos los derechos reservados
*/

    //Esta clase nos sirve para almacenar datos de la tabla empresas

    class empresa_clase
    {
       
        public $nit ="";
        public $nombre_empresa = "";
        public $descripcion = "";
        public $telefono = "";
        public $direccion = "";
        public $tipo_empresa = "";
        public $estado_produccion = false;


        //Cada vez que inicie la funcion se ejecutara esto
        function __construct( array $parametro = null )
        {
            $m = new mysqli();

            
            $this->nombre_empresa = isset($parametro["nombre_empresa"]) ? $parametro["nombre_empresa"] : "Error parametro";
            $this->nit = $parametro["nit_empresa"];
            $this->descripcion = $parametro["descripcion_empresa"];
            $this->telefono = $parametro["numero_contacto"];
            $this->direccion = $parametro["direccion"];
            $this->tipo_empresa = $parametro["tipo_empresa"];
            $this->estado_produccion = ($parametro["estado_produccion"] == 1);


        }
    }
?>
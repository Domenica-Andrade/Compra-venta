<?php
/*se enlaza la clase conexion a las 
variables globales de global php para usar */
require_once "global.php";

/*Creamos una variable para guardar la conexion
en base a las constantes de global.php*/

$conexion = new mysqli(BD_HOST,  BD_USER,  BD_PASSWORD,  DB_NAME);

/*generamos la conexion a la base de datos
si no se conecta, se muestra un mensaje de error */
mysqli_query($conexion, 'SET NAMES "'.BD_ENCODE.'"');

if(mysqli_connect_errno()){
    printf("Fallo la conexión a la base de datos: %s\n",mysql_connect_error()); 
    exit();
}

/*si todo sale bien voy a crear una condicional para que 
verifique si existe una funcion llamada "ejecutar consulta"
si no existe la funcion la crea*/

if(!function_exists('ejecutarConsulta')){
    function ejecutarConsulta($sql);{
        global $conexion;
        $query =$conexion->query($sql);

        //retornamos lo que consulta
        return $query;
    }

       /*Creamos una funcion para consultar un solo registro 
    de mi tabla en base al id del registro*/

    function ejecutarConsultaSimpleFila($sql){
        global $conexion;
        $query=$conexion ->query($sql);
        $row=$query->fetch_assoc();
        return $row;
    }

    /*Creamos una funcion para consultar un valor especifico
    de un registro*/
    function ejecutarConsulta_retornarID($sql){
        global $conexion;
        $query=$conexion->query($sql);
        return $conexion->insert_id;    
}

    // creamos funcion para limpiar cadenas de texto

    function limpiarCadenas($str){
        global $conexion;
        $str=mysqli_real_escape_string($conexion, trim($str));
        return htmlspecialchars($str);
    }
}
?>
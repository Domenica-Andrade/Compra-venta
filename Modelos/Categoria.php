<?php
//Iniciamos inicialmente la conexion a la base de datos
require "../confi/Conexion.php";

//Creamos una clase de tipo categoria
/*Una clase es un molde para crear objetos 
Aqui vamos a programar todas las funciones del objeto*/

class Categoria{
    //Implementamos un constructor vacio
    //Es un metodo especial de una clase 

    public function _construct(){
   }

   //Implementamos un metodo para ingresar registros
   public function insertar($nombre, $descripcion){

    // se activa o se desacitiva una condicion, se activa con 1 y desactiva con 0
    $sql INSERT INTO Categoria (Nombre, descripcion, condicion)
    VALUE ('$Nombre','$descripcion','1');
    return ejecutarConsulta($sql);
   }

   //Implementar una funcion para editar registro
   public function editar($idcategoria,$nombre,$descripcion){
    $sql="UPDATE categoria SET nombre='$nombre', descripcion='$descripcion'
    WHERE idcategoria='$idcategoria'";
    return ejecutarConsulta($sql;)
   }

   //Implementamos un metodo para desactivar la categoria
   public function desactivar($idcategoria){
    $sql"UPDATE categoria SET condicion=0 WHERE idcategoria='$idcategoria'";
    return ejecutarConsulta($sql);
   }

   //Implementamos un metodo para activar la categoria
   public function activar($idcategoria){
    $sql"UPDATE categoria SET condicion=1 WHERE idcategoria='$idcategoria'";
    return ejecutarConsulta($sql);
   }

    //implementamos un metodo para mostrar un registro a modificar
    public function mostrar ($idcategoria){
    $sql="SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
    return ejecutarConsultaSimpleFila($sql);
    }

    //implemetamos un metodo para listar los datod de categoria 
    public function listar(){
        $sql="SELECT * FROM categoria";
        return ejecutarConsulta($sql);
    }
}


?>
<?php
//llamamos a la clase categoria
require_once "../modelos/Categoria.php";

//Instacionamos la clase categoria
$categoria=new Categoria();

//declaramos las variables para procesar los datos del formulario
$idcategoria=isset($_POST["idcategoria"])? limpiarCadenas($_POST['$idcategoria']):"";
$nombre=isset($_POST["nombre"])? limpiarCadenas($_POST['$nombre']):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadenas($_POST['$descripcion']):"";

//le vamos a decir al usuario que hacer o que necesita elegir
switch($_GET["op"]){
    case 'guardaryeditar':
        if(empty($idcategoria)){
            $rspta=$categoria->insertar($nombre,$descripcion);
            echo $rspta ? "Categoria registrada correctamente" : "No se guardo la categoria, lo sentimos :c";
        }else{
            $rspta=$categoria->editar($idcategoria,$nombre,$descripcion);
            echo $rspta ? "Categoria actualizada" : "No se puedo editar, perdon :c";
        }
        break;
    case 'desactivar':
    $rspta=$categoria->desactivar($idcategoria);
    echo $rspta ? "Categoria desactivada correctamente" : "no se pudo desactivar";
    break;

    case 'activar':
    $rspta=$categoria->activar($idcategoria);
    echo $rspta ? "Categoria activada correctamente" : "no se pudo activar";
    break;

    case 'mostrar':
        $rspta=$categoria->mostrar($idcategoria);
        //Codificar el resultado de jason
        echo json_encode ($rspta);
        break;
    
    case 'mostrar':
        $rspta=$categoria->listar();
        /*declaramos un array, array es para hacer listar, 
        array guarda en un espacio de memoria y 
        guarda todos los datos que necesitas*/
        $data = Array();

    /*realizamos un dato repetitivopara mostrar la informacion
    de la tabla*/
    //while trae todos los datos de la tabla
    while($reg=$rspta->fetch_object()){
        $data[]=array(
            0=>($reg->condicion) ? '<button class"btn-warning" on click="mostrar('.$reg->idcategoria.')">< i class="fa fa pencil" ></i></button>'.
            '<button class="btn btn-danger" onclick= "desactivar('.$reg-> idcategoria.')"><i class= "fa fa close" ></i></button>':
            '<button class="btn btn-warning" onclick=mostrar('.$reg->idcategoria.')">< i class="fa fa pencil" ></i></button>'. 
            '<button class="btn btn-primary" onclick=activar('.$reg->idcategoria.')">< i class="fa fa pencil" ></i></button>',

            //esto de aqui trae solo desde la base de datos
            "1"=> $reg->Nombre,
            "2"=> $reg->descripcion,
            "3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">desactivado</span>'
        );
    }

    $result=array(
        "sEcho"=>1, //Informacion para el data table
        "iTotalRecords"=>count($data), //enviamos el total de registros en la tabla
        "iTotalDisplayRecords"=>count($data), //enviamos el total de registros a visualizar 
        "aaData"=>$data);
        echo json_encode($result);
    break;
    

    }
?>   
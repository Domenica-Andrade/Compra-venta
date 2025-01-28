// creamos una variable de nombre tabla
var tabla;

//implementamos la funcion limit que me permite ejecutar mi js cuado le llame

function init(){
    //llamamos a la funcion mostrarform y enviamos false
    mostrarform (false);
    //llamamos a la funcion listar, que me permite mostrar los registros de la tabla categoria 
    //listar();
}

//implementamos una funcion para limpiar los imput de mi formulario
function limpiar(){
    $("#idcategoria").val("");
    $("#nombre").val("");
    $("#descripcion").val("");
}

//Implementamos la función mostrarform para ocultar o mostrar el formulario
function mostrarform(flag){
    limpiar();
    if(flag){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//funcion para calncelar formulrio 
function cancelarform(){
    limpiar();
    mostrarform(false);
}
//implementamos la funcion init que me permite mostrar el formulario 
init();
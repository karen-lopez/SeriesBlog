<?php

//libreria de funciones utiles

function mostrarError($errores, $campo){

    $alerta = '';
    if(!empty($campo) && isset($errores[$campo])){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }

    return $alerta;
}

function borrarErrores(){
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        unset($_SESSION['errores']);
    }
    
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }
  
}

function ObtenerCategorias($db){
    $query = "SELECT * FROM categorias ORDER BY nombre ASC;";
    $categorias = mysqli_query($db, $query);
    $result= array();
    
    if($categorias && mysqli_num_rows($categorias) >=1){
        //crea tabla hash
        while($categoria = mysqli_fetch_assoc($categorias)){
            array_push($result, $categoria);
        }
    }
    return $result;
}

function obtenerUltimasEntradas($db){
    $query =  "SELECT e.*, c.nombre AS 'categoria' FROM entradas e".
            " INNER JOIN categorias c ON e.categoria_id = c.id".
            " ORDER BY e.fecha DESC LIMIT 4";
    $entradas = mysqli_query($db, $query);
    $result= array();
    
    if($entradas && mysqli_num_rows($entradas) >=1){
        //crea tabla hash
        while($entrada = mysqli_fetch_assoc($entradas)){
            array_push($result, $entrada);
        }
    }
    return $result;
}
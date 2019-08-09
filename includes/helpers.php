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
    $sql = "SELECT * FROM categorias ORDER BY nombre ASC;";
    $categorias = mysqli_query($db, $sql);
    $result= array();
    
    if($categorias && mysqli_num_rows($categorias) >=1){
        //crea tabla hash
        while($categoria = mysqli_fetch_assoc($categorias)){
            array_push($result, $categoria);
        }
    }
    return $result;
}
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
    $_SESSION['errores'] = null;
    $borrado = session_unset();

    return $borrado;
}

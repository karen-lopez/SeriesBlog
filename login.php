<?php

//iniciar sesión y conexión a bd
require_once 'includes/conexion.php';

//recoger datos del formulario
//trim elimina espacios en las esquinas
if(isset($_POST)){
    
    //borrar datos de login con error
    if(isset($_SESSION['error_login'])){ 

       unset ($_SESSION['error_login']);
    }
     
    //recoge datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    //comprobar credenciales
    $query = "SELECT * FROM usuarios WHERE email = '$email';";
    $login = mysqli_query($db, $query);
    
    if($login && mysqli_num_rows($login)==1){
        //guarda/crea una "tabla hash" del resultado de la consulta
        $usuario = mysqli_fetch_assoc($login);
        
        //comprobar la contraseña
        $verify = password_verify($password, $usuario['password']);    
        
        if($verify){
            //guarar datos del usuario en una sesión
            $_SESSION['usuario'] = $usuario;
           
        }else {
        //error
        $_SESSION['error_login'] = 'login incorrecto';
        }
    } 
         
}
else{
    $_SESSION['error_login'] = 'login incorrecto';
}

header('Location: index.php');
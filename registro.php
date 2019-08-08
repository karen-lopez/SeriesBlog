<?php
session_start();
if(isset($_POST)){
    //conexion a la base de datos
    require_once 'includes/conexion.php';
    //iniciar sesión
    session_start();
    
    // recoger los valores del formulario registro
    $nombre = $_POST['nombre'] ?? false;
    $apellidos = $_POST['apellidos'] ?? false;
    $email = $_POST['email'] ?? false;
    $password = $_POST['password'] ?? false;

    //Array de errores
    $errores = array();

    // Validar los datos antes de ingresarlos a la base de datos

    //validar nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    //validar apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }

    //validar email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }

    //validar password
    if(!empty($password) && !preg_match("/\s/", $password) && count_chars($password)>5){
        $password_validado = true;
        var_dump($password);
    }else{
        $password_validado = false;
        $errores['password'] = "La contraseña no es valido";
    }

    //Agregar info de registro a la base de datos
    $guardar_usuario = false;

    if(count($errores)== 0){
        $guardar_usuario = true;

        //cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        //insertamos los datos en la tabla
        $sql = "INSERT INTO usuarios VALUES(null, $nombre, $apellidos, $email, $password_segura, CURDATE());";
        $guardar_query = mysqli_query($db, $sql);

        if($guardar_query){
            $_SESSION['completado'] = 'Se ha registrado con éxito';
        }else{
            $_SESSION['errores']['general'] = 'Fallo al guardar el usuario en la db';
        }

    }else {
        $_SESSION['errores'] = $errores;
    }
}

header('Location: index.php');

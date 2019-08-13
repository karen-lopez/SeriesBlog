<?php

    if(isset($_POST)){
        //conexion a la base de datos
        require_once 'includes/conexion.php';
        //iniciar sesión
        if(!isset($_SESSION)){
            session_start();
        }
        
        //guardar datos del usuario
        $nombre = mysqli_real_escape_string($db, $_POST['nombre']) ?? false;
        $apellidos = mysqli_real_escape_string($db, $_POST['apellidos']) ?? false;
        $email = mysqli_real_escape_string($db, $_POST['email']) ?? false;

        //Array de errores
        $errores = array();

        // Validar los datos antes de ingresarlos a la base de datos
        
        //validar nombre
        if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)){
            $errores['nombre'] = "El nombre no es valido";
        }

        //validar apellidos
        if(empty($apellidos) || is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos)){
            $errores['apellidos'] = "Los apellidos no son validos";
        }
        
        //validar email
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores['email'] = "El email no es valido";
        }else{
            $query = "SELECT * FROM usuarios WHERE email= '$email'";
            $existeEmail = mysqli_query($db, $query);
            //si ya existe ese correo en la db
            if(mysqli_num_rows($existeEmail) > 0){
                $existeEmail = mysqli_fetch_assoc($existeEmail);
                if($existeEmail['id'] != $_SESSION['usuario']['id']){
                    $errores['email'] = "El email ya esta registrado";
                }
            }
        }
    
        if(count($errores) == 0){
            $id = $_SESSION['usuario']['id'];
            var_dump($id);
            $query = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email' WHERE id = $id";
            $guardar = mysqli_query($db, $query);
            if($guardar){
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;
            }
            header('Location: perfil.php');
        }else{
            $_SESSION['errores'] = $errores;
            header('Location: editar-perfil.php');
        }
    } 

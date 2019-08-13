<?php

    if(isset($_POST)){
        //conexion a la base de datos
        require_once 'includes/conexion.php';
        //iniciar sesión
        if(!isset($_SESSION)){
            session_start();
        }
        //guardar datos del usuario
        if(isset($_POST['nombre'])){
            $nombre = mysqli_real_escape_string($db, $_POST['nombre']) ?? false;
        }else{
            $nombre = $_SESSION['usuario']['nombre'];
        }
        if(isset($_POST['apellidos'])){
            $nombre = mysqli_real_escape_string($db, $_POST['apellidos']) ?? false;
        }else{
            $nombre = $_SESSION['usuario']['apellidos'];
        }
        if(isset($_POST['email'])){
            $nombre = mysqli_real_escape_string($db, $_POST['email']) ?? false;
        }else{
            $nombre = $_SESSION['usuario']['email'];
        }
        //Array de errores
        $errores = array();

        // Validar los datos antes de ingresarlos a la base de datos
        
         //validar nombre
        if(empty($nombre) && is_numeric($nombre) && preg_match("/[0-9]/", $nombre)){
            $errores['nombre'] = "El nombre no es valido";
        }

        //validar apellidos
        if(empty($apellidos) && is_numeric($apellidos) && preg_match("/[0-9]/", $apellidos)){
            $errores['apellidos'] = "Los apellidos no son validos";
        }

        //validar email
        if(empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores['email'] = "El email no es valido";
        }
    
        if(count($errores) == 0){
            
            header('Location: perfil.php');
        }else{
            $_SESSION['errores'] = $errores;
            header('Location: editar-perfil.php');
        }
    } 

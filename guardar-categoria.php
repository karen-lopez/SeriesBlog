<?php

    if(isset($_POST)){
        //conexion a la base de datos
        require_once 'includes/conexion.php';
        //iniciar sesión
        if(!isset($_SESSION)){
            session_start();
        }
        //guardar nombre de categoria y escapar
        $nombre = mysqli_real_escape_string($db, $_POST['nombre']) ?? false;
        //Array de errores
        $errores = array();

        // Validar los datos antes de ingresarlos a la base de datos
        
        //validar nombre de categoria
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
            //no nombres repetidos
            $query = "SELECT nombre FROM categorias WHERE nombre = '$nombre'";
            $existeCategoria = mysqli_query($db, $query);
            var_dump($existeCategoria);
            if(mysqli_num_rows($existeCategoria) > 0){
                $errores['nombre'] = "El nombre de la categoria ya existe";
            } 
        }else{
            $errores['nombre'] = "El nombre no es valido";
            
        }
        var_dump($errores);
        if(count($errores) == 0){
            $query = "INSERT INTO categorias VALUES(null, '$nombre')";
            mysqli_query($db, $query);
            header('Location: index.php');
        }else{
            $_SESSION['errores'] = $errores;
            header('Location: crear-categoria.php');
        }
    } 

<?php

    if(isset($_POST)){
        //conexion a la base de datos
        require_once 'includes/conexion.php';
        //iniciar sesión
        if(!isset($_SESSION)){
            session_start();
        }
        //guardar informacion y escapar
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']) ?? false;
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']) ?? false;
        $categoria = mysqli_real_escape_string($db, $_POST['categoria']) ?? false;
        //Array de errores
        $errores = array();

        // Validar los datos antes de ingresarlos a la base de datos
        
        //validar titulo de entrada
        if(empty($titulo) || is_numeric($titulo) ){
            $errores['titulo'] = "El titulo no es valido";
        }
        
        //validar la descripcion de la entrada
        if(empty($descripcion) || is_numeric($descripcion) || (preg_match('/^[\w .,!?()]+$/', $message)) == false ){
            $errores['descripcion'] = "Descripcion invalida";
        }
        
        //validar categoria de la entrada
        if(empty($categoria) ){
            $errores['categoria'] = "Categoria invalida";
        }
        
        echo var_dump($errores);
        if(count($errores) == 0){
            $usuario = $_SESSION['usuario']['id'];
            $query = "INSERT INTO entradas VALUES(null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE())";
            mysqli_query($db, $query);
            header('Location: index.php');
        }else{
            $_SESSION['errores_entrada'] = $errores;
            header('Location: crear-entradas.php');
        }
    } 
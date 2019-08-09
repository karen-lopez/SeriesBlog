<?php require_once 'conexion.php'; ?>
<?php require_once 'helpers.php'; ?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Blog de Series</title>
        <!-- agregamos hoja de estilos -->
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    
    <body>
        <!-- Cabecera -->
        <header id="cabecera">
            
            <div id="logo">
                <a href="index.php">
                    Blog de Series
                </a>
            </div>
            
            <!-- MENU -->
            <?php $categorias = ObtenerCategorias($db); ?>
            <nav id="menu">

                <ul>

                    <li><a href="index.php"> Inicio </a></li>
                    <?php foreach ($categorias as $categoria):
                        echo "<li><a href='categoria.php?id=".$categoria['id']."'>".$categoria['nombre']."</a></li>";                        
                    endforeach;
                    ?>
                    <li><a href="index.php"> Sobre mi </a></li>
                    <li><a href="index.php"> Contacto </a></li>

                </ul>

            </nav>
            
        </header>
        
        <div id="contenedor">
            


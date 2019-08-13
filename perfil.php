<?php require_once './includes/cabecera.php'; ?>   
<?php require_once './includes/lateral.php'; ?>

<!-- Prinsipal -->
<div id="principal" class="container">
    <div class="card text-center p-4">
        <?php $usuario = $_SESSION['usuario']; ?>
        <h1>Perfil de Usuario</h1>
        <div class="container">
            <label>Nombre: <?=$usuario['nombre']?></label>
            <label>Apellidos: <?=$usuario['apellidos']?></label>
            <label>Email: <?=$usuario['email']?></label>
        </div>
        <div class="container">
           <a  href="editar-perfil.php" class="btn btn-outline-info  mx-2">Editar perfil</a>
           <a href="cambiar-password.php" class="btn btn-outline-info">Cambiar contraseña</a> 
        </div>
    </div>
    
    
    
</div>

<?php require_once './includes/footer.php'; ?>


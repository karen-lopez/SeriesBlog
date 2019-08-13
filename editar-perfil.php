<?php require_once './includes/cabecera.php'; ?>   
<?php require_once './includes/lateral.php'; ?>

<!-- Prinsipal -->
<div id="principal" class="container">
    <div class="card text-center p-4">
        <?php $usuario = $_SESSION['usuario']; ?>
        <h1>Perfil de Usuario</h1>
        <div class="container">
            <form action="actualizar-perfil.php" method="POST" class="form">
                <label for="nombre">Nombre: 
                    <input type="text" name="nombre" value="<?=$usuario['nombre']?>" required/>
                </label>
                <?php echo mostrarError($_SESSION['errores'] ?? false, 'nombre')  ; ?>
                <label for="apellidos">Apellidos: 
                    <input type="text" name="apellidos" value="<?=$usuario['apellidos']?>" required/>
                </label>
                <?php echo mostrarError($_SESSION['errores'] ?? false, 'apellidos')  ; ?>
                <label for="email">Email: 
                    <input type="email" name="email" value="<?=$usuario['email']?>" required/>
                </label>
                <?php echo mostrarError($_SESSION['errores'] ?? false, 'email')  ; ?>
                <input type="submit" name="submit" value="Actualizar" class="btn btn-info"/>
            </form>
            <?php borrarErrores() ?>
            
        </div>
    </div>
    
    
    
</div>

<?php require_once './includes/footer.php'; ?>


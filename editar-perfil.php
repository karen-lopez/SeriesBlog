<?php require_once './includes/cabecera.php'; ?>   
<?php require_once './includes/lateral.php'; ?>

<!-- Prinsipal -->
<div id="principal" class="container">
    <div class="card text-center p-4">
        <?php $usuario = $_SESSION['usuario']; ?>
        <h1>Perfil de Usuario</h1>
        <div class="container">
            <form action="actualizar-perfil.php" method="POST" class="form">
                <label>Nombre: 
                    <input type="text" placeholder="<?=$usuario['nombre']?>"/>
                </label>
                <label>Apellidos: 
                    <input type="text" placeholder="<?=$usuario['apellidos']?>"/>
                </label>
                <label>Email: 
                    <input type="email" placeholder="<?=$usuario['email']?>"/>
                </label>
                <input type="submit" name="submit" value="Actualizar" class="btn btn-info"/>
            </form>
            
        </div>
    </div>
    
    
    
</div>

<?php require_once './includes/footer.php'; ?>


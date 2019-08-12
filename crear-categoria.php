<?php require_once './includes/redireccion.php'; ?>
<?php require_once './includes/cabecera.php'; ?>   
<?php require_once './includes/lateral.php'; ?>

<!-- Prinsipal -->
<div id="principal" class="container">
    
    <h1>Crear categoria</h1>
    
    <form action="guardar-categoria.php" method="POST" class="card p-2">
        <label for="nombre">Nueva categoria</label>
        <input type="text" name="nombre" pattern="(\p{L}{3,})(\p{L}{3,}))?" required/>
        <?php echo mostrarError($_SESSION['errores'] ?? false, 'nombre')  ; ?>
        <input type="submit" name="crear" class="btn btn-info w-25" />
    </form>
    <?php borrarErrores(); ?>
    
    
</div>

<?php require_once './includes/footer.php'; ?>


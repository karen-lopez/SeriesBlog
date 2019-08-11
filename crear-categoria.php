<?php require_once './includes/redireccion.php'; ?>
<?php require_once './includes/cabecera.php'; ?>   
<?php require_once './includes/lateral.php'; ?>

<!-- Prinsipal -->
<div id="principal" class="container">
    
    <h1>Crear categoria</h1>
    
    <form action="guardar-categoria.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" />
            
    </form>
    
</div>

<?php require_once './includes/footer.php'; ?>


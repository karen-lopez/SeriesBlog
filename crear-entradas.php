<?php require_once './includes/redireccion.php'; ?>
<?php require_once './includes/cabecera.php'; ?>   
<?php require_once './includes/lateral.php'; ?>

<!-- Prinsipal -->
<div id="principal" class="container">
    
    <h1>Crear entrada</h1>
    
    <form action="guardar-entrada.php" method="POST" class="card form p-2">
        <div class="form-group">
            <label for="titulo">Titulo de la entrada</label>
            <input type="text" name="titulo" class="form-control w-100" required/>
            <?php echo mostrarError($_SESSION['errores'] ?? false, 'titulo')  ; ?>
        </div>
        <div class="form-group">
        <label for="descripcion">Descripción de la entrada</label>
        <textarea name="descripcion"  class="form-control w-100" required /> </textarea>
        <?php echo mostrarError($_SESSION['descripcion'] ?? false, 'descripcion')  ; ?>
        </div>
         <div class="form-group">
            <label for="categoria">Elija una Categoria</label>
            <select name="categoria" class="form-control w-50" required>
                <?php $categorias = ObtenerCategorias($db);
                    foreach ($categorias as $categoria):?>
                        <option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>
                <?php endforeach;?>
          </select>
          <?php echo mostrarError($_SESSION['categoria'] ?? false, 'categoria')  ; ?>
        </div>
        <input type="submit" name="crear" class="btn btn-info w-25" />
    </form>
    <?php borrarErrores(); ?>
    
    
</div>

<?php require_once './includes/footer.php'; ?>


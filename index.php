<?php require_once './includes/cabecera.php'; ?>        
<?php require_once './includes/lateral.php'; ?>
            
    <!-- Caja prinsipal -->
    <div id="principal" class="container">
        <h1>Ultimas entradas</h1>
        
        <?php $entradas = obtenerUltimasEntradas($db);
    foreach ($entradas as $entrada):?>
        <article class="entrada">
        <h2><?=$entrada['titulo']?></h2>
        <span class="fecha"><?=$entrada['categoria']." | ".$entrada['fecha']?></span>
        <!-- acota la descripcion a 175 palabras a mostrar -->
        <p><?=substr($entrada['descripcion'],0,175)."..."?></p>
        </article>
    <?php endforeach;?>
        
        <div id="ver-todas">
        <a href="entradas.php" class="btn btn-info w-50">Ver todas las entradas</a>
        </div>

    </div>

</div>

<?php require_once './includes/footer.php'; ?>

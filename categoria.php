
<?php if(isset($_GET['id'])){ ?>
    <?php require_once './includes/cabecera.php'; ?>        
    <?php require_once './includes/lateral.php'; ?>

        <!-- Caja prinsipal -->
        <div id="principal" class="container">
            <?php $entradas = obtenerEntradasCategoria($db, $_GET['id']); ?>
            <h1>Entradas</h1>
            
            <?php foreach ($entradas as $entrada):?>
                <article class="entrada">
                <h2><?=$entrada['titulo']?></h2>
                <span class="fecha"><?=$entrada['categoria']." | ".$entrada['fecha']?></span>
                <!-- acota la descripcion a 175 palabras a mostrar -->
                <p><?=substr($entrada['descripcion'],0,175)."..."?></p>
                </article>
            <?php endforeach;?>
        </div>

    <?php require_once './includes/footer.php';

} else {
    header('Location: index.php');
} ?>
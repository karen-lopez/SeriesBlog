<!-- Barra lateral -->
            <aside id="sidebar" class="container">
                <?php if(isset($_SESSION['usuario'])): ?>
                <div id='usuario-logueado' class="bloque text-center ">
                    <h2>Bienvenido, <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'];?></h2>
                    <!-- Botones -->
                    <a href="perfil.php" class="btn btn-info mx-2 my-1 w-75">Mi perfil</a>
                    <a href="crear-entradas.php" class="btn btn-info mx-2 my-1 w-75">Crear Entrada</a>
                    <a href="crear-categoria.php" class="btn btn-info mx-2 my-1 w-75">Crear Categoria</a>
                    <a href="cerrar.php" class="btn btn-info mx-2 my-1 w-75">Cerrar sesión</a>
                
                </div>
                <?php else: ?>
                <div id="login" class="bloque container col-12">
                    <h4> Identifícate</h4>
                    <?php if(isset($_SESSION['error_login'])):
                        echo "<div class='alerta alerta-error'>".$_SESSION['error_login']."</div>";
                        endif; 
                    ?>
                    <form action="login.php" method="POST">
                        <label for="email"> Email </label>
                        <input type="email" name="email" required/>

                        <label for="password"> Contraseña </label>
                        <input type="password" name="password" required/>

                        <input type="submit" name="submit" value="Entrar" class="btn btn-primary mx-auto"/>

                    </form>
                </div>

                <div id="register" class="bloque container">
                    <h4> Registrate</h4>
                    <?php    
                        if(isset($_SESSION['completado'])):
                            echo "<div class='alerta'>".$_SESSION['completado']."</div>";
                        else:
                            if(isset($_SESSION['errores']['general'])):
                            echo "<div class='alerta alerta-error'>".$_SESSION['errores']['general']."</div>";
                            endif;
                        endif;
                    ?>
                    <form action="registro.php" method="POST">
                        <label for="nombre"> Nombre </label>
                        <input type="text" name="nombre" pattern="(\p{L}{3,})(([ ])(\p{L}{3,}))?" required/>
                        <?php echo mostrarError($_SESSION['errores'] ?? false, 'nombre')  ; ?>

                        <label for="apellidos"> Apellidos </label>
                        <input type="text" name="apellidos" pattern="(\p{L}{3,})(([ ])(\p{L}{3,}))?" required/>
                        <?php echo mostrarError($_SESSION['errores'] ?? false, 'apellidos')  ; ?>

                        <label for="email"> Email </label>
                        <input type="email" name="email" required/>
                        <?php echo mostrarError($_SESSION['errores'] ?? false, 'email')  ; ?>

                        <label for="password"> Contraseña </label>
                        <input type="password" name="password" required/>
                        <?php echo mostrarError($_SESSION['errores'] ?? false, 'password')  ; ?>

                        <input type="submit" name="submit" value="Registrarse" class="btn btn-primary mx-auto"/>

                    </form>
                    <?php borrarErrores(); ?>
                </div>
                <?php endif; ?>

            </aside>

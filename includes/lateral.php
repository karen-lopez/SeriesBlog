<?php require_once 'includes/helpers.php'; ?>
<!-- Barra lateral -->
            <aside id="sidebar">
                <div id="login" class="bloque">
                    <h3> Identifícate</h3>
                    <form action="login.php" method="POST">
                        <label for="email"> Email </label>
                        <input type="email" name="email" required/>

                        <label for="password"> Contraseña </label>
                        <input type="password" name="password" required/>

                        <input type="submit" name="submit" value="Entrar"/>

                    </form>
                </div>

                <div id="login" class="bloque">
                    <h3> Registrate</h3>
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

                        <input type="submit" name="submit" value="Registrarse"/>

                    </form>
                    <?php borrarErrores(); ?>
                </div>

            </aside>

<?php if (isset($_SESSION["usuario"])){
        echo "<h3>Bienvenido ".$_SESSION["usuario"]."</h3>";
        echo "<a href='/'>Inicio</a><br/>";	
        // Le muestro el boton de cerrar sesion
        echo "<a href='/logout'>Cerrar sesion</a><br/>";
        // Si el perfil es conductor muestro un boton de ver multas
        if ($_SESSION["perfil"] == "conductor"){
            echo "<a href='/multas'>Ver multas</a>";
        } else if ($_SESSION["perfil"] == "agente"){
            echo "<a href='/agente/multas'>Ver multas</a>";
        } else if ($_SESSION["perfil"] == "admin"){
            echo "<a href='/conductores'>Ver conductores</a>";
        }

    } else{?>
    <h3>Gestión de multas</h3>
    <form action="/login" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario"><br/>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br/>
        <label> Captcha: <?php echo $cap ?></label>
        <!-- Pongo un radio button con las imagenes de peaton conductor y agente -->
        <input type="radio" name="captcha" value="Peaton"> Peaton <img src="./img/peaton.png" alt="Peaton">
        <input type="radio" name="captcha" value="Coche"> Coche <img src="./img/coche.png" alt="Coche" width="70px">
        <input type="radio" name="captcha" value="Semaforo"> Semaforo <img src="./img/semaforo.png" alt="Semaforo" width="70px"><br/>
        <input type="submit" value="Enviar">
    </form>
    <?php } ?>
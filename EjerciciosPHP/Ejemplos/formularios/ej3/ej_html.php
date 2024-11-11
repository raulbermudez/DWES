<?php
/**
 * Incluye el arraya y crea un formulario con el
 * @author = Raúl Bermúdez González
 */
include("./ej.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario</title>
    </head>
    <body>
        <h1>Datos personales</h1>
        <form action="ej_mostrar.php" method="post">
            <?php    
                foreach ($datosPersonales as $nombre => $info){
                    echo "<input type='text' name='$datosPersonales[$nombre]' placeholder='$datosPersonales[$nombre]' value=''/>";
                }
            ?>
        <input type="submit" name="enviar" placeholder="Send"/>
        </form>
    </body>
</html>
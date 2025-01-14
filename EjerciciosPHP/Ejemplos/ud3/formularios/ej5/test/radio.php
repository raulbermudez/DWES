<?php
/**
 * Comprobacion de la devolucion del radio button
 * 
*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="rb_p.php" method="POST">
            <fieldset>
                <legend>Método de contacto</legend>
                <input type="radio" name="metodo_con" value="Correo" checked>Correo
                <input type="radio" name="metodo_con" value="Telefono móvil">Telefono móvil
                <input type="radio" name="metodo_con" value="Telegram">Telegram 
                <input type="radio" name="metodo_con" value="Discord">Discord
            </fieldset><br/>
            <button type="submit" name="enviar">Enviar</button>
        </form>
    </body>
</html>
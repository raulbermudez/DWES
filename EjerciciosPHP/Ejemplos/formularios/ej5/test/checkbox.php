<?php
/**
 * Comprobacion de la devolucion del checkbox button
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
        <form action="ck_p.php" method="POST">
            <input type="checkbox" name="metodo_con[]" value="Correo" checked>Correo
            <input type="checkbox" name="metodo_con[]" value="Telefono móvil">Telefono móvil
            <input type="checkbox" name="metodo_con[]" value="Telegram">Telegram 
            <input type="checkbox" name="metodo_con[]" value="Discord">Discord
            <button type="submit" name="enviar">Enviar</button>
        </form>
    </body>
</html>
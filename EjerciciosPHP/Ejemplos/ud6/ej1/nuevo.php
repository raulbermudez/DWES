<?php
/**
 * @author raul <email>
 */
require_once "lib/function.php";

if (isset($_POST['enviar'])){

    $nombre = cleardata($_POST['nombre']);
    $raza = cleardata($_POST['raza']);
    $peso = cleardata($_POST['peso']);

    $db = conectaBD();
    $sql = "INSERT INTO perros(nombre, peso, raza) VALUES (:nombre, :peso, :raza)";
    $consulta = $db->prepare($sql);
    $consulta->execute(array(":nombre"=>$nombre, ":raza"=>$raza, ":peso"=>$peso));

    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h2>Nueva mascota</h2>
        <form action="" method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre"/>
            <label>Peso:</label>
            <input type="number" name="peso"/>
            <label>Raza:</label>
            <input type="text" name="raza"/>

            <input type="submit" name="enviar"/>
        </form>
    </body>
</html>
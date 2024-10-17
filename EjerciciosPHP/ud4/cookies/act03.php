<?php
/**
 * Añadir un formulario de login y passsword y casilla de verificacion
 * @author = Raúl Bermúdez González
 * @date = 17-10-2024
 */

$usuario = "";
$contrasena = "";
$guardar;
// Compruebo que el formulario se ha enviado
$lProcesaFormulario = false;

if (isset($_POST['enviar'])){
    $lProcesaFormulario = true;
}

// Si se ha enviado recojo los datos
if ($lProcesaFormulario){
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    // Compruebo la casilla de checkbox(la que sera la cookie)
    if ($_POST['guardar']){
        $guardar = $_POST['guardar'];
    }else{
        $guardar = false;
    }
    // Compruebo que no haya ningun campo vacio
    if (($usuario == "") || ($contrasena == "")){
        $lProcesaFormulario = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 3 - Cookies</title>
    </head>
    <body>
        <!-- Creación del formulario -->
        <form action="" method="post">
            <label>Usuario:</label>
            <input type="text" name="usuario" value="<?php echo $usuario ?>"/><?php if ($usuario == "")  echo "Requerido" ?><br/>
            <label>Contraseña:</label>
            <input type="text" name="contrasena" value="<?php echo $contrasena ?>"/><?php if ($contrasena == "")  echo "Requerido"?> <br/>
            <input type="checkbox" name="guardar" checked>¿Quieres guardar los datos?
            <br/><button type="submit" name="enviar">Enviar</button>
        </form>
    </body>
</html>
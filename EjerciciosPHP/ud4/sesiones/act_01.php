<?php
/** 
 
*Ejemplo de uso de sesiones utilizando un array para manejo
*de una agenda de contactos
*@author Raul Bermudez
*/

// INICIAMOS SESIÓN

session_start();
$errorNombre = "";
$errorEmail = "";
$errorTelefono = "";
$nombre ="";
$email = "";
$tfno = "";
// SI NO EXISTE LA VARIABLE DE SESIÓN, LA CREAMOS COMO ARRAY VACÍO

if(!isset($_SESSION["contacts"])) {
    $_SESSION["contacts"] = array();
}

if(isset($_POST["enviar"])){
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $tfno = $_POST["tfno"];
    $lProcesaDatos = true;

    if ($nombre == ""){
        $errorNombre = "Campo requerido";
        $lProcesaDatos = false;
    }

    if ($email == "" || (!filter_var($email, FILTER_VALIDATE_EMAIL))){
        $errorEmail = "Campo requerido";
        $lProcesaDatos = false;
    }

    if ($tfno == ""){
        $errorTelefono = "Campo requerido";
        $lProcesaDatos = false;
    }

    // AÑADIMOS UN NUEVO ELEMENTO AL ARRAY. VER ARRAY_PUSH
    if ($lProcesaDatos){
        $_SESSION["contacts"][] = array(
            "nombre" => $nombre,
            "email" => $email,
            "tfno" => $tfno
        );
    } else{
        $nombre ="";
        $email = "";
        $tfno = "";
    }
}

$data = $_SESSION["contacts"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Agenda</h1>
        <h2>Nuevo Contacto</h2>
        <form action="" method="post">
            Nombre: <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>"><?php echo $errorNombre; ?><br/>
            Email: <input type="text" name="email" id="email" value="<?php echo $email ?>"><?php echo $errorEmail; ?><br/>
            Telefono: <input type="text" name="tfno" id="tfno" value="<?php echo $tfno ?>"><?php echo $errorTelefono; ?><br/>
            <input type="submit" value="enviar" name="enviar">
        </form>
        <h2>Lista de Contactos</h2>
        <?php
            foreach($data as $clave => $valor){
                echo $valor["nombre"] . " - " . $valor["email"] . " - " . $valor["tfno"];
                echo "<br/>";
            }
        ?>

        <br/>
        <a href="cerrarSesion.php">Cerrar sesión</a>
        <button><a href="https://github.com/raulbermudez/DWES/tree/master/EjerciciosPHP/ud4/sesiones/act_01.php">Código</a></button>
    </body>
</html>
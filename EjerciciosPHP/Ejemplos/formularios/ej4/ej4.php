<?php
/**
 * @author = Raúl Bermúdez González
 */

$lProcesaFormulario = false;
$nombre = "";
$apellidos = "";
$email = "";
// Se ha enviado el formulario??
if (isset($_POST["enviar"])){
    $lProcesaFormulario = true;
}

if ($lProcesaFormulario){
    // Recogemos los datos
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    if ((!filter_var($email, FILTER_VALIDATE_EMAIL))){
        $lProcesaFormulario = false;
    }
}
// Array indexado que contiene los grupos
//$arrayGrupos = array("1º Daw", "2º Daw", "1º ASIR", "2º ASIR");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario</title>
    </head>
    <body>
        <?php
            if ($lProcesaFormulario){
                // Mostramos los datos
                echo "Nombre: $nombre <br/> Apellidos: $apellidos <br/> Email: $email";
            } else{

        ?>
        <form action="" method = "post">
            <input type="text" name="nombre" placeHolder="Nombre" value="<?php echo $nombre ?>"/><br/>
            <input type="text" name="apellidos" placeHolder="Apellidos" value="<?php echo $apellidos ?>"/><br/>
            <input type="text" name="email" placeHolder="Email" value="<?php echo $email ?>"/><br/>
            <!--<select name="grupos">
                <-?php
                    foreach ($arrayGrupos as $clave => $valor){
                        echo "<option value='$valor'>$valor</option> ";
                    }
                ?>
            </select><br/>-->
            <input type="submit" name="enviar" value="enviar"/>
        </form>
        <?php
            }
        ?>       
    </body>
</html>


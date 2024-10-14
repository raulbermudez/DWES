<?php
/**
 * 3. Formulario para crear un currículum que incluya: Campos de texto, grupo de
* botones de opción, casilla de verificación, lista de selección única, lista de
* selección múltiple, botón de validación, botón de imagen, botón de reset, etc.
* @author = Raul Bermudez Gonzalez
* @date = 14-10-2024
 */
$lProcesaFormulario = false;
// Se ha enviado el formulario??
if (isset($_POST["enviar"])){
    $lProcesaFormulario = true;
}

if ($lProcesaFormulario){
    // Recogemos los datos
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $estudios = $_POST["titulacion"];
    if (!$_POST["trabajo"]){
        $trabajo = "NO";
    } else{
        $trabajo = "Sí";
    }
    $idiomas = $_POST["idiomas"];
    $contacto = $_POST["metodo_con"];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formularios ejercicio 3</title>
        <style>
            .code {
                margin-top: 70px;
            }
        </style>
    </head>
    <body>
        <h1>Curriculum personal</h1>
        <?php
            if ($lProcesaFormulario){
                // Mostramos los datos
                echo "Nombre: $nombre <br/> Apellidos: $apellidos 
                <br/> Estudios: $estudios <br/> ¿Trabajo fuera?: $trabajo <br/> 
                Idiomas:";
                foreach ($idiomas as $clave => $valor){
                    echo " " . $valor;
                }
                echo "<br/>Contacto: $contacto";
            } else{
        ?>
        <form action="" method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre" value=""/><br/>
            <label>Apellidos:</label>
            <input type="text" name="apellidos" placeholder="Apellidos" value=""/><br/>

            <label>Ultimos estudios:</label>
            <select name="titulacion">
                <option value="Bachillerato">Bachillerato</option>
                <option value="ESO">ESO</option>
                <option value="Grado Superior">Grado Superior</option>
                <option value="Carrera Universitaria">Carrera Universitaria</option>
                <option value="Master">Master</option>          
            </select><br/>

            <label>Dispuesto a trabajar fuera de España</label>
            <input type="checkbox" name="trabajo"><br/>

            <label>Idiomas que hablas</label>
            <select name="idiomas[]" multiple>
                <option value="ingles">Ingles</option>
                <option value="frances" selected>Frances</option>
                <option value="aleman">Aleman</option>
                <option value="italiano">Italiano</option>
                <option value="español">Español</option>
            </select><br/>

            <fieldset>
                <legend>Método de contacto</legend>
                <input type="radio" name="metodo_con" value="Correo" checked>Correo
                <input type="radio" name="metodo_con" value="Telefono móvil">Telefono móvil
                <input type="radio" name="metodo_con" value="Telegram">Telegram 
                <input type="radio" name="metodo_con" value="Discord">Discord
            </fieldset><br/>

            <button type="submit" name="enviar">Enviar</button>
            <button type="reset" name="reset">Resetear formulario</button>
        </form>
        <?php
            }
        ?>
        <div class="code">
        <button type="button"><a href="https://github.com/raulbermudez/DWES/blob/master/EjerciciosPHP/ud3/formularios/act_03.php">Ver código</a></button>
    </div>
    </body>
</html>
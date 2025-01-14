<?php
/**
 * 4. Crear una aplicación que almacene información de países: nombre capital y
*bandera. Diseñar un formulario que permita seleccionar un país y nos muestre el
*nombre de la capital y la bandera. 
* @author = Raul Bermudez Gonzalez
* @date = 14-10-2024
*/
$apaises = array("España" => array("Madrid", "./img/españa.jpg"),
                 "Francia" => array("Paris", "./img/francia.jpg"),
                 "Italia" => array("Roma", "./img/italia.jpg"),
                 "Portugal" => array("Lisboa", "./img/portugal.png"));

$lProcesaFormulario = false;

if (isset($_POST["enviar"])){
    $lProcesaFormulario = true;
}

if ($lProcesaFormulario){
    $pais = $_POST["pais"];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formularios Ejercicio 4</title>
        <style>
            .code {
                margin-top: 70px;
            }
        </style>
    </head>
    <body>
        <h1>Paises con capital y foto</h1>
        <?php
            if ($lProcesaFormulario){
                foreach ($apaises as $clave => $valor){
                    if ($clave == $pais){
                        echo "Capital: $valor[0]<br/>";
                        echo "<img src='$valor[1]' width=500 height=500></img>";
                    }
                }
            } else {
        ?>
        <label>Elige el país</label>
        <form action="" method="post">
            <select name="pais">
                <option name="francia" value="Francia">Francia</option>
                <option name="españa" value="España">España</option>
                <option name="portugal" value="Portugal">Portugal</option>
                <option name="Italia" value="Italia">Italia</option>
            </select><br/>
            <button type="submit" name="enviar">Enviar</button>
        </form>

        <div class="code">
        <button type="button"><a href="https://github.com/raulbermudez/DWES/blob/master/EjerciciosPHP/ud3/formularios/act_04.php">Ver código</a></button>
        <?php
            }
        ?>
    </div>
    </body>
</html>
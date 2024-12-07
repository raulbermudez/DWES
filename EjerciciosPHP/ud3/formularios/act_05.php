<?php
/**
 * Crear un script para sumar una serie de números. El número de números a sumar
 * será introducido en un formulario.
 * @author = Raúl Bermúdez González
 * @date = 15-10-2024
 */
$lProcesaFormulario = false;
$lProcesaSuma = false;
$suma = 0;
$numerosSumados = array();

if (isset($_POST["enviar"])){
    $lProcesaFormulario = true;
} else if (isset($_POST["sumar"])){
    $lProcesaFormulario = true;
    $lProcesaSuma = true;
}



if ($lProcesaFormulario){
    if ($lProcesaSuma){
        foreach ($_POST as $clave => $valor){
            if (is_numeric($valor)){
                if ($clave != 'numero'){
                    $suma += $valor;
                }
                $numerosSumados += $valor;
            }

        };
    } else{
        $numerosSumados = $_POST['numero'];
        if ($numerosSumados[0] < 2){
            echo "No se pueden sumar 1 o menos numeros";
            $lProcesaFormulario = false;
        }
    }
}

?>
<!-- VISTA -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formularios Ejercicio 5</title>
        <style>
            .code {
                margin-top: 70px;
            }
        </style>
    </head>
    <body>
        <h1>Suma de números</h1>
        <form action="" method="post">
            <label>Cuántos números quieres sumar</label>
            <input type="number" name="numero" value="<?php echo $numerosSumados[0]?>"/><br/>
            <?php
        
            if ($lProcesaFormulario){
                for ($i = 1; $i <= $numerosSumados[0]; $i++){
                    echo "<label>Numero: $i</label>";
                    echo "<input type='number' name='numero$i' value='" . $numerosSumados[$i] . "'/><br/>";
                }
                echo "<button type='submit' name='sumar'>Sumar</button><br/>";
                if ($lProcesaSuma){
                    echo "La suma es: " . $suma;
                }
            } else{

        ?>
        <button type="submit" name="enviar">Enviar</button>
        <?php
            }
        ?>
        </form>
        <button type="button"><a href="https://github.com/raulbermudez/DWES/blob/master/EjerciciosPHP/ud3/formularios/act_05.php">Ver código</a></button>
    </body>
</html>
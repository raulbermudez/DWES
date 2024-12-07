<?php
/**
 * Creación de un formulario que genere aleatoriamente un examen desde un array de examenes
 * @author raul bermudez
*/

// Incluimos el array de examenes
include("./config/conf.php");

// Inicializo la variable donde tendre el examen
$examenSeleccionado = array();
$nombrePregunta = "";
$lProcesaFormulario = false;
$aciertos = 0;
$porcentajeAcierto = 0;
$acertada = false;
$aRespuestas = array();
$respuesta1 = $respuesta2 = $respuesta3 = $respuesta4 = $respuesta5 = array();


// Compruebo que se haya enviado el formulario
if (isset($_POST['enviar'])){
    $lProcesaFormulario = true;
}

// Si $lProcesaFormulario es true empiezo a comprobar
if ($lProcesaFormulario){
    // Obtengo el valor del campo oculto
    $nombreExamen = $_POST['examen'];
    // Tengo el valor del examen que se me ha enviado para que no cambie
    $examen = $nombreExamen[7] - 1;
    // Recorro el array del configpara encontrar las respuestas de ese examen
    foreach ($preguntas as $clave => $valor){
        foreach ($valor as $indice1 => $indice2){
            if ($indice1 == $nombreExamen){
                foreach ($indice2 as $indice3 => $respuestas){
                    $aRespuestas[] = $respuestas[2];
                }
            }
        }
    }

    // Compruebo si se ha eniado respuesta
    if (isset($_POST['respuesta0'])){
        // Guardo lo que me ha devuelto el formulario
        $respuesta1 = $_POST['respuesta0'];
        $longitudArray = count($respuesta1);
        // Compruebo que sean correctas las respuestas
        if ($longitudArray == 2){
            if (in_array($respuesta1[0], $aRespuestas[0]) && in_array($respuesta1[1], $aRespuestas[0])){
                $acertada = true;
            }
        }
        // Si se ha acertado sumo los aciertos
        if ($acertada){
            $aciertos ++;
        }
        
    }

    // Compruebo si se ha eniado respuesta
    if (isset($_POST['respuesta1'])){
        // Guardo lo que me ha devuelto el formulario
        $respuesta2 = $_POST['respuesta1'];
        $longitudArray = count($respuesta2);
        // Compruebo que sean correctas las respuestas
        if ($longitudArray == 2){
            if (in_array($respuesta2[0], $aRespuestas[1]) && in_array($respuesta2[1], $aRespuestas[1])){
                $acertada = true;
            }
        }
         // Si se ha acertado sumo los aciertos
        if ($acertada){
            $aciertos ++;
        }
    }

    // Compruebo si se ha eniado respuesta
    if (isset($_POST['respuesta2'])){
        // Guardo lo que me ha devuelto el formulario
        $respuesta3 = $_POST['respuesta2'];
        $longitudArray = count($respuesta3);
        // Compruebo que sean correctas las respuestas
        if ($longitudArray == 2){
            if (in_array($respuesta3[0], $aRespuestas[2]) && in_array($respuesta3[1], $aRespuestas[2])){
                $acertada = true;
            }
        }
         // Si se ha acertado sumo los aciertos
        if ($acertada){
            $aciertos ++;
        }
    }

    // Compruebo si se ha eniado respuesta
    if (isset($_POST['respuesta3'])){
        // Guardo lo que me ha devuelto el formulario
        $respuesta4 = $_POST['respuesta3'];
        $longitudArray = count($respuesta4);
        // Compruebo que sean correctas las respuestas
        if ($longitudArray == 2){
            if (in_array($respuesta4[0], $aRespuestas[3]) && in_array($respuesta4[1], $aRespuestas[3])){
                $acertada = true;
            }
        }
         // Si se ha acertado sumo los aciertos
        if ($acertada){
            $aciertos ++;
        }
    }

    // Compruebo si se ha eniado respuesta
    if (isset($_POST['respuesta4'])){
        // Guardo lo que me ha devuelto el formulario
        $respuesta4 = $_POST['respuesta4'];
        $longitudArray = count($respuesta4);
        // Compruebo que sean correctas las respuestas
        if ($longitudArray == 1){
            if (in_array($respuesta4[0], $aRespuestas[4])){
                $acertada = true;
            }
        }
         // Si se ha acertado sumo los aciertos
        if ($acertada){
            $aciertos ++;
        }
    }
    // Di no se ha procesado lo creo aleatorio
} else{
    // Selección aleatoria de un examen
    $longitudArray = count($preguntas);
    $examen = rand(0, $longitudArray - 1);  // El índice máximo es longitudArray - 1
}

 

// Con este bucle obtengo el examen que ha salido aleatoriamente
foreach ($preguntas as $clave => $valor){
    if ($clave == $examen){
        $examenSeleccionado = $valor;
        $nombrePregunta = "Examen " . $clave + 1;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Exaamenes</title>
    </head>
    <body>
        <h1><?php echo $nombrePregunta ?></h1>
        <p>*Ten en cuenta que puede haber más de una respuesta correcta</p>
        <!-- Creación del formulario-->
        <form action="" method="POST">
        <!-- Mediante un campo oculto mando el valor del campo -->
            <input type="hidden" name="examen" value="<?php echo $nombrePregunta ?>">
            <?php 
                foreach ($examenSeleccionado as $nombre => $questions){
                    foreach ($questions as $indice => $preguntas2){
                        // Creo el fieldset para ver la separacion de las preguntas
                        echo "<fieldset>";
                        // Muestro el nombre de la pregunta
                        echo "<legend>" . $preguntas2[0] . "</legend>";
                        foreach($preguntas2[1] as $indice2 => $opciones){
                            // Con el comprobador tengo en cuenta si es verdadero o falso y lo pongo como radio button
                            $comprobador = count($preguntas2[1]);
                            if ($comprobador == 2){
                                echo "<input type='radio' name='respuesta" . $indice . "[]' value='$opciones'/>$opciones";
                            } else{
                                echo "<input type='checkbox'name='respuesta" . $indice . "[]' value='$opciones'/> $opciones";
                            }
                        }
                        echo "</fieldset>";
                    }
                }
            ?>
            <button type="submit" name="enviar">Enviar</button>
        </form>
        <?php 
        // Si se ha procesado el formulario muestro los aciertos
        if ($lProcesaFormulario){
            echo "Aciertos: " . $aciertos . "<br/>";
            echo "Porcentaje de aciertos: " . ($aciertos / 5) * 100 . "<br/>";
            // En funcion del porcentaje acertado obtengo un mensaje
            if (($aciertos / 5) * 100 <= 50){
                echo "Tienes que mejorar";
            } else if (($aciertos / 5) * 100 <= 80){
                echo "Aceptable";
            }else{
                echo "Excelente";
            }
            
        }
        ?>
    </body>
</html>
<?php

// Añadimos el array y la funcion
require_once "./config/config.php";
require_once "./lib/functions.php";

// Bandera
$procesaFormulario = false;

// Array que almacena las preguntas acertadas
$preguntasAcertadas = array();

/* Determinamos si se envia */
if (isset($_POST['enviar'])){
    $procesaFormulario = true;
    $indExamen = $_POST['indExamen'];
} else{
    $indExamen = array_rand($aExamenes);
}

// Cargamos el examen
$examen = $aExamenes[$indExamen];
// Contamos el numero de preguntas para el porcentaje
$numeroPreguntas = count($examen['preguntas']);

// Array con los valores iniciales
$vlaExamen = array();

/*Cargamos valores iniciales 
    - Si es cb utilizamos un array
    - Si es texto o radio es una cadena de texto*/

foreach($examen['preguntas'] as $key=>$item){
    $valExamen[$key] = $item['tipo'] == 'cb'?array():'';
}

if ($procesaFormulario){
    //Limpiamos los datos de entrada
    $valExamen = clearData($_POST['preguntas']);
    // Inicializamos la variable que almacenará la nota
    $nota = 0;
    // Bucle para procesar las respuestas a las preguntas del examen
    foreach ($examen['preguntas'] as $key=>$item){
        switch ($item['tipo']){
            case "text":
                $respuestas = explode(";", $item['respuesta']);
                // Convertimos las respuestas a mayusculas
                $respuestas = array_map(function($cadena){return strtoupper(trim($cadena));}, $respuestas);

                if (in_array(strtoupper(trim($valExamen[$key])), $respuestas)) {
                    $nota ++;
                    $preguntasAcertadas[] = $key;
                }
                break;
            case "cb":
                if($item['respuesta'] === ($valExamen[$key] ?? [])) {
                    $nota ++;
                    $preguntasAcertadas[] = $key;
                }
                break;
            
            case "vf":
                if (($valExamen[$key] ?? '') === $item['respuesta']){
                    $nota ++;
                    $preguntasAcertadas[] = $key;
                }
                break;
        }
    }


    $porcentajeAciertos = round($nota/$numeroPreguntas * 100,2);

    switch (true){
        case($porcentajeAciertos >= 80):
            $resultadoCualitativo = "Excelente";
            break;
        case($porcentajeAciertos >= 50):
            $resultadoCualitativo = "Bien";
            break;

        default:
            $resultadoCualitativo = "Tienes que mejorar";
            break;
    }
}

/*HTML */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <h1>Ejercicio</h1>
        <h2><?php echo $examen['titulo'] ?></h2>
        <form action="" method="post">
            <?php
                foreach ($examen['preguntas'] as $key=>$item){
                    $resultadoPregunta='';
                    if ($procesaFormulario){
                        $resultadoPregunta=in_Array($key,$preguntasAcertadas) ? ALEGRE: TRISTE;
                    }
                    echo ($key + 1) . ".-" . $item['pregunta'] . " " . $resultadoPregunta;
                    echo "<br/>";
                    switch ($item['tipo']){
                        case "text":
                            $feedBack = (!$procesaFormulario)?'':$item['respuesta'];
                            echo "<input type='text' name='preguntas[$key]' value='$valExamen[$key]'/><span class='fb'>$feedBack</span>";
                            echo "<br/>";
                            break;
                        case "cb":
                            foreach ($item['opciones'] as $value){
                                $check = (in_array($value, ($valExamen[$key] ?? []))) ? 'checked' : '';
                                $feedBack= ($procesaFormulario && in_Array($value, ($item['respuesta']))) ? '&#10003;':'';
                                echo "<input type='checkbox' name='preguntas[$key][]' value='$value' $check />" . $value . $feedBack;
                                echo "<br/>";
                            }
                            break;
                        case "vf":
                            foreach (['Verdadero', 'Falso'] as $value){
                                $check = ($value === ($valExamen[$key] ?? ''))?'checked':'';
                                $feedBack= ($procesaFormulario && $value === $item['respuesta']) ? '&#10003;':'';
                                echo "<input type='radio' name= 'preguntas[$key]' value='$value' $check />" . $value . " " . $feedBack;
                                echo "<br/>"; 
                            }
                            break;
                    }
                }
            ?>
            <br/>
            <input type="submit" name="enviar" value="Enviar">
            <input type="hidden" name="indExamen" value='<?php echo  $indExamen ?>'/>
        </form>
        <?php
            if($procesaFormulario){
                echo $resultadoCualitativo;
            }
        ?>
    </body>
</html>
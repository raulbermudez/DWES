<?php
/**
* Carga fecha de nacimiento en variables y calcula la edad.
@author = Raúl Bermúdez González
@date = 26/09/2024
*/
$dia = 12;
$mes = 3;
$año = 2010;

$fecha_actual = date('Y-m-d'); // Esto crea una fecha en el formato ('YYYY-mm-dd')
$fecha_nacimiento($año, $mes, $dia); // Asi tambien puedo crear una fecha igual que la anterior con variables

// Paso ambas variables a datetime porque asi puedo usar operadores para compararlas

$fecha_nac = new DateTime($fecha_nacimiento);
$fecha_act = new DateTime($fecha_actual);

// Ahora con os cndicionales y el operador de mayor menor compruebo si la fecha es anterior a hoy o no

if ($fechaNacimientoObj > $fechaActualObj) {
    echo "La fecha de nacimiento no puede ser mayor que la fecha actual.";
} else {
    // Calcular la diferencia entre la fecha actual y la fecha de nacimiento
    $diferencia = $fechaActualObj->diff($fechaNacimientoObj); // el dif es una funcion que calcula la diferencia de dias, años, meses, etc
}

    // Obtener la edad
    $edad = $diferencia->y; // El uso de la y viene del diff y te muestra la diferencia en años

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercio 3 php</title>
    <style>
        .code {
            margin-top: 70px;
        }
    </style>
</head>
<body>
    <div class="code">
        <button type="button"><a href="https://github.com/raulbermudez/-Servidor-Desarrollo-de-Aplicaciones-Web-en-Entorno-Servidor/blob/master/Ejercicios%20php/ud3/condicionales/act_03.php">Ver código</a></button>
    </div>   
</body>
</html>
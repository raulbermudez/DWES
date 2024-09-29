<?php
/** 
*4. Modifica la página inicial realizada, incluyendo una imagen de cabecera en función
*de la estación del año en la que nos encontremos y un color de fondo en función de
*la hora del día. 

@author = Raúl Bermúdez González
@date = 26/09/2024
*/

$color_fondo = '#000000';
$estacion_year = 'spring';
$fecha_hoy = new DateTime();

// Con el format saco la hora y el mes de la fecha inicializada ariba para saber la epoca del año en la que estoy
// Uso el settype para que la variable se conviarta a numero entero y lo pueda usar más facilmente con los ifs
$hora_dia = $fecha_hoy->format('H');
settype($hour, "integer");
$mes = $fecha_hoy->format('m');
settype($mes, "integer");

// Para la imagen de la cabecera
if ($mes >= 12 && $mes <= 2) {
    $estacion_year = "imganes/foto_invierno.jpeg";
}
else if ($mes >= 3 && $mes <= 5) {
    $estacion_year = "imgagenes/imagen_primavera.jpg";
}
else if ($mes >= 6 && $mes <= 8) {
    $estacion_year = "imgagenes/imagen_verano.jpg";
}
else {
    $estacion_year = "imgagenes/imagen_otoño.jpg";
}


// Para el color de fondo

if ($hora_dia >= 0 && $hora_dia <= 8) {
    $color_fondo = '#28103E';
} 
else if ($hora_dia >= 9 && $hora_dia <= 18){
    $color_fondo = '#52A6D0';
}
else {
    $color_fondo = 'coral';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercio 4 php</title>
    <style>
        body {background-color: <?php echo $color_fondo ?>;}

        img {
            width: 35px; 
            height: 25px;
        }

        .code {
            margin-top: 70px;
        }
    </style>
</head>
<body>
    <header>
        <img width="100%" height="720" src=<?php echo $estacion_year ?>>
    </header>
    <div class="code">
        <button type="button"><a href="https://github.com/raulbermudez/-Servidor-Desarrollo-de-Aplicaciones-Web-en-Entorno-Servidor/blob/master/Ejercicios%20php/ud3/condicionales/act_04.php">Ver código</a></button>
    </div>   
</body>
</html>


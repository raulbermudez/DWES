<?php
/**
 
*Página que devuelve un mensaje que indica el tiempo transcurrido desde la última sesión, usando una cookie.
*@author Raul Bermudez Gonzalez
*@date 11/11/2024*/

// Si ya existe la galleta recogemos el tiempo de la última visita.
if (isset($_COOKIE["tiempo"])){
    $tiempo = $_COOKIE["tiempo"];
    $tiempo_transcurrido = strVal(time() - $tiempo);
    setcookie("tiempo", time(), time()+120);
} else {
    setcookie("tiempo", time(), time()+120);
    $tiempo_transcurrido = strVal(0);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tiempo desde la última visita con cookies</h1>
    <p><?php echo "$tiempo_transcurrido segundos desde tu ultima visita."?></p>
    <div class="ver_codigo">
        <button type="button"><a href="https://github.com/raulbermudez/DWES/tree/master/EjerciciosPHP/ud4/cookies/act05.php">Ver código</a></button>
    </div> 
</body>
</html>

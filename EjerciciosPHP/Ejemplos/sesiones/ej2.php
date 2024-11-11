<?php
/**
 * @author = Raul Bermudez Gonzalez
 * @date = 22-10-2024
 */

session_start();
if (!isset($_SESSION['inicioTime'])){
    /*Si no existe se crea o si lo prefiere destruya la sesión*/
    $_SESSION['inicioTime'] = time();
    $_SESSION['contador'] = 0;
    $_SESSION['intervalo'] = 1;
}

// Incremento el contador
$_SESSION['contador'] += 1;

$tiempo_transcurrido = time();
/*se multiplica por 60 segundos ya que se configura en minutos*/
$tiempo_maximo = $_SESSION['inicioTime'] + ($_SESSION['intervalo'] * 60 ) ;

if($tiempo_transcurrido > $tiempo_maximo){
    header('location: salir.php');
}
else {
/*se resetea el inicio*/
    $_SESSION['inicioTime'] = time();
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
    <p>Contador: <?php echo $_SESSION['contador'] ?></p>
    <a href="">Enlace</a>
</body>
</html>
<?php
/**
 * @author raul <email>
*/
session_start();
include ("config/config.php");
// Inicializo la varoiable total 
$total = 0;
$perdidoUS = false;
$riegoMaquina = 0;
$indice = 0;
$reinicio = "";
$musica = "Deshabilitar música";

if(!isset($_SESSION['cartasMaquina'])){
    // Saco cuatro numeros aleatorios para introducir las cartas
    $numaleatorio = rand(0, 51);
    $_SESSION['cartasMaquina'][0] = $aCartas[$numaleatorio];
    $numaleatorio2 = rand(0, 51);
    $_SESSION['cartasMaquina'][1] = $aCartas[$numaleatorio2];
    $numaleatorio3 = rand(0, 51);
    $_SESSION['cartasUsuario'][0] = $aCartas[$numaleatorio3];
    $numaleatorio4 = rand(0, 51);
    $_SESSION['cartasUsuario'][1] = $aCartas[$numaleatorio4];
    $_SESSION['indiceUsuario'] = 2;
    $_SESSION['indiceMaquina'] = 2;
    $_SESSION["puntosJugador"] = 0;
    $_SESSION["puntosMaquina"] = 0;
    // Compruebo la puntuacion de la maquina
    foreach ($_SESSION['cartasMaquina'] as $clave => $valor){
        $total += $valor['puntuacion'];
    }
    $_SESSION['puntosMaquina'] = $total;
}

// i ha poulsado el formulario de puntos
if (isset($_POST['puntos'])){
    $_SESSION['cartasUsuario'][$indice]["puntuacion"] = $_POST['puntos'];
}

// Compruebo que el usuario quiere mas cartas
if(isset($_POST['carta'])){
    $numaleatorio = rand(0, 51);
    $_SESSION['cartasUsuario'][$_SESSION['indiceUsuario']] = $aCartas[$numaleatorio];
    $_SESSION['indiceUsuario'] +=1;
}

// Compruebo si el usuario se ha plantado
if(isset($_POST['plantarse'])){
    $total = 0;
    foreach ($_SESSION['cartasUsuario'] as $clave => $valor){
        if (is_array($valor['puntuacion'])){
            // Selecciona aleatoriamente el valor de as para la maquina
            $numero = rand(0,1);
            $_SESSION["cartasMaquina"][$indice]['puntuacion'] = $valor["puntuacion"][$numero];
            $total += $valor['puntuacion'][$numero];
        } else{
            $total += $valor['puntuacion'];
        }
    }
    // Guardo los puntos en una variable de sesion
    $_SESSION["puntosJugador"] = $total;
    $riesgoMaquina = rand(17, 21);

    $total = 0;
    while ($_SESSION["puntosMaquina"] < $riesgoMaquina){
        // Me añade una carta a la maquina
        $numaleatorio = rand(0, 51);
        $_SESSION['cartasMaquina'][$_SESSION['indiceMaquina']] = $aCartas[$numaleatorio];
        $_SESSION['indiceMaquina'] +=1;
        foreach ($_SESSION['cartasMaquina'] as $clave => $valor){
            if (is_array($valor['puntuacion'])){
                // Selecciona aleatoriamente el valor de as para la maquina
                $numero = rand(0,1);
                $_SESSION["cartasMaquina"][$indice]['puntuacion'] = $valor["puntuacion"][$numero];
                $total += $valor['puntuacion'][$numero];
            }else{
                $total += $valor['puntuacion'];
            }
            // Guardo la puntuacion en una variable de sesion
        $_SESSION['puntosMaquina'] = $total;
    }};

    // Si el jugador se pasa de 21 ha perdido
    if ($_SESSION["puntosJugador"] > 21){
        $perdidoUS = "derrota";
        // Si la maquina se pasa de 21 ha perdido
    }else if($_SESSION["puntosMaquina"] > 21){
        $perdidoUS = "victoria";
        // Si el jugador tiene menos puntos que la maquina ha perdido el jugador
    } else if(($_SESSION["puntosJugador"] < $_SESSION["puntosMaquina"])){
        $perdidoUS = "derrota";
        // Si el jugador tiene mas puntos que la maquina ha ganado 
    } else if(($_SESSION['puntosJugador']) == ($_SESSION['puntosMaquina'])){
        $perdidoUS = "empate";
    } else{
        $perdidoUS = "victoria";
    }
    $_SESSION['finalizado'] = $perdidoUS;
    // Muestro el ganador
    if ($_SESSION['finalizado'] == "derrota"){
        echo "<h3>El jugador ha perdido</h3>";
        echo "Puntuacion de la maquina: " . $_SESSION['puntosMaquina'] . "<br/>";
        echo "Puntuacion del jugador: " . $_SESSION['puntosJugador'];
    }else if($_SESSION['finalizado'] == "empate"){
        echo "<h3>El jugador y la banca han empatado</h3>";
        echo "Puntuacion de la maquina: " . $_SESSION['puntosMaquina'] . "<br/>";
        echo "Puntuacion del jugador: " . $_SESSION['puntosJugador'];
    } else{
        echo "<h3>El jugador ha ganado</h3>";
        echo "Puntuacion de la maquina: " . $_SESSION['puntosMaquina'];
        echo "Puntuacion del jugador: " . $_SESSION['puntosJugador'] . "<br/>";
    }
    $reinicio = "<a href='cerrarSesion.php'>Reiniciar Partida</a>";
}
// Si no existe la cookie la cre0
if (!isset($_COOKIE['cMusica'])){
    setcookie("cMusica", "Deshabilitar música", time()+3660);
}

// Si ha pulsado la musica
if (isset($_POST['musica'])){
    if ($_POST['musica'] == "Deshabilitar música"){
        setcookie("cMusica", "Habilitar Musica", time()+3660);
    } else{
        setcookie("cMusica", "Deshabilitar música", time()+3660);
    }
}
// Guardo los arrays de las cartas en dos variables
$maquina = $_SESSION['cartasMaquina'];
$usuario = $_SESSION['cartasUsuario'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blackjack</title>
    </head>
    <body>
       <h1>Bienvenido al blackjack</h1>
       <?php
            echo $reinicio;
       ?>
       <!-- <audio src=""> -->

       <form action="" method="post">
            <label>¿Quieres tener música mientras juegas?</label>
            <input type="submit" name="musica" value="<?php echo $_COOKIE["cMusica"] ?>">
       </form>
       
       <h3>Cartas de la banca</h3>
        <?php
            foreach($maquina as $clave => $valor){
                echo "<img src='" . $valor["imagen"] . "' alt='carta' width='100px'>";            
            }
        ?>

       <h3>Cartas del usuario</h3>
       <?php
            foreach($usuario as $clave => $valor){
                echo "<img src='" . $valor["imagen"] . "' alt='carta' width='100px'>";
                if (is_array($valor['puntuacion'])){
                    echo "<form method='post' action=''>
                    <label>Valor del AS</label>
                    <input type='submit' name='puntos' value='1'>
                    <input type='submit' name='puntos' value='11'>
                    </form>";
                }
                $indice ++;
            }
        ?>
       <form action="" method="post">
            <button type="submit" name="carta">Mas cartas</button>
            <button type="submit" name="plantarse">Plantarse</button>
       </form>
    </body>
</html>
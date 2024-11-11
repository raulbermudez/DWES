<?php
// Inicialización de variables
$huecos = 0;
$posicionesHuecos = [];

// Verificar si se ha enviado el formulario para generar la tabla de multiplicaciones
if (isset($_POST['enviar_numeros'])) {
    // Obtener el número de huecos del formulario
    $huecos = $_POST['huecos'];

    // Generar posiciones aleatorias para los huecos
    $totalMultiplicaciones = 100; // 10x10 tabla
    $posicionesHuecos = array_rand(range(0, $totalMultiplicaciones - 1), $huecos);

    // Convertir a array si solo se seleccionó un hueco
    if (!is_array($posicionesHuecos)) {
        $posicionesHuecos = [$posicionesHuecos];
    }

    // Verificar respuestas si el usuario ya ha ingresado datos
    if (isset($_POST['respuesta'])) {
        $respuestas = $_POST['respuesta'];
        $aciertos = 0;
        $errores = 0;
        $resultados = [];

        // Comprobamos cada respuesta ingresada por el usuario
        foreach ($respuestas as $i => $fila) {
            foreach ($fila as $j => $respuestaUsuario) {
                $resultadoCorrecto = $i * $j;
                if ($respuestaUsuario == $resultadoCorrecto) {
                    $resultados[] = "<tr><td>$i x $j = $resultadoCorrecto (Correcto)</td></tr>";
                    $aciertos++;
                } else {
                    $resultados[] = "<tr><td>$i x $j = $resultadoCorrecto (Tu respuesta: $respuestaUsuario, Incorrecto)</td></tr>";
                    $errores++;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplicaciones Aleatorias</title>
</head>
<body>

<h1>¿Cuántos huecos quieres?</h1>

<?php if (isset($_POST['enviar_numeros'])): ?>
    <form action="" method="POST">
        <table border="1" cellpadding="5" cellspacing="0">
            <?php
            // Generamos la tabla con multiplicaciones y los huecos aleatorios
            $count = 0; // Contador para las posiciones
            for ($i = 1; $i <= 10; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= 10; $j++) {
                    $resultado = $i * $j;

                    // Si la posición está entre las seleccionadas, generamos un input
                    if (in_array($count, $posicionesHuecos)) {
                        echo "<td>$i x $j = <input type='text' name='respuesta[$i][$j]'></td>";
                    } else {
                        echo "<td>$i x $j = ?</td>"; // Para el resto, dejamos el signo de interrogación
                    }
                    $count++;
                }
                echo "</tr>";
            }
            ?>
        </table>
        <input type="hidden" name="huecos" value="<?php echo $huecos; ?>">
        <input type="submit" name="enviar_numeros" value="Comprobar">
    </form>

    <?php if (isset($resultados)): ?>
        <h2>Resultados</h2>
        <table border="1" cellpadding="5" cellspacing="0">
            <?php echo implode("", $resultados); ?>
        </table>
        <p><strong>Aciertos:</strong> <?php echo $aciertos; ?></p>
        <p><strong>Errores:</strong> <?php echo $errores; ?></p>
    <?php endif; ?>

<?php else: ?>
    <!-- Formulario inicial para pedir el número de huecos -->
    <form method="POST">
        <label>Indica cuántos huecos quieres: </label>
        <input type="number" name="huecos" min="1" max="100" required>
        <input type="submit" name="enviar_numeros" value="Generar">
    </form>
<?php endif; ?>

</body>
</html>

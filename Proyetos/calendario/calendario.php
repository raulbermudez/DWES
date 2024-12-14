<?php 
$fondo = "no";
$numeroX = 0;

$dia_actual = date("j"); 
$mes_actual = isset($_POST['mes']) ? (int)$_POST['mes'] : date("n"); 
$year_Actual = isset($_POST['year']) ? (int)$_POST['year'] : date("Y"); 

// Validar mes y año
if ($mes_actual < 1 || $mes_actual > 12) {
    $mes_actual = date("n");
}
if ($year_Actual < 1970 || $year_Actual > 2100) {
    $year_Actual = date("Y");
}

$dias_en_mes = cal_days_in_month(CAL_GREGORIAN, $mes_actual, $year_Actual);

// Primer día del mes
$dia_inicio = date("w", mktime(0, 0, 0, $mes_actual, 1, $year_Actual));

$numeroX = ($dia_inicio == 0) ? 6 : $dia_inicio - 1; 

$diasFestivos = array(
    array(1, 1, "nacional"),
    array(6, 1, "nacional"),
    array(28, 2, "comunidad"),
    array(1, 5, "nacional"),
    array(15, 8, "nacional"),
    array(8, 9, "local"),
    array(12, 10, "nacional"),
    array(24, 10, "local"),
    array(1, 11, "nacional"),
    array(6, 12, "nacional"),
    array(8, 12, "nacional"),
    array(25, 12, "nacional")
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Calendario PHP</title>
    <style>
        .comunidad {
            background-color: #FF9999;
            color: white;
        }

        .nacional {
            background-color: #FF6666;
            color: white;
        }

        .local {
            background-color: #FFCCCC;
            color: white;
        }
        .actual {
            background-color: green;
            color: white;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            width: 14.28%; /* 100% / 7 días */
            height: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Calendario de <?php echo $mes_actual ?> de <?php echo $year_Actual ?></h1>
    <form method="post" action="">
        <label for="mes">Mes:</label>
        <input type="number" id="mes" name="mes" min="1" max="12" value="<?php echo $mes_actual; ?>">
        <label for="year">Año:</label>
        <input type="number" id="year" name="year" min="1970" max="2100" value="<?php echo $year_Actual; ?>">
        <input type="submit" value="Mostrar Calendario">
    </form>
    <table border="1">
        <tr>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
            <th>Domingo</th>
        </tr>
        <?php
        echo "<tr>";
        // Imprimir celdas vacías hasta el primer día del mes
        for ($i = 0; $i < $numeroX; $i++) {
            echo "<td></td>";
        }

        // Imprimir los días del mes
        for ($r = 1; $r <= $dias_en_mes; $r++) {
            $isFestivo = false;

            // Comprobar si el día es festivo
            foreach ($diasFestivos as $festivo) {
                if ($festivo[0] == $r && $festivo[1] == $mes_actual) {
                    echo "<td class='$festivo[2]'>$r</td>";
                    $isFestivo = true;
                    break; // Salir del bucle si es festivo
                }
            }

            // Verificar si es domingo
            if (date("w", mktime(0, 0, 0, $mes_actual, $r, $year_Actual)) == 0) { // 0 = Domingo
                echo "<td class='nacional'>$r</td>";
                $isFestivo = true; // Marcar como festivo
            }

            // Día actual
            if (!$isFestivo && $r == $dia_actual && $mes_actual == date("n") && $year_Actual == date("Y")) {
                echo "<td class='actual'>$r</td>";
            }
            // Días normales
            elseif (!$isFestivo) {
                echo "<td>$r</td>";
            }

            // Cambiar fila después de cada domingo
            if (($r + $numeroX) % 7 == 0) {
                echo "</tr><tr>";
            }
        }
        echo "</tr>";
        ?>
    </table>
</body>
</html>
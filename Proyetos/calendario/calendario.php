<?php
$mes = 7;  // Mes actual (julio)
$year = 2024;  // Año actual
$fondo = "no";
$numeroX = 0;

$dia_actual = date("j"); // Día actual (numérico)
$mes_actual = date("n"); // Mes actual (numérico)
$year_Actual = date("Y"); // Año actual

$dias_en_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $year); // Número de días del mes

// Primer día del mes
$dia_inicio = date("w", mktime(0, 0, 0, $mes, 1, $year)); // Día de la semana del 1 del mes (0=domingo, 6=sábado)

// Ajustar el día de inicio de acuerdo al formato (lunes=0, domingo=6)
$numeroX = ($dia_inicio == 0) ? 6 : $dia_inicio - 1; // Convertir domingo (0) a 6 para la lógica de celdas

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Calendario PHP</title>
    <style>
        .festivo {
            background-color: red;
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
    <h1>Calendario de <?php echo $mes ?> de <?php echo $year ?></h1>
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
            // Festivos manualmente añadidos
            if (($r == 1 && $mes == 1) || 
                ($r == 6 && $mes == 1) || 
                ($r == 15 && $mes == 8) || 
                ($r == 12 && $mes == 10) || 
                ($r == 1 && $mes == 11) || 
                ($r == 25 && $mes == 12) ||
                (date("w", mktime(0, 0, 0, $mes, $r, $year)) == 0) // Domingo como festivo
            ) {
                echo "<td class='festivo'>$r</td>";
            }
            // Día actual
            elseif ($r == $dia_actual && $mes == $mes_actual && $year == $year_Actual) {
                echo "<td class='actual'>$r</td>";
            }
            // Días normales
            else {
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

<?php
/**
 *Dado el mes y año almacenados en variables, escribir un programa que muestre el
 *calendario mensual correspondiente. Marcar el día actual en verde y los festivos
 *en rojo.
 @author Raul Bermudez Gonzalez
 @date = 30/09/2024
*/

$mes = 7;
$year = 2024;
$fondo = "no";
$numeroX = 0;
$dia_actual = date("d"); // Me da el dia en formato númerico, NO el dia de la semana
$mes_actual = date("m");
$year_Actual = date("Y");

$dia = $dias_en_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $year); // Para saber el numero de dias del mes

$dia_inicio = date("l", mktime(0, 0, 0, $mes, 1, $year)); // Para saber el dia de la semana ques 1

switch ($dia_inicio){
    case "Monday":
        $numeroX = 0;
        break;
    case "Tuesday":
        $numeroX = 1;
        break;
    case "Wednesday":
        $numeroX = 2;
        break;
    case "Thursday":
        $numeroX = 3;
        break;
    case "Friday":
        $numeroX = 4;
        break;
    case "Sunday":
        $numeroX = 5;
        break;
    case "Saturday":
        $numeroX = 6;
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercio 4 - Bucles php</title>
    <style>
        .code {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <h1>Calendario de <?php echo $mes ?> de <?php echo $year ?></h1>
    <table border="1">
        <tr>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
            <th>Domingo</th>
        </tr>
        <?php
        echo "<tr>";
        for ($i = 0; $i <= $numeroX; $i++) {
            echo "<td>X</td>";
        }

        for ($i = 1; $i <= $dia; $i++){

            if (($i = 1) && ($month = 1)){
                $fondo = "festivo"; 
                echo "<td class= festivo>$i</td>";
            }
            elseif((($i = 6) && ($month = 1))){
                $fondo = "festivo"; 
                echo "<td class= festivo>$i</td>";
            }
            elseif (($i = 28) && ($mes = 2)){
                $fondo = "festivo"; 
                echo "<td class= festivo>$i</td>";
            }
            elseif (($i = 1) && ($mes = 5)){
                $fondo = "festivo"; 
                echo "<td class= festivo>$i</td>";
            }
            elseif (($i = 15) && ($mes = 8)){
                $fondo = "festivo"; 
                echo "<td class= festivo>$i</td>";
            }
            elseif (($i = 12) && ($mes = 10)){
                $fondo = "festivo"; 
                echo "<td class= festivo>$i</td>";
            }
            elseif (($i = 1) && ($mes = 11)){
                $fondo = "festivo"; 
                echo "<td class= festivo>$i</td>";
            }
            elseif (($i = 6) && ($mes = 12)){
                $fondo = "festivo"; 
                echo "<td class= festivo>$i</td>";
            }
            elseif (($i = 9) && ($mes = 12)){
                $fondo = "festivo"; 
                echo "<td class= festivo>$i</td>";
            }
            elseif (($i = 25) && ($mes = 12)){
                $fondo = "festivo"; 
                echo "<td class= festivo>$i</td>";
            }
            elseif (($i + $dia_inicio) % 7 == 0) { // Controlo los domingos
                $fondo = "festivo"; 
                echo "<td class= festivo>$i</td>";
            }
            elseif (($dia = $dia_actual) && ($mes = $mes_actual) && ($year = $year_Actual)){
                $fondo = "actual"; 
                echo "<td class= actual>$i</td>";
            }
            else{
                $fondo = "no";
                echo "<td>$i</td>";
            }

            if (($i + $dia_inicio) % 7 == 0) {
                echo "</tr><tr>";
            }
        }
        echo "</tr>";
        ?>
    </table>
    <div class="code">
        <button type="button"><a href="https://github.com/raulbermudez/DWES/blob/master/Proyectos/calendario/act_05.php">Ver código</a></button>
    </div>   
</body>
</html>
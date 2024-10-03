<?php
    /**
    * 3. Tablas de multiplicar del 1 al 10. Aplicar estilos en filas/columnas.
    @autor = Raúl Bermúdez González
    @date = 29/09/2024
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercio 3 - Bucles php</title>
    <style>
        .code {
            margin-top: 70px;
        }
    </style>
</head>
<body>
    <h1>Tablas de multiplicar 1 al 10</h1>
    <div>
    <table border="1">
        <thead>
            <tr>
                <?php 
                // Creo la cabecera de mi tabla
                echo "<th>X</th>";
                for ($i = 1; $i <= 10; $i++) {
                    echo "<th>$i</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Añado cada fila de cada numero
                for ($i = 1; $i <= 10; $i++) {

                    echo "<tr>";
                    echo "<td>$i</td>";
                    for ($j = 1; $j <= 10; $j++) {
                        $multiplicacion = $i*$j;
                        echo "<td>$multiplicacion</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    </div>
    <div class="code">
        <button type="button"><a href="https://github.com/raulbermudez/DWES/blob/master/Ejercicios%20php/ud3/bucles/act_03.php">Ver código</a></button>
    </div>   
</body>
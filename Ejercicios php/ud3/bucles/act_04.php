<?php
    /**
    * 4. Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor
    * hexadecimal que le corresponde.
    @autor = Raúl Bermúdez González
    @date 
    */

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
<table border="1">
    <?php
    $INC = 32;
    for ($rojo = 0; $rojo <= 255; $rojo += $INC) { 
        echo "<td>";
        for ($verde = 0; $verde <= 255; $verde += $INC) { 
            for ($azul = 0; $azul <= 255; $azul += $INC) {

                // Usao sprintf para darle el formato que quiero al color
                // % Indica la separacion de cada variable
                // El 0 le dice que rellene el numero con 0s a la izquierda
                // El 2 es la cantidad de numeros que quiero que saque
                // La X sirve para que me pase el numero a hexadecimal

                $color = sprintf("#%02X%02X%02X", $rojo, $verde, $azul);
                echo "<tr><div style='background-color: $color;'><a href=color.html>$color</a></div></tr>";
            }
        }
        echo "</td>";
    }
    ?>
    </table>
    <div class="code">
        <button type="button"><a href="https://github.com/raulbermudez/-Servidor-Desarrollo-de-Aplicaciones-Web-en-Entorno-Servidor/blob/master/Ejercicios%20php/ud3/bucles/act_04.php">Ver código</a></button>
    </div>   
</body>
</html>
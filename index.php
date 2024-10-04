<?php
    $variable = include './config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de los ejercicios</title>
</head>
<body>
    <h1>Raúl Bermúdez González - DWES</h1>
    <?php
    foreach ($variable as $carpeta => $informacion){
        echo "<h3>" . $carpeta . "</h3><br/>";
        foreach ($informacion as $subcarpeta => $ejercicios){
            echo "<h4>" . $subcarpeta . "</h4><br/>";
            foreach ($ejercicios as $nombre => $info){
                $ruta = $info[0];
                $descripcion = $info[1];
                echo "<li><a href= '$ruta'> $nombre -  $descripcion </a></li><br>";
            }
        }
    }; 
    ?>
   </body>
</html>
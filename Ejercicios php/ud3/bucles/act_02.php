<?php
    /**
    * 2. Sumar los tres primeros números pares.
    @autor = Raúl Bermúdez González
    @date = 29-09-2024
    */

    $numero_par = 3;
    $contador = 0;
    $suma = 0;        
    $primer_par = 2; 

    while ($contador < $numero_par) {  
        $suma += $primer_par;
        $primer_par+=2;
        $contador++; // Los dos signos de sumar es para autoincrementar mi contador
    }

    echo "La suma de los primeros $numero_par números pares es $suma";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercio 2 - Bucles php</title>
    <style>
        .code {
            margin-top: 70px;
        }
    </style>
</head>
<body>
    <div class="code">
        <button type="button"><a href="https://github.com/raulbermudez/-Servidor-Desarrollo-de-Aplicaciones-Web-en-Entorno-Servidor/blob/master/Ejercicios%20php/ud3/bucles/act_02.php">Ver código</a></button>
    </div>   
</body>
</html>
<?php
/**
 * Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de
 * ellos. El resultado debe mostrar nombre y fotografía.
    * @author = Raúl Bermúdez González
    * @date = 29-09-2024
*/
$alumnos = array(
    'Raúl Bermúdez González', 'Carlos Borreguero Redondo', 
    'Álvaro Cañas González', 'Miguel Carmona Cicchetti', 
    'Alejandro Carrasco Castellano', 'Mostafa Cherif Mouaki Almabouada', 
    'Alejandro Coronado Ortega', 'Juan Diego Delgado Morente', 
    'Marlon Jafet Escoto García', 'Ángel Fernández Ariza', 
    'Alejandro Fernández Arrayás', 'Daniel Fernández Balsera', 
    'Jesús Ferrer López', 'Jesús Frías Rojas', 
    'Manuel Galán Navas', 'Víctor García Báez', 
    'Lucía García Díaz', 'Adrián González Martínez', 
    'Jesús López Funes', 'Enrique Mariño Jiménez',
    'Oscar Martín-Castaño Carrillo', 'José María Mayén Pérez',
    'Pablo Mérida Velasco', 'Héctor Mora Sánchez',
    'Luis Pérez Cantarero', 'Carlos Romero Romero',
    'Javier Ruiz Molero', 'Alejandro Vaquero Abad',
    'Luis Miguel Villén Moyano'
);

$longitudArray = count($alumnos);
$random = rand(0, $longitudArray);

echo "El alumno elegido es: " + $alumnos[$random];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercio 3 php</title>
    <style>
        .code {
            margin-top: 70px;
        }
    </style>
</head>
<body>
    <div class="code">
        <button type="button"><a href="https://github.com/raulbermudez/DWES/blob/master/Ejercicios%20php/ud3/arrays/act03.php">Ver código</a></button>
    </div>   
</body>
</html>
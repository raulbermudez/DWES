<?php
/**
 * Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de
 * ellos. El resultado debe mostrar nombre y fotografía.
 * @author Raúl Bermúdez González
 * @date 29-09-2024
*/

// Array de alumnos con nombre y ruta de la fotografía
$alumnos = array(
    array('nombre' => 'Raúl Bermúdez González', 'foto' => 'fotos/raul.jpg'),
    array('nombre' => 'Carlos Borreguero Redondo', 'foto' => 'fotos/carlos.jpg'),
    array('nombre' => 'Álvaro Cañas González', 'foto' => 'fotos/alvaro.jpg'),
    array('nombre' => 'Miguel Carmona Cicchetti', 'foto' => 'fotos/miguel.jpg'),
    array('nombre' => 'Alejandro Carrasco Castellano', 'foto' => 'fotos/alejandro.jpg'),
    // Aquí añadirías el resto de los alumnos con sus respectivas fotos
);

// Selección aleatoria de un alumno
$longitudArray = count($alumnos);
$random = rand(0, $longitudArray - 1);  // El índice máximo es longitudArray - 1

$alumnoElegido = $alumnos[$random];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 PHP</title>
    <style>
        .code {
            margin-top: 70px;
        }
        .alumno {
            text-align: center;
        }
        .alumno img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="alumno">
        <h2>El alumno elegido es: <?php echo $alumnoElegido['nombre']; ?></h2>
        <img src="<?php echo $alumnoElegido['foto']; ?>" alt="Foto de <?php echo $alumnoElegido['nombre']; ?>">
    </div>

    <div class="code">
        <button type="button">
            <a href="https://github.com/raulbermudez/DWES/blob/master/Ejercicios%20php/ud3/arrays/act03.php">Ver código</a>
        </button>
    </div>   
</body>
</html>

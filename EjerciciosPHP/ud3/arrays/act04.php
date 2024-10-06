<?php
/**
 * Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres.
 * Almacenar información incluyendo foto y mostrar los menús disponibles. Mostrar el
 * precio del menú suponiendo que éste se calcula sumando el precio de cada uno de
 * los platos incluidos y con un descuento del 20 %.
 * @author Raúl Bermúdez González
 * @date 29-09-2024
 */

// Menús con nombre del plato, foto y precio
$primeros = array(  "Macarrones" => array("fotos/Macarrones.jpg", 10), 
                    "Sopa de pescado" => array("fotos/sopa.jpg", 8), 
                    "Revuelto de patatas" => array("fotos/revuelto.jpg", 12)
                );

$segundos = array(  "Churrasco con salsa roquefort" => array("fotos/churrasco.jpeg", 10), 
                    "Merluza" => array("fotos/merluza.jpg", 8), 
                    "Puntas de solomillo con salsa verde" => array("fotos/solomillo.jpg", 12),
                    "Pez espada" => array("fotos/pez_espada.jpg", 10), 
                    "Pinchitos (6 unidades)" => array("fotos/pinchitos.jpeg", 8)
                );

$postre = array(    "Tarta de queso" => array("fotos/tarta_queso.jpg", 3), 
                    "Brownie de chocolate" => array("fotos/brownie_chocolate.jpg", 5), 
                    "Tarta de la abuela" => array("fotos/tarta_abuela.jpg", 4)
    );

// Inicializamos el precio final y el descuento
$precio_final = 0;
const DESCUENTO = 0.2;
$contador = 1;

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
        
        .menu-container {
        display: flex; /* Usamos flexbox para alinear los menús horizontalmente */
        flex-wrap: wrap; /* Permite que los menús se ajusten en múltiples filas */
        justify-content: flex-start; /* Alinea los menús al principio (izquierda) */
        margin: 10px; /* Espaciado entre los menús */
        }
        .menu {
            border: 1px solid #ccc; /* Bordes para cada menú */
            border-radius: 8px; /* Bordes redondeados */
            margin: 10px; /* Espaciado entre menús */
            padding: 10px; /* Espaciado interno */
            width: 250px; /* Ancho fijo para cada menú */
            text-align: center; /* Centra el texto */
        }
        .menu-images {
            display: flex; /* Alineamos las imágenes de los platos en horizontal */
            justify-content: space-around; /* Distribuye el espacio entre las imágenes */
            flex-wrap: wrap; /* Permite que las imágenes se ajusten si son muchas */
        }
        .menu img {
            height: 100px; /* Altura de la imagen */
            width: 100px; /* Ancho de la imagen */
            margin: 5px; /* Espaciado entre imágenes */
        }
    </style>
</head>
<body>
    <?php
    echo "<h2>Menús disponible</h2>";

    echo "<div class='menu-container'>";

    $contador = 1; // Asegúrate de inicializar el contador
    foreach ($primeros as $nombreP => $infoP) {
        foreach ($segundos as $nombreS => $infoS) {
            foreach ($postre as $nombrePo => $infoPo) {
                // Comienza un contenedor para el menú
                echo "<div class='menu'>";
                echo "<h3>$contador º Menú</h3>";

                // Contenedor para las imágenes de los platos
                echo "<div class='menu-images'>";
                echo "<div>";
                echo "<h4>$nombreP</h4>";
                echo "<img src='{$infoP[0]}' alt='$nombreP'></img> <br>";
                echo "Precio: {$infoP[1]} € <br>";
                echo "</div>";

                echo "<div>";
                echo "<h4>$nombreS</h4>";
                echo "<img src='{$infoS[0]}' alt='$nombreS'></img> <br>";
                echo "Precio: {$infoS[1]} € <br>";
                echo "</div>";

                echo "<div>";
                echo "<h4>$nombrePo</h4>";
                echo "<img src='{$infoPo[0]}' alt='$nombrePo'></img> <br>";
                echo "Precio: {$infoPo[1]} € <br>";
                echo "</div>";
                echo "</div>"; // Cierra el contenedor de las imágenes

                $contador++;
                $precio_final = $infoP[1] + $infoS[1] + $infoPo[1];
                $precio_con_descuento = $precio_final * (1 - DESCUENTO);
                echo "<h3>Precio total sin descuento: $precio_final €</h3>";
                echo "<h3>Precio total con descuento del 20%: $precio_con_descuento €</h3>";
                echo "</div>"; // Cierra el contenedor del menú
            }
        }
    }

    echo "</div>"; // Cierra el contenedor de todos los menús
?>
    <div class="code">
        <button type="button">
            <a href="https://github.com/raulbermudez/DWES/blob/master/EjerciciosPHP/ud3/arrays/act04.php">Ver código</a>
        </button>
    </div>   
</body>
</html>
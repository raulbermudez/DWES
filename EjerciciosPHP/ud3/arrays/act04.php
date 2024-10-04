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
$menus = array(
    "primero" => array(
        "Macarrones" => array("foto" => "fotos/macarrones.jpg", "precio" => 10), 
        "Sopa de pescado" => array("foto" => "fotos/sopa.jpg", "precio" => 8), 
        "Revuelto de patatas" => array("foto" => "fotos/revuelto.jpg", "precio" => 12)
    ),
    "segundo" => array(
        "Churrasco con salsa roquefort" => array("foto" => "fotos/churrasco.jpg", "precio" => 10), 
        "Merluza" => array("foto" => "fotos/merluza.jpg", "precio" => 8), 
        "Puntas de solomillo con salsa verde" => array("foto" => "fotos/solomillo.jpg", "precio" => 12),
        "Pez espada" => array("foto" => "fotos/pez-espada.jpg", "precio" => 10), 
        "Pinchitos (6 unidades)" => array("foto" => "fotos/pinchitos.jpg", "precio" => 8)
    ),
    "postre" => array(
        "Tarta de queso" => array("foto" => "fotos/tarta-queso.jpg", "precio" => 3), 
        "Brownie de chocolate" => array("foto" => "fotos/brownie.jpg", "precio" => 5), 
        "Helado con sabor a elegir" => array("foto" => "fotos/helado.jpg", "precio" => 4)
    )
);

// Inicializamos el precio final y el descuento
$precio_final = 0;
const DESCUENTO = 0.2;

echo "<h2>Menú disponible</h2>";

foreach ($menus as $tipo => $platos) {
    echo "<h3>" . ucfirst($tipo) . "s:</h3>";  // Mostrar tipo de plato
    foreach ($platos as $nombre_plato => $detalles) {
        echo "<div>";
        echo "<strong>$nombre_plato</strong><br/>";
        echo "<img src='{$detalles['foto']}' alt='$nombre_plato' style='width:150px; height:150px;'/><br/>";
        echo "Precio: " . $detalles['precio'] . " €<br/>";
        echo "</div><br/>";
        
        // Sumar el precio de cada plato al precio final
        $precio_final += $detalles['precio'];
    }
}

// Aplicar el descuento
$precio_con_descuento = $precio_final * (1 - DESCUENTO);

// Mostrar el precio final con descuento
echo "<h3>Precio total sin descuento: $precio_final €</h3>";
echo "<h3>Precio total con descuento del 20%: $precio_con_descuento €</h3>";
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
    </style>
</head>
<body>
    <div class="code">
        <button type="button">
            <a href="https://github.com/raulbermudez/DWES/blob/master/EjerciciosPHP/ud3/arrays/act04.php">Ver código</a>
        </button>
    </div>   
</body>
</html>
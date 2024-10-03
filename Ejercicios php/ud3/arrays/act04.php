<?php
    /**
    * Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres.
    * Almacenar información incluyendo foto y mostrar los menús disponibles. Mostrar el
    * precio del menú suponiendo que éste se calcula sumando el precio de cada uno de
    * los platos incluidos y con un descuento del 20 %.
    * @author = Raúl Bermúdez González
    * @date = 29-09-2024
*/

$menus = array(
    "primero" => array( "Macarrones" => array(foto => "foto", precio => 10), 
                        "Sopa de pescado" => array(foto => "foto", precio => 8), 
                        "Revuelto de patatas" => array(foto => "foto", precio => 12)),
    "segundo" => array( "Churrasco con salsa roquefort" => array(foto => "foto", precio => 10), 
                        "Merluza" => array(foto => "foto", precio => 8), 
                        "Puntas de solomillo con salsa vered" => array(foto => "foto", precio => 12),
                        "Pez espada" => array(foto => "foto", precio => 10), 
                        "Pinchitos (6 unidades)" => array(foto => "foto", precio => 8)),
    "postre" => array( "Tarta de queso" => array(foto => "foto", precio => 3), 
                        "Brownie de chocolate" => array(foto => "foto", precio => 5), 
                        "Helado con sabor a elegir" => array(foto => "foto", precio => 4))
);

$precio_final = 0;
const DESCUENTO = 0.2;

foreach ($menus as $clave => $valor){ // Clave tiene priemro en la primera iteracion
    echo "El " + $clave + " plato es: ";
    foreach ($valor as $clave1 => $valor1){ // Clave1 tiene macarrones en la primera iteraccion
        echo $clave1 + " ";
        foreach ($valor1 as $clave2 => $valor2){ // Clave 2 tiene foto en la primera iteracion
            echo $clave2 + ": " + $valor2;
        }
        echo "<br/>";
    }
}
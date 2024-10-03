<?php
    /**
    * 1. Definir un array que permita almacenar y mostrar la siguiente información.
*       a. Meses del año.
*       b. Tablero para jugar al juego de los barcos.
*       c. Nota de los alumnos de 2o DAW para el módulo DWES.
*       d. Verbos irregulares en inglés.
*       e. Información sobre continentes, países, capitales y banderas.
    * @author = Raúl Bermúdez González
    * @date = 29-09-2024
*/

// Creao un array indexado unidimensional
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septirmbre", "Octubre", "Noviembre", "Diciembre");

// Creo un array indexado bidimensional con otro array indexado unidimensional
$barcos = array(
    array("A", "A", "A", "A", "A", "A", "A", "A", "A", "A"),
    array("A", "A", "A", "A", "A", "D", "A", "A", "A", "A"),
    array("A", "A", "A", "A", "A", "D", "A", "A", "S", "A"),
    array("A", "A", "C", "A", "A", "A", "A", "A", "A", "A"),
    array("A", "A", "C", "A", "A", "A", "A", "A", "A", "A"),
    array("A", "A", "C", "A", "A", "A", "A", "A", "A", "A"),
    array("A", "A", "A", "A", "A", "A", "A", "S", "A", "A"),
    array("A", "T", "T", "T", "A", "A", "A", "A", "A", "A"),
    array("A", "A", "A", "A", "A", "A", "A", "A", "A", "A"),
    array("A", "A", "A", "A", "A", "A", "P", "P", "P", "P")
);

// Creo un array indexando bidimensional con un array asociativo
$personas_clase = array(
    array(nombre => "Raúl", apellidos => "Bermúdez González", nota => 3),
    array(nombre => "Carlos", apellidos => "Borreguero Redondo", nota => 5),
    array(nombre => "Álvaro", apellidos => "Cañas González", nota => 7),
    array(nombre => "Miguel", apellidos => "Carmona Cicchetti", nota => 8),
    array(nombre => "Alejandro", apellidos => "Carrasco Castellano", nota => 4),
    array(nombre => "Mostafa", apellidos => "Cherif Mouaki Almabouada", nota => 3),
    array(nombre => "Alejandro", apellidos => "Coronado Ortega", nota => 5),
    array(nombre => "Juan Diego", apellidos => "Delgado Morente", nota => 7),
    array(nombre => "Marlon Jafet", apellidos => "Escoto García", nota => 6),
    array(nombre => "Ángel", apellidos => "Fernández Ariza", nota => 4),
    array(nombre => "Alejandro", apellidos => "Fernández Arrayás", nota => 6),
    array(nombre => "Daniel", apellidos => "Fernández Balsera", nota => 5),
    array(nombre => "Jesús", apellidos => "Ferrer López", nota => 8),
    array(nombre => "Jesús", apellidos => "Frías Rojas", nota => 7),
    array(nombre => "Manuel", apellidos => "Galán Navas", nota => 10),
    array(nombre => "Víctor", apellidos => "García Báez", nota => 4),
    array(nombre => "Lucía", apellidos => "García Díaz", nota => 6),
    array(nombre => "Adrián", apellidos => "González Martínez", nota => 8),
    array(nombre => "Jesús", apellidos => "López Funes", nota => 9),
    array(nombre => "Enrique", apellidos => "Mariño Jiménez", nota => 8),
    array(nombre => "Oscar", apellidos => "Martín-Castaño Carrillo", nota => 0),
    array(nombre => "José María", apellidos => "Mayén Pérez", nota => 9),
    array(nombre => "Pablo", apellidos => "Mérida Velasco", nota => 6),
    array(nombre => "Héctor", apellidos => "Mora Sánchez", nota => 7),
    array(nombre => "Luis", apellidos => "Pérez Cantarero", nota => 4),
    array(nombre => "Carlos", apellidos => "Romero Romero", nota => 6),
    array(nombre => "Javier", apellidos => "Ruiz Molero", nota => 5),
    array(nombre => "Alejandro", apellidos => "Vaquero Abad", nota => 7),
    array(nombre => "Luis Miguel", apellidos => "Villén Moyano", nota => 8),
);

// Creo un array asociativo bidimensional y dentro otro array asociativo unidimensional
$verbosIngles = array(
    "be" => array("past" => "was/were", "participle" => "been"),
    "become" => array("past" => "became", "participle" => "become"),
    "begin" => array("past" => "began", "participle" => "begun"),
    "break" => array("past" => "broke", "participle" => "broken"),
    "bring" => array("past" => "brought", "participle" => "brought"),
    "choose" => array("past" => "chose", "participle" => "chosen"),
    "do" => array("past" => "did", "participle" => "done"));


// Creo un array asociativo bidimensional y dentro un array indexado bidimensional y dentro otro array asociativo unidimensional
$paises = array(
    "Africa" => array(
        array(
            "country" => "Nigeria",
            "capital" => "Abuja",
            "flag" => "🇳🇬"
        ),
        array(
            "country" => "South Africa",
            "capital" => "Pretoria",
            "flag" => "🇿🇦"
        )
    ),
    "Asia" => array(
        array(
            "country" => "China",
            "capital" => "Beijing",
            "flag" => "🇨🇳"
        ),
        array(
            "country" => "Japan",
            "capital" => "Tokyo",
            "flag" => "🇯🇵"
        )
    ),
    "Europe" => array(
        array(
            "country" => "Germany",
            "capital" => "Berlin",
            "flag" => "🇩🇪"
        ),
        array(
            "country" => "France",
            "capital" => "Paris",
            "flag" => "🇫🇷"
        )
    ),
    "North America" => array(
        array(
            "country" => "United States",
            "capital" => "Washington, D.C.",
            "flag" => "🇺🇸"
        ),
        array(
            "country" => "Canada",
            "capital" => "Ottawa",
            "flag" => "🇨🇦"
        )
    ),
    "South America" => array(
        array(
            "country" => "Brazil",
            "capital" => "Brasilia",
            "flag" => "🇧🇷"
        ),
        array(
            "country" => "Argentina",
            "capital" => "Buenos Aires",
            "flag" => "🇦🇷"
        )
    ),
    "Australia" => array(
        array(
            "country" => "Australia",
            "capital" => "Canberra",
            "flag" => "🇦🇺"
        ),
        array(
            "country" => "New Zealand",
            "capital" => "Wellington",
            "flag" => "🇳🇿"
        )
    )
);

?>

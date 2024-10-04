<?php
/**
 * 2. Indexar los ejercicios mediante un array.
    * @author = Raúl Bermúdez González
    * @date = 29-09-2024
*/
$ejercicios = array (
    "Unidad 3" => [ 
        "array" => [
            "Ejercicio 1" => ["./EjerciciosPHP/ud3/arrays/act01.php", "Almacenamos distinta información en arrays: meses del añlo, tablero de barco, notas alumno, etc."],
            "Ejercicio 3" => ["./EjerciciosPHP/ud3/arrays/act03.php", "Se elige un nombre al azar de un array"],
            "Ejercicio 4" => ["./EjerciciosPHP/ud3/arrays/act04.php", "Se crea un menu de primeros, segundos y postres"]
        ],
        "bucles" => [
            "Ejercicio 1" => ["./EjerciciosPHP/ud3/bucles/act_01.php", "Escribir los 10 primeros numeros"],
            "Ejercicio 2" => ["./EjerciciosPHP/ud3/bucles/act_02.php", "Suma de los 3 primeros numeros pares"],
            "Ejercicio 3" => ["./EjerciciosPHP/ud3/bucles/act_03.php", "Tablas de multiplicar del 1 al 10"],
            "Ejercicio 4" => ["./EjerciciosPHP/ud3/bucles/act_04.php", "Paleta de colores"]
        ],
        "condicionales" => [
            "Ejercicio 1" => ["./EjerciciosPHP/ud3/condicionales/act_01.php", "Ordenar tres números"],
            "Ejercicio 2" => ["./EjerciciosPHP/ud3/condicionales/act_02.php", "Decir los días que tiene un mes dependiendo del mes introducido y del año"],
            "Ejercicio 3" => ["./EjerciciosPHP/ud3/condicionales/act_03.php", "Calcular edad mediante la fecha de nacimiento"],
            "Ejercicio 4" => ["./EjerciciosPHP/ud3/condicionales/act_04.php", "Cambiar HTML según la hora y la estacion del año en la que estemos"],
            "Ejercicio 5" => ["./EjerciciosPHP/ud3/condicionales/act_05.php", "Cambiar informacion de las páginas según el usuario."] 
        ]
    ],
    "Proyectos" => ["calendario" => ["calendario" => ["./Proyectos/calendario/calendario.php", "Primer proyecto el calendario."]]]
);  

return $ejercicios;
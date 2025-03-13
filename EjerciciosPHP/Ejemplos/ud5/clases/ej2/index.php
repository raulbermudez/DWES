<?php
/**
 * Probamos la clase Contador
 * @author raul <email>
*/

// Requerimos el contador
require_once "Contador.php";

// Obtenemos el numero de instancias
$nInstancias = Contador::nInstancias();

echo $nInstancias;

// Creamos varios contadores
$contador1 = new Contador();
$contador2 = new Contador(100);
$contador3 = new Contador();

// Mostramos el valor de los contadores
echo "<br/>" . $contador1 . "<br/>";
echo $contador2 . "<br/>";

// Aumentamos los contadores
$contador1->contar();
$contador1->contar();

$contador2->contar();
$contador2->contar();

// Volvemos a mostrar los valores
echo $contador1 . "<br/>";
echo $contador2 . "<br/>";

// Volvemos a ver el numero de instancias creadas
$nInstancias = Contador::nInstancias();
echo $nInstancias;
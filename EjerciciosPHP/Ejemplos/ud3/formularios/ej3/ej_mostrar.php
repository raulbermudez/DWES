<?php
/**
  * Incluye el array y muestra los datos por pantalla
 * @author = Raúl Bermúdez González
*/
foreach ($_POST as $clave => $valor){
    echo $clave . ":" . $valor . "<br/>";
}

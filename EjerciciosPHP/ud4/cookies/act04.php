<?php
/**
 * Contador
 * @author = Raúl Bermúdez González
 * @date = 17-10-2024
 */

if (!isset($_COOKIE["contador"])){
   // Creamos la cookie
   setcookie("contador", 0, time() + 3600);
} else {
   $valor = $_COOKIE["contador"] + 1;
   setcookie("contador", $valor, time() + 3600);
}
 // Mostramos la cookie
echo $_COOKIE["contador"];

echo "<button><a href='https://github.com/raulbermudez/DWES/tree/master/EjerciciosPHP/ud4/sesiones/act_01.ph'>Código</a></button>";
?>
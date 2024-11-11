<?php
/**
 * Crea una cookie de duracion limiada, comprueba su estado y destruyela
 * @author = Raúl Bermúdez González
 * @date = 17-10-2024
 */

// crear cookie
setcookie("c1", "Hola Mundo", time()+60);

echo "Inicio <br/>";

// Mostrar cookie
if (isset($_COOKIE['c1'])){
    echo $_COOKIE['c1'];
}

echo "<button><a href='https://github.com/raulbermudez/DWES/tree/master/EjerciciosPHP/ud4/cookies/act01.php'>Código</a></button>";
echo "<br/> Fin";
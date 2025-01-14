<?php
/**
 * destruye la cookie del ejercicio 1
 * @author = Raúl Bermúdez González
 * @date = 17-10-2024
 */

// Borrar cookie

if (isset($_COOKIE['c1'])){
    
    setcookie("c1", "Hola Mundo", time()-60);
    echo "Cookie borrada";
}
echo "<button><a href='https://github.com/raulbermudez/DWES/tree/master/EjerciciosPHP/ud4/cookies/act01_1.php'>Código</a></button>";
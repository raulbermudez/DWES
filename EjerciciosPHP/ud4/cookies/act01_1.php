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
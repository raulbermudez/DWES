<?php
/**
 */
session_start();
if (!isset($_SESSION['nombre'])){
    $_SESSION['nombre'] = "Raul";
    $_SESSION['apellidos'] = 'Bermudez';
}

echo  $_SESSION['nombre'] = "Raul";
echo $_SESSION['apellidos'] = 'Bermudez';
?>
<?php
/**
 * 
 */
// Iniciamos la sesion
session_start();
// Borramos las variables
session_unset();
// Destruimos las variables
session_destroy();
// Reenviamos al archivo
header("Location: ej1.php");
<?php
// Iniciar sesión
session_start();

// Destruir la sesión
session_destroy();

header('Location: index.php');
?>
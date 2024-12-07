<?php
/**
 *@author = Raúl
 */
// Control de acceso al formulario
if (!isset($_POST['enviar'])){
    header("Location: ./ej4.php");
}
echo "Datos del formulario <br/>";

$correo = $_POST['email'];
foreach ($_POST as $clave => $valor){
    if ($correo == $valor && (!filter_var($correo, FILTER_VALIDATE_EMAIL))){
        echo $valor . " El correo no es valido";
        echo "<br/>";
    } else{
        echo $valor;
        echo "<br/>";
    }   
}
?>
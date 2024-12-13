<?php
/**
 * @author raul <email>
 * Elimino de la tabla el valor
*/
require_once "lib/function.php";

session_start();

if (!$_SESSION['usuario']['auth']){
    header("Location index.php?error=1");
}

$id = $_GET['id'];

$db = conectaBD();
$sql = "DELETE FROM perros WHERE id = :id";
$newArray = array(":id"=>$id);
$consulta = $db->prepare($sql);
$consulta->execute($newArray);

header("location: index.php");
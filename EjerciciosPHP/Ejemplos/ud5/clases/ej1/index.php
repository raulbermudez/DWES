<?php
/**
 * @author = Raul Bermudez Gonzalez
 */

// Requirimos clase Persona
require_once "Persona.php";
require_once "Alumno.php";

// Creamos un objeto
// $persona = new Persona("Raul", "Bermudez", "Gonzalez");
$alumno = new Alumno("Raul", "Bermudez", "Gonzalez");

// $persona->saludo();
// echo "</br>" . $persona->nombre();

$alumno->saludo();
?>
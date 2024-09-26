
<?php
/**
* 2. Carga en variables mes y año e indica el número de días del mes. Utiliza la
* estructura de control switch
@author = Raúl Bermúdez González
@date = 26/09/2024
*/
$mes = "febrero";
$year = 2023;

switch ($mes) {
    case "enero":
    case "marzo":
    case "mayo":
    case "julio":
    case "agosto":
    case "octubre":
    case "diciembre":
        echo "$mes de $year tiene 31 días";
        break;
    case "abril":
    case "junio":
    case "septiembre":
    case "noviembre":
        echo "$mes de $year tiene 30 días";
        break;
    case "febrero":
        if ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400== 0)) {
            echo "$mes de $year tiene 29 dias";
        } else {
            echo "$mes de $year tiene 28 días";
        }
        break;
    default:
        echo "Lo siento pero alguno de los datos introducidos no es correcto compruebelos";
}
?>
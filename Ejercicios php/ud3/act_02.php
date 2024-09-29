
<?php
/**
* 2. Carga en variables mes y año e indica el número de días del mes. Utiliza la
* estructura de control switch
@author = Raúl Bermúdez González
@date = 26/09/2024
*/
$mes = "febrero";
$year = 2023;
$ndias = 0;

switch ($mes) {
    case "enero":
    case "marzo":
    case "mayo":
    case "julio":
    case "agosto":
    case "octubre":
    case "diciembre":
        $ndias = 31;
        break;
    case "abril":
    case "junio":
    case "septiembre":
    case "noviembre":
        $ndias = 30;
        break;
    case "febrero":
        if ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400== 0)) {
            $ndias = 29;
        } else {
            $ndias = 28;
        }
}
echo "$mes de $year tiene $ndias días";
?>
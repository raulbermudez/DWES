<?php

include("../app/views/cabecera_view.php");
if (isset($data["coeficiente"])){
    $coeficiente = $data["coeficiente"];
    $data["coeficiente"] = "";
} else{
    $coeficiente = 0;
}
?>
<h4>Agente: <?php echo $_SESSION["usuario"] ?></h4>
<h4>Coeficiente: <?php echo $coeficiente ?></h4>
<h5>Listado de multas</h5>
<a href="/poner/multa">Poner multa</a>
<!-- Hago una tabla que muestre la matricula descripcion y la fecha -->
<table border="1">
    <tr>
        <th>Matricula</th>
        <th>Descripcion</th>
        <th>Fecha</th>
    </tr>
    <!-- Recorro el array de multas y muestro los datos -->
    <?php 
    if ($data == ""){
        echo "No hay multas";
    } else{
        foreach ($data as $multa => $valor)  { 
            if ($multa !== "coeficiente"){?>
            <tr>
                <td><?php echo $valor["matricula"] ?></td>
                <td><?php echo $valor["descripcion"] ?></td>
                <td><?php echo $valor["fecha"] ?></td>
            </tr>
        <?php } 
    }}?>
    
    
</table>
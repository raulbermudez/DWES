<?php
include("../app/views/cabecera_view.php");
?>

<h4>Listado de conductores</h4>
<!-- Añado un buscador -->
<form action="/conductores" method="post">
    <label for="buscar">Buscar</label>
    <input type="text" name="buscar" id="buscar">
    <input type="submit" value="Buscar">
</form>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Perfil</th>
        <th>Sanciones</th>
    </tr>
    <?php
    foreach ($data as $conductor => $valor){
        echo "<tr>";
        echo "<td>".$valor["nombre"]."</td>";
        echo "<td>".$valor["perfil"]."</td>";
        echo "<td>0</td>";
        echo "</tr>";
    }
    ?>
</table>
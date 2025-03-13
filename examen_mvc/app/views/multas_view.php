<?php

include("../app/views/cabecera_view.php");
?>
<h3>Multas</h3>
<table border="1">
    <tr>
        <th>Matricula</th>
        <th>Descripcion</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Importe</th>
        <th>Descuento</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($data as $multa => $valor) { ?>
        <tr>
            <td><?php echo $valor["matricula"] ?></td>
            <td><?php echo $valor["descripcion"] ?></td>
            <td><?php echo $valor["fecha"] ?></td>
            <td><?php echo $valor["estado"] ?></td>
            <td><?php echo $valor["importe"] ?></td>
            <td><?php echo $valor["descuento"] ?></td>
            <td>
                <?php if ($valor["estado"] == "Pendiente") { ?>
                    <a href="/pagar/<?php echo $valor["id"] ?>">Pagar</a>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</table>
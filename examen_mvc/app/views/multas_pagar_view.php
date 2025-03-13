<?php
include("../app/views/cabecera_view.php");


?>
<h4>Pago de multa</h4>
<h5>Matricula: <?php echo $data["multa"]->getMatricula() ?></h5>
<h5>Fecha: <?php echo $data["multa"]->getFecha() ?></h5>
<h5>Descripcion: <?php echo $data["multa"]->getDescripcion() ?></h5>
<h5>Importe: <?php echo $data["multa"]->getImporte() ?></h5>
<h5>Descuento: <?php echo $data["multa"]->getDescuento() ?></h5>
<h5>Importe a pagar: <?php echo $data["multa"]->getImporte() - $data["multa"]->getDescuento() ?></h5>
<form action="" method="post">
    <input type="submit" name="pagar" value="Pagar">
</form>

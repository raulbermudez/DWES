<?php

include("../app/views/cabecera_view.php");
$coeficiente = 0;
?>
<h4>Agente: <?php echo $_SESSION["usuario"] ?></h4>
<h4>Coeficiente: <?php echo $coeficiente ?></h4>
<h5>Nueva multa</h5>
<form action="" method="post">
    <label>Matricula:</label>
    <input type="text" name="matricula" id="matricula"><?php echo $data["matriculaError"] ?><br/>
    <label>Fecha:</label>
    <input type="date" name="fecha" id="fecha"><?php echo $data["fechaError"] ?><br/>
    <label>Tipo de sancion:</label>
    <!-- Hago un radio button -->
    <input type="radio" name="tipo" value="Leve"> Leve
    <input type="radio" name="tipo" value="Grave"> Grave
    <input type="radio" name="tipo" value="Muy grave"> Muy grave <?php echo $data["sancionError"] ?><br/>
    <label>Descripcion:</label>
    <input type="text" name="descripcion" id="descripcion"><?php echo $data["descripcionError"] ?><br/>
    <input type="submit" name="enviar" value="Enviar">
</form>
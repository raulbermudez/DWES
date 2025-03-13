<?php
// Comprobar si existe el directorio de imágenes
$imagenes = [];
if (is_dir('images')) {
    $imagenes = array_diff(scandir('images'), array('..', '.'));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Fotos</title>
</head>
<body>
    <h1>Galería de Fotos</h1>

    <h2>Imágenes Disponibles</h2>
    <div>
        <?php
        foreach ($imagenes as $imagen) {
            echo "<img src='images/$imagen' alt='$imagen' style='width:200px;margin:10px;'>";
        }
        ?>
    </div>

    <br>
    <a href="admin.php">Área Administrativa</a>
</body>
</html>

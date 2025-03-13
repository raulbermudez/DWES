<?php
    include "../app/Config/include.php";
    // Saco un valor aleatorio del arrayVideos
    $video = $arrayVideos[array_rand($arrayVideos)];
    $enl = $nom ="";
    // Recorro $video con un foreach y me quedo con el nombre y el enlace del cideo para luego mostrarlo
    foreach ($video as $nombre => $enlace) {
        $enl = $enlace;
        $nom = $nombre;
    }

    // Tengo que generar un valor aleatorio entre semaforo, coche y peaton
    $captcha = array("Peaton", "Coche", "Semaforo");
    $cap = $captcha[array_rand($captcha)];
    $_SESSION["captcha"] = $cap;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Voy a incluir la cabecera -->
    <?php include("../app/views/cabecera_view.php") ?>
    <h3><?php echo $nom ?></h3>
    <!-- Muestro el video con el enlace -->
    <iframe width="560" height="315" src="<?php echo $enl ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</body>
</html>
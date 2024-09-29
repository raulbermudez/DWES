<?php
/** 
* 5. Script que muestre una lista de enlaces en función del perfil de usuario:
    *    Perfil Administrador: Pagina1, Pagina2, Pagina3, Pagina4
    *    Perfil Usuario: Pagina1, Pagina2

@author = Raúl Bermúdez González
@date = 26/09/2024
*/

// Esta variable es para saber que enlaces poner si los de usuario o los de administrador
$tipo_perfil = 'usuario'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercio 5 php</title>
    <style>
        .code {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <?php if ($tipo_prfil == "usuario"): ?>
        <p>Conectado como usuario</p>
        <a href="#">Enlace 1</a>
        <a href="#">Enlace 2</a>
    <?php elseif ($tipo_perfil == "administrador"): ?>
        <p>Conectado como admin</p>
        <a href="#">Enlace 1</a>
        <a href="#">Enlace 2</a>
        <a href="#">Enlace 3</a>
        <a href="#">Enlace 4</a>
    <?php endif; ?>
    <div class="code">
        <button type="button"><a href="https://github.com/raulbermudez/-Servidor-Desarrollo-de-Aplicaciones-Web-en-Entorno-Servidor/blob/master/Ejercicios%20php/ud3/condicionales/act_05.php">Ver código</a></button>
    </div>   
</body>
</html>
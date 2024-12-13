<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Numeros pares</title>
    </head>
    <body>
        <p><?php 
        foreach ($data as $clave => $valor){
            echo $valor . "<br/>";
        }
        ?></p>
    </body>
</html>
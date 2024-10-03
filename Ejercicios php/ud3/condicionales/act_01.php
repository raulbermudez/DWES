<?php

$a = 3;
$b = 5;
$c = 5;

if (($a >= $b) && ($a >= $c)) {
    if ($b >= $c) {
    echo "$c , $b , $a";
    } else {
        echo "$b , $c , $a";
    }
} else if (($a <= $b) && ($b >= $c)){
    if ($a >= $c) {
        echo "$c, $a, $b";
    } else{
        echo "$a, $c, $b";
    }
} else if (($a <= $c) && ($c >= $b)) {
    if ($b >= $a) {
        echo "$a, $b, $c";
    } else {
        echo "$b, $a, $c";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercio 1 php</title>
    <style>
        .code {
            margin-top: 70px;
        }
    </style>
</head>
<body>
    <div class="code">
        <button type="button"><a href="https://github.com/raulbermudez/DWES/blob/master/Ejercicios%20php/ud3/condicionales/act_01.php">Ver código</a></button>
    </div>   
</body>
</html>
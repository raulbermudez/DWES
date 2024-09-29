/**
@author */
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
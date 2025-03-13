<?php
$filename = 'ejemplo1.txt';
if (file_exists($filename)) {
    $count = file('ejemplo1.txt');
    $count[0] ++;
    $fp = fopen("ejemplo1.txt", "w");
    fputs($fp, "$count[0]");
    fclose($fp);
    echo $count[0];
} else {
    $fh = fopen("ejemplo1.txt", "w");
    if($fh==false) die("unable to create file");
    fputs($fh, 1);
    fclose($fh);
    $count = file('ejemplo1.txt');
    echo $count[0];
}
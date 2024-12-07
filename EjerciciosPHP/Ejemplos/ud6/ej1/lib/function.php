<?php
function conectaBD(){
    try{
        $dsn = "mysql:host=localhost;dbname=mascotas";
        $db = new PDO($dsn, 'mascotas', 'mascotas');
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
        return($db);
    } catch (PDOException $e){
        echo "Error conexión";
        exit();
    }
}

function clearData($data){
    $data = trim($data); // Para quitar los espacios
    $data = stripslashes($data);
    $data = htmlspecialchars($data); // Para quitar los caracteres html speciales
    return $data;
}
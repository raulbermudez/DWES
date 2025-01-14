<?php
/**
 * Conectarse a una base de datos
 * @author raul <email>
*/

require_once "lib/function.php";

//Conuslta no preparada
// $sql = "insert into perros(nombre) values('Firulais')";
// if ($db->query($sql)){
//     echo "Insercion correcta <br/>";
// } else{
//     echo "Error de insercion";
// }

// // Consulta preparada
// echo"<h4>Valores de la tabla perro</h4>";
// $sql = "SELECT * FROM perros";
// $consulta = $db->prepare($sql);
// $consulta->execute();
// $resultado = $consulta->fetchAll();
// foreach ($resultado as $valor){
//     echo $valor['nombre'] . "<br/>";
// }

# No debemos incluir en la consulta entrada de usuario
// $campo = $_POST['busqueda'] ?? 'R';
// $sql = "SELECT * FROM perros WHERE nombre LIKE '" .$campo . "%'";

// $consulta =$db->prepare($sql);
// $consulta->execute();
// $resultado = $consulta->fetchAll();
// echo "<h4>Lista de perros</h4>";
// if (!$resultado){
//     echo "Error de consulta";
// } else{
//     foreach ($resultado as $valor){
//         echo $valor['nombre'] . "<br/>";
//     }
// }

/*
*/

//Inicio la sesion
session_start();

// si no exise la variable de sesion la creo
if(!isset($_SESSION['usuario'])){
    $_SESSION['usuario'] = ["nombreUs" => "Invitado",
                            "auth" => false];
}

// Mostrar los valores
$user = $passwd = "";
$autenticado = false;

if (isset($_POST['enviar'])){
    $user = $_POST['usuario'];
    $passwd = $_POST['contrasena'];
    
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";
    $db = conectaBD();
    $newArray = array(":usuario"=>$user, ":contrasena"=> $passwd);
    $consulta = $db->prepare($sql);
    $consulta->execute($newArray);
    // Resultado tendra un array bidimensional
    $resultado = $consulta->fetchAll();
    // Si resulatado ha devuelto algo metos los datos en la variable de sesion
    if($resultado){
        $_SESSION['usuario'] = ["nombreUs" => $resultado[0]['nombre'],
                                "auth" => true];
    // Sino muestro un mensaje de error
    } else{
        echo "Lo siento credenciales incorrectas";
    }
}
// Dos condiciones de busqueda
$db = conectaBD();
// NO DEBEMOS INCLUIR EN LA CONSULTA ENTRADA DE USUARIO.
$campo = $_POST['busqueda'] ?? '%';
$busca = $_POST['busqueda'] ?? '';
$sql = "SELECT * FROM perros WHERE nombre LIKE :nombre OR raza LIKE :nombre";

$newArray = array(":nombre"=>$campo ."%");
$consulta = $db->prepare($sql);
$consulta->execute($newArray);
$resultado = $consulta->fetchAll();

// Cargamos datos para la vista
$data["mascotas"] = $resultado;
// Compruebo los datos para saber si le muestro el boton de insertar datos o no
$data["usuario"] = $_SESSION["usuario"];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            if ($data["usuario"]["auth"]){
                echo "<h2>Te has autenticado como " . $data["usuario"]["nombreUs"] ."</h2>";
                echo "<a href='cerrarSesion.php'>Cerrar sesión</a>";
            } else{
                echo "<h2>Te has autenticado como " . $data["usuario"]["nombreUs"] ."</h2>";
                include ("view/form_view.php");
            }
        ?>

        <h2>Gestion de mascotas</h2>

        <form method="post" action="">
            <input type="text" name="busqueda" value="<?php echo $busca ?>">
            <input type="submit" name="buscar" value="Buscar">
        </form>
        <?php
            if ($data['usuario']['auth']){
                include("view/aniadir_view.php");
            }
        ?>
        <h2>Listado de mascotas</h2>
        <?php
            if (!$resultado) {
                echo "Error en la consulta";
            } else {
                foreach ($data["mascotas"] as $valor) {
                    echo $valor['nombre'] . " - " . $valor['peso'] . " - " . $valor['raza'];
                    // Compruebo que el usuario se ha autenticado para mostar la posibilidad de eliminar
                    if ($data["usuario"]["auth"]){
                        $enlace = include("view/borrar_view.php");
                    }
                    echo " <br/>";
                }
            }
        ?>
    </body>
</html>
<?php
/**
 * @author = Raúl Bermúdez González
 * Realiza el juego de mastermind desde la parte de servidor
 */
session_start();
// Inico la sesion
if (!isset($_SESSION['aColoresJugar'])){
    // Creo un arrray vacio con los colores
    $aColoresJugar = array();
    $_SESSION['aColoresJugar'] = array();
    $numero = "";
    // Primero declaro un array con los colores que se pueden utilizar
    $aColores = ["red", "green", "blue", "yellow", "orange", "pink"];

    for ($i=0; $i<4; $i++){
        $numero = random_int(0,5);
        $aColoresJugar[$i] = $aColores[$numero];
    }

    // Guardo los colores en una sesion
    $_SESSION['aColoresJugar'] = $aColoresJugar;
    $_SESSION['aComprobaciones'] = array();
    $_SESSION['comprobaciones'] = array();
    $mensajeError = "";
    $aciertos = 0;
    $medio_Aciertos = 0;
    $fallos = 0;
    $tabla = "";
} else{
    // Si existe la sesion cargo directamente el array de colores con los que se esta jugando
    $aColoresJugar = $_SESSION['aColoresJugar'];
    $aComprobaciones = $_SESSION['aComprobaciones'];
    // Declaro todas la variables que usare despues
    $mensajeError = "";
    $aciertos = 0;
    $medio_Aciertos = 0;
    $fallos = 0;
    $colum_max = 0;
    $indice = 0;
    $tabla = "";
}

// Compruebo si se ha pulsado el boton de comprobar
if (isset($_POST['comprobar'])){
    if (!isset($_SESSION['aComprobaciones'][0])){
        // Estamos en el primer intento por lo tanto obtengo los valores de las primeras 4 columnas
        $colum_max = 4;
        $indice = 0;
    } else if (!isset($_SESSION['aComprobaciones'][1])){
        // Estamos en el segundo intento por lo tanto obtengo los valores de las primeras 4 columnas
        $colum_max = 8;
        $indice = 1;
    }else if (!isset($_SESSION['aComprobaciones'][2])){
        // Estamos en el tercer intento por lo tanto obtengo los valores de las primeras 4 columnas
        $colum_max = 12;
        $indice = 2;
    }else if (!isset($_SESSION['aComprobaciones'][3])){
        // Estamos en el cuerto intento por lo tanto obtengo los valores de las primeras 4 columnas
        $colum_max = 16;
        $indice = 3;
    }else if (!isset($_SESSION['aComprobaciones'][4])){
        // Estamos en el quinto intento por lo tanto obtengo los valores de las primeras 4 columnas
        $colum_max = 20;
        $indice = 4;
    }else if (!isset($_SESSION['aComprobaciones'][5])){
        // Estamos en el sexto intento por lo tanto obtengo los valores de las primeras 4 columnas y en este ya le muestro al final sus valores
        $colum_max = 24;
        $indice = 5;
    }

    $i = $colum_max - 3;
    for ($i; $i<=$colum_max;$i++){
        $col[$i] = $_POST["col$i"];
        if (empty($col[$i])){
            $mensajeError = "Debes rellenar todos los campos antes de comprobar";
            $col = array();
            break;
        } 
    }

    if (!$mensajeError){
        $_SESSION["aComprobaciones"][$indice] = $col;
    }

    // Compruebo que colores son correctos y cuales no
    for ($i=0; $i<4; $i++){
        if ($_SESSION['aColoresJugar'][$i] == $_SESSION["aComprobaciones"][$indice][$colum_max - 4 + ($i + 1)]){
            $aciertos++;
        } else if (in_array( $_SESSION["aComprobaciones"][$indice][$colum_max - 4 + ($i + 1)], $_SESSION['aColoresJugar'])){
            $medio_Aciertos++;
        } else{
            $fallos++;
        }
    }

    if ($aciertos == 4){
        $mensajeError = "Enhorabuena has ganado";
    } else if (isset($_SESSION['aComprobaciones'][5])){
        $mensajeError = "Lo siento has perdido";
        $tabla = "<table>
            <tr>
                <td>Posicion 1</td>
                <td>Posicion 2</td>
                <td>Posicion 3</td>
                <td>Posicion 4</td>
            </tr>
            <tr>
                <td>" . $_SESSION['aColoresJugar'][0] . "</td>
                <td>" . $_SESSION['aColoresJugar'][1] . "</td>
                <td>" . $_SESSION['aColoresJugar'][2] . "</td>
                <td>" . $_SESSION['aColoresJugar'][3] . "</td>
            </tr>
        </table>";
    }

    $_SESSION['comprobaciones'][$indice][0] = $aciertos;
    $_SESSION['comprobaciones'][$indice][1] = $medio_Aciertos;
    $_SESSION['comprobaciones'][$indice][2] = $fallos;
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mastermind</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Bienvenido al juego de mastermind- Los colores los tienes que introducir en ingles</h1>
    <a href="cerrarSesion.php">Reiniciar Partida</a><br/>
    <!-- Creo dos tabas una de 4 columnas y 7 filas con inputs -->
    <?php echo "<h2>" . $mensajeError . "</h2>"; 
    echo $tabla;?>
    <div class="flexeo">
    <form method="post" action="">
        <table>
            <tr>
                <td>Posicion 1</td>
                <td>Posicion 2</td>
                <td>Posicion 3</td>
                <td>Posicion 4</td>
            </tr>
            <tr>
            <?php
                // Compruebo que existe y deshabilito el boton
                if(isset($_SESSION['aComprobaciones'][0])){
                    $disabled = "disabled";
                } else{
                    $disabled = "";
                }
                ?>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][0][1] ?? "" ?>" name="col1" id="col1" value="<?php echo $_SESSION['aComprobaciones'][0][1] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][0][2] ?? "" ?>" name="col2" id="col2" value="<?php echo $_SESSION['aComprobaciones'][0][2] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][0][3] ?? "" ?>" name="col3" id="col3" value="<?php echo $_SESSION['aComprobaciones'][0][3] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][0][4] ?? "" ?>" name="col4" id="col4" value="<?php echo $_SESSION['aComprobaciones'][0][4] ?? "" ?>" <?php echo $disabled ?>></td>
            </tr>
            <tr>
                <?php
                    // Compruebo que existe y deshabilito el boton
                    if(isset($_SESSION['aComprobaciones'][1])){
                        $disabled = "disabled";
                    } else{
                        $disabled = "";
                    }
                ?>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][1][5] ?? "" ?>" name="col5" id="col5" value="<?php echo $_SESSION['aComprobaciones'][1][5] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][1][6] ?? "" ?>" name="col6" id="col6" value="<?php echo $_SESSION['aComprobaciones'][1][6] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][1][7] ?? "" ?>" name="col7" id="col7" value="<?php echo $_SESSION['aComprobaciones'][1][7] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][1][8] ?? "" ?>" name="col8" id="col8" value="<?php echo $_SESSION['aComprobaciones'][1][8] ?? "" ?>" <?php echo $disabled ?>></td>
            </tr>
            <tr>
            <?php
                // Compruebo que existe y deshabilito el boton
                if(isset($_SESSION['aComprobaciones'][2])){
                    $disabled = "disabled";
                } else{
                    $disabled = "";
                }
                ?>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][2][9] ?? "" ?>" name="col9" id="col9" value="<?php echo $_SESSION['aComprobaciones'][2][9] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][2][10] ?? "" ?>" name="col10" id="col10" value="<?php echo $_SESSION['aComprobaciones'][2][10] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][2][11] ?? "" ?>" name="col11" id="col11" value="<?php echo $_SESSION['aComprobaciones'][2][11] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][2][12] ?? "" ?>" name="col12" id="col12" value="<?php echo $_SESSION['aComprobaciones'][2][12] ?? "" ?>" <?php echo $disabled ?>></td>
            </tr>
            <tr>
            <?php
                // Compruebo que existe y deshabilito el boton
                if(isset($_SESSION['aComprobaciones'][3])){
                    $disabled = "disabled";
                } else{
                    $disabled = "";
                }
                ?>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][3][13] ?? "" ?>" name="col13" id="col13" value="<?php echo $_SESSION['aComprobaciones'][3][13] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][3][14] ?? "" ?>" name="col14" id="col14" value="<?php echo $_SESSION['aComprobaciones'][3][14] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][3][15] ?? "" ?>" name="col15" id="col15" value="<?php echo $_SESSION['aComprobaciones'][3][15] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][3][16] ?? "" ?>" name="col16" id="col16" value="<?php echo $_SESSION['aComprobaciones'][3][16] ?? "" ?>" <?php echo $disabled ?>></td>
            </tr>
            <tr>
            <?php
                // Compruebo que existe y deshabilito el boton
                if(isset($_SESSION['aComprobaciones'][4])){
                    $disabled = "disabled";
                } else{
                    $disabled = "";
                }
                ?>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][4][17] ?? "" ?>" name="col17" id="col17" value="<?php echo $_SESSION['aComprobaciones'][4][17] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][4][18] ?? "" ?>" name="col18" id="col18" value="<?php echo $_SESSION['aComprobaciones'][4][18] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][4][19] ?? "" ?>" name="col19" id="col19" value="<?php echo $_SESSION['aComprobaciones'][4][19] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][4][20] ?? "" ?>" name="col20" id="col20" value="<?php echo $_SESSION['aComprobaciones'][4][20] ?? "" ?>" <?php echo $disabled ?>></td>
            </tr>
            <tr>
            <?php
                // Compruebo que existe y deshabilito el boton
                if(isset($_SESSION['aComprobaciones'][5])){
                    $disabled = "disabled";
                } else{
                    $disabled = "";
                }
                ?>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][5][21] ?? "" ?>" name="col21" id="col21" value="<?php echo $_SESSION['aComprobaciones'][5][21] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][5][22] ?? "" ?>" name="col22" id="col22" value="<?php echo $_SESSION['aComprobaciones'][5][22] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][5][23] ?? "" ?>" name="col23" id="col23" value="<?php echo $_SESSION['aComprobaciones'][5][23] ?? "" ?>" <?php echo $disabled ?>></td>
                <td><input type="text" class="<?php echo $_SESSION['aComprobaciones'][5][24] ?? "" ?>" name="col24" id="col24" value="<?php echo $_SESSION['aComprobaciones'][5][24] ?? "" ?>" <?php echo $disabled ?>></td>
            </tr>
        </table>
        <input type="submit" name="comprobar" value="Comprobar">
    </form>
    
    <table>
        <tr>
            <td>Aciertos(pos y let)</td>
            <td>Medio Aciertos(solo pos)</td>
            <td>Fallos</td>
        </tr>
        
        <tr>
            <td><?php echo $_SESSION['comprobaciones'][0][0] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][0][1] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][0][2] ?? "" ?></td>
        </tr>
        <tr>
            <td><?php echo $_SESSION['comprobaciones'][1][0] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][1][1] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][1][2] ?? "" ?></td> 
        </tr>
        <tr>
            <td><?php echo $_SESSION['comprobaciones'][2][0] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][2][1] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][2][2] ?? "" ?></td>  
        </tr>
        <tr>
            <td><?php echo $_SESSION['comprobaciones'][3][0] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][3][1] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][3][2] ?? "" ?></td> 
        </tr>
        <tr>
            <td><?php echo $_SESSION['comprobaciones'][4][0] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][4][1] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][4][2] ?? "" ?></td> 
        </tr>
        <tr>
            <td><?php echo $_SESSION['comprobaciones'][5][0] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][5][1] ?? "" ?></td>
            <td><?php echo $_SESSION['comprobaciones'][5][2] ?? "" ?></td>  
        </tr>
    </table>
    </div>

</body>
</html>
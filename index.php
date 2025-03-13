<?php
    $variable = include './config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de los ejercicios</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            margin: 0;
        }

        h3 {
            color: #4CAF50;
            font-size: 24px;
            margin-top: 30px;
        }

        h4 {
            color: #2196F3;
            font-size: 20px;
            margin-top: 10px;
        }

        li {
            font-size: 16px;
            margin-bottom: 10px;
            padding-left: 20px;
        }

        a {
            text-decoration: none;
            color: #2196F3;
            font-weight: bold;
        }

        a:hover {
            color: #f44336;
            text-decoration: underline;
        }

        .container {
            margin: 0 auto;
            max-width: 900px;
            padding: 20px;
        }

        .section {
            background-color: white;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .section h4 {
            margin-top: 0;
        }

        .list-group {
            list-style-type: none;
            padding-left: 0;
        }

        .list-group li {
            padding: 8px;
            border-bottom: 1px solid #eee;
        }

        .list-group li:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Raúl Bermúdez González - DWES</h1>
        <?php
        foreach ($variable as $carpeta => $informacion) {
            echo "<div class='section'>";
            echo "<h3>" . $carpeta . "</h3>";
            foreach ($informacion as $subcarpeta => $ejercicios) {
                echo "<h4>" . $subcarpeta . "</h4>";
                echo "<ul class='list-group'>";
                foreach ($ejercicios as $nombre => $info) {
                    $ruta = $info[0];
                    $descripcion = $info[1];
                    echo "<li><a href='$ruta'>$nombre - $descripcion</a></li>";
                }
                echo "</ul>";
            }
            echo "</div>";
        };
        ?>
    </div>

</body>
</html>

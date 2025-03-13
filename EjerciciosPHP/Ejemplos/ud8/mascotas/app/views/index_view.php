<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Gestión de animales</h1>
        <h2>Listado de animales</h2>
        <form action="" method="post">
            <input type="text" name="filtro" id="filtro" onKeyUp="showAnimalesFetch(this.value)">
        </form>

        <?php require "lista_view.php"; ?>


        <script>
            function showAnimales(str){
                if (str.length < 3) {
                    document.getElementById("filtro").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function(){
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("resultado").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "http://mascotasud8.local/getMascotas.php?q=" + str, true);
                    xmlhttp.send();
                }
            }

            function showAnimalesFetch(str){
                var xhttp;
                if(str.length == 0){
                    document.getElementById("filtro").innerHTML = "";
                    return;
                }

                fetch("http://mascotasud8.local/getMascotas.php?q=" + str)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("resultado").innerHTML = data;
                });
        
            }
        </script>
    </body>
</html>
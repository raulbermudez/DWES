
<?php
// Comprobacion de añadi r fotos a la base de datos
if (isset($_FILES['profile_picture'])  && $_FILES['profile_picture']['name'] != "") {
                $data['picture'] = $_FILES['profile_picture'];
                // Comprobamos si se ha subido una imagen
            if ($data['picture']['error'] == 0) {
                // Comprobamos si el archivo subido es una imagen
                if ($data['picture']['type'] == 'image/jpeg' || $data['picture']['type'] == 'image/png') {
                    // Comprobamos si el archivo subido no supera los 2MB
                    if ($data['picture']['size'] <= 2000000) {
                        $img = true;
                    } else {
                        $lprocesaFormulario = false;
                        $data['msjErrorImagen'] = "* La imagen no puede superar los 2MB";
                    }
                } else {
                    $lprocesaFormulario = false;
                    $data['msjErrorImagen'] = "* El archivo subido no es una imagen";
                }
            }
        }

        // Como meter la imagen en la maquina virtual recordar permisos
        if ($img){
            // Subo la imagen
            $nombre = $data['picture']['name'];
            // Obtengo la extension de la imagen
            $ext = explode(".", $nombre);
            $name = end($ext);
            // Generamos un nombre para la imagen al azar
            $data['picture']['name'] = uniqid() . "." . $name;
            // Movemos el archivo a la carpeta de imágenes
            move_uploaded_file($data['picture']['tmp_name'], dirname(__DIR__, 2) . '/public/img/' . $data['picture']['name']);
        } else{
            // Movemos el archivo a la carpeta de imágenes
            move_uploaded_file($data['picture'], dirname(__DIR__, 2) . '/public/img/' . $data['picture']);
        }
        
        // Generación de token
        $rb = random_bytes(32);
        $token = base64_encode($rb);
        $secureToken = uniqid("",true) . $token;
?>
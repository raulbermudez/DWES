<?php
$countryCode = "";
$texto = "";
// 1. Obtener el código del país desde la URL
if (isset($_POST['enviar'])){
    $countryCode = $_POST['pais'];
    // 2. Construir el mensaje SOAP utilizando la sintaxis heredoc
    $msgSoap = <<<EOD
    <?xml version="1.0" encoding="utf-8"?>
    <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
      <soap:Body>
        <CountryFlag xmlns="http://www.oorsprong.org/websamples.countryinfo">
          <sCountryISOCode>{$countryCode}</sCountryISOCode>
        </CountryFlag>
      </soap:Body>
    </soap:Envelope>
    EOD;
    
    // 3. Configurar cURL
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $msgSoap,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: text/xml; charset=utf-8',
        )
    ));
    
    // 4. Ejecutar y cerrar cURL
    $response = curl_exec($curl);
    curl_close($curl);
    // 5. Verificar y extraer la respuesta utilizando preg_match
    $matches = [];
    // preg_match('/<m:countryflagresult>([a-zA-Z0-9]+\.jpg)<\/m:countryflagresult>/', $response, $matches);
    // Hago esto porque no me funciona el patron
    $matches = $response;
    $match = explode("<m:", $matches);
    $match_final = explode(">", $match[2]);
    $_match_final = explode("<", $match_final[1]);
}



if (!empty($matches)) {
    $flagUrl = $_match_final[0]; // La URL de la bandera
    $texto = "La URL de la bandera del país {$countryCode} es: <img src='{$flagUrl}' alt='Bandera'>";
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body{
            background-color: aliceblue;
        }
    </style>
</head>
<body>
    <h1>Formulario para obtener la bandera de un pais</h1>
    <a href="https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes">Para ver los códigos de los paises</a>
    <form action="ej2.php" method="post">
        <label for="pais">Introduce el código del país:</label>
        <input type="text" name="pais" id="pais">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <p> <?php echo $texto ?></p>
</html>
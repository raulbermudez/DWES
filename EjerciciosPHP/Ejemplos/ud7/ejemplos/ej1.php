<?php
//1. Carga en dos variables los valores enviados por la URL
$n1= $_GET['x'];
$n2= $_GET['y'];

/*2. Carga en una variable una cadena de caracteres con el fichero XML
que se debe enviar.
http://www.dneonline.com/calculator.asmx?op=Add
Utiliza sintaxis heredoc para facilitar la escritura.*/
$msgSoap = <<<EOD
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Body>
        <Add xmlns="http://tempuri.org/">
            <intA>{$n1}</intA>
            <intB>{$n2}</intB>
        </Add>
    </soap:Body>
</soap:Envelope>
EOD;

// 3. Inicia curl
$curl = curl_init();
/*4
Crea un array de configuración para curl:
url del servicio, http://www.dneonline.com/calculator.asmx?WSDL'
RETURNTRANSFER, true.
HTTP_VERSION, 1.1
CUSTOMREQUEST, POST
POSTFIELDS, Variable con fichero xml.
HTTPHEADER, text/xml y juego de caracteres 7tf-8
*/
curl_setopt_array($curl,array(
  CURLOPT_URL => 'http://www.dneonline.com/calculator.asmx?WSDL',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $msgSoap,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: text/xml; charset=utf-8'
    )
  )
);
//5. Ejecuta y cierra curl.
$response = curl_exec($curl);
curl_close($curl);

/*6. Utiliza preg_match para localizar el resultado en la respuesta.
http://www.dneonline.com/calculator.asmx?op=Add */
$matches = [];
preg_match('/<AddResult>([0-9]+)<\/AddResult>/', $response, $matches);
//7. Muestra el resultado.
echo "La suma de $n1 y $n2 es: ".$matches[0].PHP_EOL;
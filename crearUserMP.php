<?php
$token = "TEST-181595053512370-092320-5c38f9a28ce53854173af7a4884129a8-97877100";
$url = "https://api.mercadolibre.com/users/test_user?access_token=$token";
$vars =  "{\"site_id\":\"MLA\"}";

echo(enviar($vars, $url));



function enviar($parametrospost,$urlpost)
{

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $urlpost);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $parametrospost);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $respuesta = trim(curl_exec($curl));
    curl_close($curl);

    return $respuesta ;
}



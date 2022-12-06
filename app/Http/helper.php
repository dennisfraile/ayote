<?php
function getToken($appID, $apisecret)
{
    $appID= 'f78c7fe4-9989-4e7a-a2b8-ee24cf8857c0';
    $apisecret = '6a0cf79a-dc0f-41dd-b1e5-ede29de67509';
    $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://id.wompi.sv/connect/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "grant_type=client_credentials&client_id=".$appID."&client_secret=".$apisecret."&audience=wompi_api",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } 
        
        $array= json_decode($response,true);
        return $array;
}

function getDataApi($url, $token)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "authorization: Bearer ".$token['access_token'],
            "content-type: application/json"
        ),
        ));

        $t = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } 
        $transacciones = json_decode($t,true);
        
        $resultados = $transacciones['resultado'];
        
        return $resultados;
}
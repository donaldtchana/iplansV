<?php
require_once "./include/config.php";

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => COURRIER_API_URL,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
]);

$response = curl_exec($curl);
$err = curl_error($curl);
$data = [];

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
    exit;
}
$d = json_decode($response, true);
$data['num'] = count($d);
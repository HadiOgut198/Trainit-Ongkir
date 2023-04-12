<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: b84cc0429a3b00c6e8051c01ffb7e090"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $array_response = json_decode($response, TRUE);
    $data_provinsi = $array_response['rajaongkir']['results'];
    // echo "<pre>";
    // print_r($data_provinsi);
    // echo "</pre>";
    echo "<option selected>-- Pilih Provinsi --</option>";
    foreach ($data_provinsi as $key => $tiap_provinsi) {
        echo "<option value='" . $tiap_provinsi["province_id"] . "' id_provinsi='" . $tiap_provinsi["province_id"] . "' >";
        echo $tiap_provinsi["province"];
        echo "</option>";
    }
}

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://b9b5-118-70-129-173.ap.ngrok.io',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "action_type": "update",
  "data_type": "device",
  "date": "2023-03-10 11:14:40",
  "deviceID": "H2246HV0046",
  "deviceName": "Văn_Phòng_MTT",

}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Authorization',
    'Content-Type: text/plain'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

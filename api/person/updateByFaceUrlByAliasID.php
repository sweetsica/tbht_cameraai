<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.hanet.ai/person/updateByFaceUrlByAliasID',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('token' => '<ACCESS_TOKEN>','url' => '<url>','aliasID' => '<aliasID>','placeID' => '<placeID>'),CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

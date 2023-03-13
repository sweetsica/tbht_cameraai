<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.hanet.ai/person/updateByFaceImage',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('token' => '<ACCESS_TOKEN>','file[]'=> new CURLFILE('/C:/Users/hoang/Desktop/Nha/2020-12-18-05-26-03.jpg'),'aliasID' => '<aliasID>','placeID' => '<placeID>','' => ''),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

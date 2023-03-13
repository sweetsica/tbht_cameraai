<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.hanet.ai/person/updateByFaceImageByAliasID',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('token' => '<ACCESS_TOKEN>','file[]'=> new CURLFILE('/D:/8-2021-10-01-10-09-00.jpg'),'aliasID' => '<aliasID>','placeID' => '<placeID>'),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

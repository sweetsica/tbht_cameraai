<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://oauth.hanet.com/oauth2/authorize?response_type=code&client_id=%3CCLIENT_ID%3E&redirect_uri=%3CURL%3E&scope=full',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HEADER=>true,
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Content-Type: application/x-www-form-urlencoded',
  ),
  CURLOPT_POSTFIELDS => '',
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

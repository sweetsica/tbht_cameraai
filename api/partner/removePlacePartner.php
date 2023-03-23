<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.hanet.ai/partner/removePlacePartner',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'access_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjE3NjcyNzkxNzExMTI3NTUyMDAiLCJlbWFpbCI6Im5odWh0a0BoYW5ldC5jb20iLCJjbGllbnRfaWQiOiJmMjJlMTVlMWNkNjA2YzAxNGY5ZmQxNDE3ZTZiNDI3YyIsInR5cGUiOiJhdXRob3JpemF0aW9uX2NvZGUiLCJpYXQiOjE2Njc4MDkwMTcsImV4cCI6MTY5OTM0NTAxN30.uEuMOrIqKBq3zyZ5MJTA-44bJC-jXUMDzIYdQymWtjc&placeID=15835',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

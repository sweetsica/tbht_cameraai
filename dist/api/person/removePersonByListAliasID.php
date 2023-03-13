<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.hanet.ai/person/removePersonByListAliasID',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjUzOTI0ODYzNTE2NzcxMzg4NzUiLCJlbWFpbCI6ImJhb25uQGRvcHBlbGhlcnoudm4iLCJjbGllbnRfaWQiOiIyNzljMGI2YTgyN2RkY2NmY2U0YWU1MmNmODBiNWUxYiIsInR5cGUiOiJhdXRob3JpemF0aW9uX2NvZGUiLCJpYXQiOjE2Nzc0NjM0NTgsImV4cCI6MTcwODk5OTQ1OH0.CI8FAWpgGZktTeSjsXfCJ9L59A-xH7-IcOGXjYgAH3Q&aliasIDs=%3CaliasID1%3E%2C%3CaliasID2%3E%2C%3CaliasID3%3E%2C...&placeIDs=%3CplaceID1%3E%2C%3CplaceID2%3E%2C%3CplaceID3%3E%2C....',CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

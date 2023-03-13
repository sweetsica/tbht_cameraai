
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date=date('Y-m-d');
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.hanet.ai/person/getCheckinByPlaceIdInDay',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'token='.$_COOKIE['accesstoken'].'&placeID=15835&date='.$date.'&devices=H2246HV0046&type=0%2C1',
  CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data=json_decode($response,true);
return $data;

?>

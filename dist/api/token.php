<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://oauth.hanet.com/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'code='.$_GET['code'].'&client_id=279c0b6a827ddccfce4ae52cf80b5e1b&client_secret=c9ad30718c388f1a809e05800f799954',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded','Cookie: user_sid=s%3Az--UBEP9_F-wQOWdO_7QqN1qtom-GkB7.M5vHVLrE24eTfoSk%2FmFjXd7udTOBoOg6VyGjg9dU42Y'
  ),
));

$response = curl_exec($curl);

curl_close($curl);


$data=json_decode($response,true);
$x='';
if(!isset($_COOKIE['accesstoken'])){
  setcookie('accesstoken', $data['access_token'], time()+3600);
  setcookie('code', $_GET['code'], time()+3600);
  // echo "<script>sessionStorage.setItem('accesstoken', '".$data['access_token']."');</script>";
}
else{
}
?>
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
// Set the timezone to your local timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Get the current time in milliseconds
$current_time = round(microtime(true) * 1000);

// Get the time of the end of the day in milliseconds
$end_of_day_time = strtotime('today 23:59:59') * 1000;

// Calculate the remaining time in milliseconds
$remaining_time = $end_of_day_time - $current_time;

// Print the remaining time

  setcookie('accesstoken', $data['access_token'], time()+$remaining_time);
  setcookie('code', $_GET['code'], time()+$remaining_time);
  // echo "<script>sessionStorage.setItem('accesstoken', '".$data['access_token']."');</script>";
}
else{
}
?>
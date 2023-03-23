<?php
// session_start();
// if(!isset($_GET['code'])){
//       if(!isset($_COOKIE['accesstoken'])){
//             header('Location: ../login.php');
//             exit;
//       }
//       else{

//       }
// }
// elseif(!isset($_COOKIE['accesstoken'])){
//     echo "<script>sessionStorage.setItem('login', '1');</script>";
//     header("location: ../../api/token.php");
// }
// elseif(isset($_GET['code'])!=null){
//     header("location: index.php");
// }
// else{

// }
// Set the timezone to your local timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Get the current time in milliseconds
$current_time = round(microtime(true) * 1000);

// Get the time of the end of the day in milliseconds
$end_of_day_time = strtotime('today 23:59:59') * 1000;

// Calculate the remaining time in milliseconds
$remaining_time = $end_of_day_time - $current_time;

// Print the remaining time
  setcookie('code', $_GET['code'], time()+$remaining_time);
  header("Location: ../index.php");
?>
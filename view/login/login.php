<?php
session_start();
if(!isset($_COOKIE['code'])){
      if(!isset($_COOKIE['accesstoken'])){
            header('Location: ../login.php');
            exit;
      }
      else{

      }
}
elseif(!isset($_COOKIE['accesstoken'])){
    echo "<script>sessionStorage.setItem('login', '1');</script>";
      include 'http://dothominhhong.com/api/token.php';
}
else{

}

?>

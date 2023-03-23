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
      include 'http://huma_new.test:8081/api/token.php';
}
else{

}

?>

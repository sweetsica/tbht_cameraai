<?php
session_status();
if(!isset($_GET['code'])){
        header('Location: login.php');
        echo 'ok';
        exit;
}
if(!isset($_SESSION['access_token'])){
    echo "<script>sessionStorage.setItem('code', '".$_GET['code']."');</script>";
    header('Location: api/token.php');
}
else{
}
?>

<?php
session_start();
include '../function/sql.php';
include '../function/function.php';
$l=$_SESSION['code'];
if($_SESSION['cole']==null){
    header("http://huma_new.test:8081/login.php");
}
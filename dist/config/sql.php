<?php

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'cam_ai';

$conn=mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("Không thể kết nối tới cơ sở dữ liệu");
if($conn){
    mysqli_query($conn,"SET NAMES 'utf8'");
}else{
    echo "Bạn đã kết nối thất bại".mysqli_connect_error();
}

?>

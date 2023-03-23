<?php
// Gửi dữ liệu tới API
$n='';
$address='';
if($_POST['address_company']==null){
  $address='219 Trung Kính';
}
else{
  $address=$_POST['address_company'];
}


// Lấy dữ liệu từ form

$user=$_POST["name_company"];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.hanet.ai/place/addPlace',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'token='.$_COOKIE['accesstoken'].'&name='.$user.'&address='.$address.'',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
$data=json_decode($response,true);
$id = $data['data']['id'];
// Kết nối tới cơ sở dữ liệu
include "../../config/sql.php";
include "../../config/function.php";

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Chèn dữ liệu vào bảng "customers"
$sql = "INSERT INTO `cam_ai`.`company` 
(`id`, `name_company`,`level`) 
 VALUES (".$id.",'".$user."',0)";
                                            

if ($conn->query($sql) === TRUE) {
    echo "Lưu thành công tên company";
    header('Location: ../../more_launch.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error; 
}




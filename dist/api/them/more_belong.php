<?php
// Kết nối tới cơ sở dữ liệu
include "../../config/sql.php";
include "../../config/function.php";

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$ten = $_POST["ten2"];
$phong=$_POST["ban2"];
// Chèn dữ liệu vào bảng "customers"
$sql = "INSERT INTO `cam_ai`.`belong` 
(`id`, `id_staff`,`id_room`) 
 VALUES (NULL ,'".$ten."','".$phong."')";
if ($conn->query($sql) === TRUE) {
    echo "Lưu thành công tên vào phòng ban";
    header("dist/more_staff_room.php");

} else {
  echo "Error: " . $sql . "<br>" . $conn->error; 
}

// Gửi dữ liệu tới API
$data = array(
'id_ten'=>$ten,
'id_phong'=>$phong,
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://huma_new.test:8081/dist/api/them/more_room.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => http_build_query($data),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer <api_key>",
    "Content-Type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$conn->close();
?>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.hanet.ai/device/get-list-device-by-place',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'token='.$_COOKIE['accesstoken'].'&placeID='.$_GET['mb'].'',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));
$kq='';
$response = curl_exec($curl);
$data=json_decode($response,true);
curl_close($curl);
include_once '../../config/sql.php';
include_once '../../config/function.php';
foreach ($data['data'] as $item) {
    $id = $item['deviceID'];
    $name = $item['deviceName'];

    // Kiểm tra trùng lặp dữ liệu
    $sql = "SELECT * FROM `room` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Nếu tồn tại, thực hiện câu lệnh cập nhật
        $sql = "SELECT * FROM `room` WHERE `name_room` = '$name'";
        $result1 = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result1) > 0) {
            $kq .= 'kết quả đã tồn tại ' . $id . '';
        } else {
            $sql = "UPDATE `company` SET `name_room` = '$name' WHERE `id` = '$id'";
            if( mysqli_query($conn, $sql)){
                $kq .= 'Đã sửa thành công ' . $id . '';
            }
            else{
                $kq .= 'Sửa đã có lỗi ' . $id . '';

            }

        }
    } 
    else {
        // Nếu không tồn tại, thực hiện câu lệnh thêm mới
        $sql = "INSERT INTO `room` (`id`, `name_room`,`id_company`, `level`) VALUES ('$id', '$name',".$_GET['mb'].", 1)";

        if (mysqli_query($conn, $sql)) {
            $kq .= 'Đã thêm mới thành công ' . $id . '';
        } else {
            $kq .= 'kết quả thêm mới có lỗi tại ' . $id . '';
        }
    }
}
echo $kq;
header('Location: http://huma_new.test:8081/dist/company_launch.php?mb='.$_GET['mb'].'&id=""');


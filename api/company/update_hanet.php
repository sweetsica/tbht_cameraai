<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.hanet.ai/place/getPlaces',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'token='.$_COOKIE['accesstoken'].'',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);
$data=json_decode($response,true);
curl_close($curl);
include_once '../../config/sql.php';
include_once '../../config/function.php';
foreach ($data['data'] as $item) {
    $id = $item['id'];
    $name = $item['name'];

    // Kiểm tra trùng lặp dữ liệu
    $sql = "SELECT * FROM `company` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Nếu tồn tại, thực hiện câu lệnh cập nhật
        $sql = "UPDATE `company` SET `name_company` = '$name' WHERE `id` = '$id'";
        if (mysqli_query($conn, $sql)) {
            $kq .= 'Đã sửa thành công ' . $id . '';
        } else {
            $kq .= 'kết quả sửa có lỗi tại ' . $id . '';
        }
    } else {
        // Nếu không tồn tại, thực hiện câu lệnh thêm mới
        $sql = "INSERT INTO `company` (`id`, `name_company`, `level`) VALUES ('$id', '$name', 0)";
        if (mysqli_query($conn, $sql)) {
            $kq .= 'Đã thêm mới thành công ' . $id . '';
        } else {
            $kq .= 'kết quả thêm mới có lỗi tại ' . $id . '';
        }
    }
}

header('Location: ../../more_launch.php');


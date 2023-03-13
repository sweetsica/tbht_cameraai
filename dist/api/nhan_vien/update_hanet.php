<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.hanet.ai/person/getListByPlace',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'token='.$_COOKIE['accesstoken'].'&placeID=15835&type=-1&page=1&size=100',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);
$data=json_decode($response,true);
curl_close($curl);
include_once '../../config/sql.php';
include_once '../../config/function.php';
date_default_timezone_set("Asia/Ho_Chi_Minh");
$day= date('Y-m-d');
foreach ($data['data'] as $item) {
    $id = $item['personID'];
    $name = $item['name'];
    $name_parts = explode(" ", $name); // Tách tên thành các phần từ
    $kitu_ten = "";
    foreach ($name_parts as $part) {
    $kitu_ten .= substr($part, 0, 1); // Lấy ký tự đầu tiên của mỗi phần từ
    }
    $kitu_ten = strtolower($kitu_ten); // Viết hoa các ký tự
    $so_cuoi = substr($id, -4); // Lấy 4 ký tự cuối
    $email=$kitu_ten.$so_cuoi.'@gmail.com';
    // Kiểm tra trùng lặp dữ liệu
    $sql = "SELECT * FROM `user` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Nếu tồn tại, thực hiện câu lệnh cập nhật
        $sql = "UPDATE `user` SET `fullname` = '$name', `email`='$email',``WHERE `id` = '$id'";
        if (mysqli_query($conn, $sql)) {
            $kq .= 'Đã sửa thành công ' . $id . '';
        } else {
            $kq .= 'kết quả sửa có lỗi tại ' . $id . '';
        }
    } else {
        // Nếu không tồn tại, thực hiện câu lệnh thêm mới
        $sql = "INSERT INTO `cam_ai`.`user` (`id`,`fullname`, `email`, `date_birth`, `date_job_receive`, `status`,`role`) VALUES ('$id','$name', '$email', '$day', '$day', 'Đang làm','Nhân viên');";
        if (mysqli_query($conn, $sql)) {
            $kq .= 'Đã thêm mới thành công ' . $id . '';
        } else {
            $kq .= 'kết quả thêm mới có lỗi tại ' . $id . '';
        }
    }
}

header('Location: ../../more_staff.php');
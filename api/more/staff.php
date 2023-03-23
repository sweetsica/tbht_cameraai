<?php
// Kết nối tới cơ sở dữ liệu
include "../../config/sql.php";
include "../../config/function.php";

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ form

$selected_numbers = $_POST['list_room'];
var_dump($selected_numbers);

$id = $_POST["id"];
$user=$_POST["user"];
$email = $_POST["email"];
$date_birth = $_POST["year"];
$date_job_receive = $_POST["day_vao"];
$role = $_POST["role"];
if($role==1){
    $role="Admin";
}
elseif($role==2){
    $role="Quản lý";
}
else{
    $role="Nhân viên";
}

// Chèn dữ liệu vào bảng "customers"
$sql = "INSERT INTO `cam_ai`.`user` 
(`id`, `fullname`,`email`,`date_birth`, `date_job_receive`, `status`,`role`) 
 VALUES ('".$id."', '".$user."','".$email."','".$date_birth."', '".$date_job_receive."', 'Đang Làm','".$role."')";
                                            


// kiêm tra file 
  $ten_file = $_FILES['image']['name'];
  $duong_dan_tam = $_FILES['image']['tmp_name'];
  $loai_file = $_FILES['image']['type'];
  
  // Kiểm tra xem tệp tin có phải là ảnh không
  if($loai_file == "image/jpeg" || $loai_file == "image/png"||$loai_file=="image/jpg") {
    // Chuyển đổi tên file thành chữ in hoa
    $ten_file = strtoupper(pathinfo($ten_file, PATHINFO_FILENAME)) . "." . pathinfo($ten_file, PATHINFO_EXTENSION);
    
    // Thay đổi kích thước ảnh và lưu vào thư mục 1280x738 pixels
    $duong_dan_thu_muc = "../../view/img/";

    $duong_dan_tep_tin = $duong_dan_thu_muc . $ten_file;
    list($chieu_rong, $chieu_cao) = getimagesize($duong_dan_tam);
    $chieu_rong_moi = 1280;
    $chieu_cao_moi = 738;
    $anh_p = imagecreatetruecolor($chieu_rong_moi, $chieu_cao_moi);
    if($loai_file == "image/jpeg"||$loai_file == "image/png"||$loai_file=="image/jpg") {
      $anh = imagecreatefromjpeg($duong_dan_tam);
    } else {
      $anh = imagecreatefrompng($duong_dan_tam);
    }
    imagecopyresampled($anh_p, $anh, 0, 0, 0, 0, $chieu_rong_moi, $chieu_cao_moi, $chieu_rong, $chieu_cao);
    if($loai_file == "image/jpeg"||$loai_file == "image/png"||$loai_file=="image/jpg") {
      imagejpeg($anh_p, $duong_dan_tep_tin, 100);
    } else {
      imagepng($anh_p, $duong_dan_tep_tin, 0);
    }
    imagedestroy($anh_p);
    echo "Tệp tin đã được cập nhật thành công.";
  } 
  else {
    echo "Loại tệp tin không hợp lệ. Vui lòng tải lên ảnh JPG hoặc PNG.";
  }
  // var_dump( $duong_dan_tep_tin1);
  // var_dump("D:/laragon/www/huma_new/dist".$duong_dan_tep_tin1);

// // Gửi dữ liệu tới API
// $data = array(
// 'id'=>$id,
// 'user'=>$user,
// 'email'=>$email,
// 'date_birth'=>$date_birth,
// 'date_job_receive'=>$date_job_receive,
// 'vai_tr'=>$role,
// );


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.hanet.ai/person/register',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjUzOTI0ODYzNTE2NzcxMzg4NzUiLCJlbWFpbCI6ImJhb25uQGRvcHBlbGhlcnoudm4iLCJjbGllbnRfaWQiOiIyNzljMGI2YTgyN2RkY2NmY2U0YWU1MmNmODBiNWUxYiIsInR5cGUiOiJhdXRob3JpemF0aW9uX2NvZGUiLCJpYXQiOjE2Nzc0NjM0NTgsImV4cCI6MTcwODk5OTQ1OH0.CI8FAWpgGZktTeSjsXfCJ9L59A-xH7-IcOGXjYgAH3Q','name' => ''.$user.'','file'=> new CURLFILE('../../view/img/'.$ten_file.''),'aliasID' => ''.$id.'','placeID' => '15835','title' => ''.$role.'','type' => '0'),

));

$response = curl_exec($curl);


curl_close($curl);
echo $response;
//sql
if ($conn->query($sql) === TRUE) {
  foreach ($selected_numbers as $number) {
      $sql_thuoc="INSERT INTO belong(id,id_staff,id_room) VALUES (NULL,$id,$number);";    
      if($conn->query($sql_thuoc)===true){
           echo "lưu đã thành công<br>"; 
      } 
      echo "Selected number: $number\n";
  }
  echo "Lưu thành công tên";
  header("http://huma_new.test:8081/view/more_staff.php");

} else {
echo "Error: " . $sql . "<br>" . $conn->error; 
}
header("http://huma_new.test:8081/view/more_staff.php");
$conn->close();
?>

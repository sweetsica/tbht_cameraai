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
  CURLOPT_POSTFIELDS => 'token='.$_COOKIE['accesstoken'].'&placeID=15835&type=-1',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data=json_decode($response,true);
include_once '../../config/sql.php';
include_once '../../config/function.php';
foreach ($data['data'] as $item) {
    $id_room = $item['placeID'];
    var_dump($id_room);
    $id_staff=$item['personID'];
    $name = $item['name'];
    //kiêm tra ban phòng 
    $sql0='select * from`cam_ai`.`room`where `id_company`='.$id_room.'';

   $query =mysqli_query($conn,$sql0);
   // trả r kết quả tồn tại hay chưa 
    if(mysqli_num_rows($query)>0){
        while($row=mysqli_fetch_assoc($query)){
            $sql1="select * from belong where `id_staff`='".$id_staff."'and `id_room`='".$row['id']."'";
            // đã tồn tại kiên kết chưa
            $query1=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($query1)>0){
                $kq.=$id_staff."đã tồn tại với ".$row['id'];
            }
            else{
                // update vào bảng belong
              $sql2="INSERT INTO `cam_ai`.`belong` (`id_staff`, `id_room`) VALUES ('".$id_staff."', '".$row['id']."');";  
              if (mysqli_query($conn, $sql2)) {
                $kq .= 'Đã sửa thành công ' . $id_staff . '';
            } else {
                $kq .= 'kết quả sửa có lỗi tại ' . $id_staff . '';
            }
            }

        }
    }
    else{
        echo "lỗi trên cơ sở dữ liệu hệ thống có có phòng ban này";
    }
}

header('Location: ../../more_launch.php');


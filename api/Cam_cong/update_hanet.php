
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date=date('Y-m-d');
 $x=include '../person/getCheckinByPlaceIdInDay.php';
 include '../../config/sql.php';
 $kq="";
 $personNames = array_unique(array_column($x['data'], 'personName'));
 foreach ($personNames as $personName) {
     // Lọc các phần tử có personName tương ứng
     $filteredData = array_filter($x['data'], function ($item) use ($personName) {
         return $item['personName'] == $personName;
     });
     
     // Trích xuất các giá trị date, place, deviceID và checkinTime
     $avatar=array_column($filteredData, 'avatar');
     $dates = array_column($filteredData, 'date');
     $places = array_column($filteredData, 'place');
     $deviceIDs = array_column($filteredData, 'deviceID');
     $checkinTimes = array_column($filteredData, 'checkinTime');
     $personID=array_column($filteredData, 'personID');
     $type=array_column($filteredData, 'type');
     $vai_tro=($type==0)?"Khách Hàng":"Nhân Viên";
     // Tìm max và min
     $max = max($checkinTimes);
     $min = min($checkinTimes);
     $di_den=(date('H:i:s', $min / 1000)>'08:00:00')?"e91e63":"8bc34a";
     $di_ve=(date('H:i:s', $max / 1000)<'17:00:00')?"e91e63":"8bc34a";
     $sql="select l.id from belong as l
     left join user as u on u.id=l.id_staff
     left join room as r on r.id=l.id_room
     where id_staff='".$personID[0]."' and id_room='".$deviceID[0]."'";
     if($query=mysqli_query($conn,$sql)){
        while($row =mysqli_fetch_assoc($query)){
        $sql1="Select * from timekeeping where date=".$date." and id_belong=".$row['id']."";
        $query1=mysqli_query($conn,$sql1);
        if($query1>0){
            $sql3="UPDATE `cam_ai`.`timekeeping` SET `time_out`='".$max."' WHERE  `id`=55;";
            if(mysqli_query($conn,$sql3)){
                $kq.= $date."lúc".$max."insert thành công";
            }
            else{
                $kq.= $date."lúc".$max."insert thất bại";
            }
        }
        else{
            // Tạo đối tượng DateTime cho thời điểm đầu tiên
            $start_time = new DateTime('08:00:00');

            // Tạo đối tượng DateTime cho thời điểm thứ hai
            $end_time = new DateTime($min);

            // Tính toán khoảng thời gian giữa hai thời điểm
            $time_diff = $start_time->diff($end_time);

            // In ra khoảng thời gian dưới định dạng H:i:s
            $time=$time_diff->format('%H:%i:%s');
            $text=($min>"08:00:00")?"-":"+";
            $sql2="INSERT INTO `cam_ai`.`timekeeping` (`date`, `time_now`, `time_out`, `role`, `id_belong`) VALUES ('".$date."', '".$min."', '".$max."', '".$text."".$time."', '".$row['id']."');";
            if(mysqli_query($conn,$sql2)){
                $kq.= $date."lúc".$min."insert thành công";
            }
            else{
                $kq.= $date."lúc".$min."insert thất bại";
            }
        }    
    }
     }
    }
?>
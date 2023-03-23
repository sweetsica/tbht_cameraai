<?php
class time_one_people{
    private $conn;
    public function __construct($db)
    {
        $this->conn=$db;
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    } 
    public function uesr_people(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://partner.hanet.ai/person/getUserInfoByPersonID',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'token='.$_COOKIE['accesstoken'].'&personID='.$_GET['id'].'',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response;
        
    }
    public function getCheckinByPlaceIdInTimestamp($begin,$end){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://partner.hanet.ai/person/getCheckinByPlaceIdInTimestamp',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'token='.$_COOKIE['accesstoken'].'&placeID=15835&from='.$begin.'&to='.$end.'&type=0%2C1&personID='.$_GET['id'].'',
            CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
            ),
            ));
    
            $response = curl_exec($curl);
    
            curl_close($curl);
            $response;
            $data=json_decode($response,true);
            return $data;
    }
    public function time_people_end($timezone){
        // lấy ra 23h59 hôm nya
        $now = new DateTime('now', $timezone);
        $midnight = new DateTime('tomorrow', $timezone);
        $midnight->setTime(0, 0, 0);
        $interval = $midnight->getTimestamp() - $now->getTimestamp();
        $before_midnight = new DateTime('@' . ($now->getTimestamp() + $interval - 1));
        $before_midnight->setTimezone($timezone);
        $time_end=$before_midnight->format('H:i:s d/m/Y');
        $date_end =$time_end;
        $date_object_end = DateTime::createFromFormat('H:i:s d/m/Y', $date_end);
        $end = $date_object_end->getTimestamp() * 1000;
        return $end;
    }
    public function time_people_begin($timezone){
          // lay ra 00h01 nay hôm náy
          $date_0h00 = new DateTime('now', $timezone);
          $date_0h00->setTime(0, 0);
          $time_begin= $date_0h00->format('H:i:s d/m/Y');
        // chuyển sang mil giaay
        $date_begin =$time_begin;
        $date_object_begin = DateTime::createFromFormat('H:i:s d/m/Y', $date_begin);
        $begin = $date_object_begin->getTimestamp() * 1000;
        return $begin;
    }
    public function time_people_begin1($begin1){
        $dateString = '00:00:00 '.$begin1.'';
        $dateObject = date_create_from_format('H:i:s Y/m/d', $dateString);
        $timestamp = $dateObject->getTimestamp();
        $milliseconds = $timestamp * 1000;
        return $milliseconds;
    }
    public function time_people_end1($end1){
        $dateString = '00:00:00 '.$end1.'';
        $dateObject = date_create_from_format('H:i:s Y/m/d', $dateString);
        $timestamp = $dateObject->getTimestamp();
        $milliseconds = $timestamp * 1000;
        return $milliseconds;
    }
    public function bang_one_people($data,$timezone){   
        $i=0;
        if($data['data']==null){
            echo 'Không có lịch ngày hôm ý';
        }  
        else{
        foreach($data['data'] as $item ){
            $i++;
            echo'
            <tr>
            <td>'.$i.'</td>
            <td><div class="avatar avatar-sm mr-3">
                        <img src="'.$item['avatar'].'" alt="Avatar" class="avatar-img rounded-circle">
                    </div></td>
            <td>
                <div class="media align-items-center">
                    <div class="media-body">
                        <strong class="js-lists-values-employee-name">'.$item['place'].'</strong>
                    </div>
                </div>
            </td>
            <td>
            <div class="media align-items-center">
                    <div class="media-body">
                        <strong class="js-lists-values-employee-name">';
                        $timestamp = $item['checkinTime']/1000; // chuyển đổi từ millisecond sang second
                        $local_time = new DateTime("@$timestamp"); // khởi tạo đối tượng DateTime từ Unix Timestamp
                        $local_time->setTimezone($timezone);
                        if($i%2!=0){
                            echo '<p style="color:blue">'.$local_time->format('H:i:s').'</p>';
                        }
                        else{
                            echo '<p style="color:red">'.$local_time->format('H:i:s').'</p>';
                        }
                        echo'</strong>
                    </div>
                </div>
            </td>
        </tr>
        ';}
        } 
    }
}
?>
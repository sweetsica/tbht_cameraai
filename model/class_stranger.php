
<?php
class stranger{
  public function data(){

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date=date('Y-m-d');
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://partner.hanet.ai/person/getCheckinByPlaceIdInDay',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => 'token='.$_COOKIE['accesstoken'].'&placeID=15835&date='.$date.'&devices=H2246HV0046&type=2',
      CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    $data=json_decode($response,true);
    return $data;
  }
  public function board_stranger($data){
    
    if($data['data']==null){
      echo 'Không có lịch ngày hôm ý';
  }
    else{
      foreach($data['data']as $item){
        echo '
        <div class="col-sm-6 col-md-2">
                                <div class="card posts-card-popular">
                                   <a href="'.$item['avatar'].'"> <img src="'.$item['avatar'].'"
                                         alt=""
                                         class="card-img">
                                    <div class="posts-card-popular__content color_time">
                                        <div class="posts-card-popular__title card-body color_time">
                                            <small class="text-muted text-uppercase color_time">';
                                            $timestamp = $item['checkinTime']/ 1000; // chuyển đổi từ millisecond sang second
                                            $local_time = new DateTime("@$timestamp"); // khởi tạo đối tượng DateTime từ Unix Timestamp
                                            $local_time->setTimezone(new DateTimeZone('Asia/Ho_Chi_Minh')); // chuyển đổi sang múi giờ địa phương, ở đây là múi giờ GMT+7

                                            echo $local_time->format('H:i:s');
                                            echo '</small>
                                            <h4 class="card-title m-0"><a href="">'.$item['place'].'</a></h4>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
        ';
      }
    } 
  }
}

?>

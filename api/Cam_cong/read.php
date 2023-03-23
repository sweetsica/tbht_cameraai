<?php
    header('Acces-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    include_once('../../config/db.php');
    include_once('../../model/timekeeping.php');

    $db=new db();
    $connect=$db->connect();
    $timekeeping=new timekeeping($connect);
    $read=$timekeeping->read();
   if(mysqli_num_rows($read)){
    $lich_array=[];
    $lich_array['data']=[];
    while($row=mysqli_fetch_assoc($read)){
        extract($row);
        $lich_item=array(
            'id'=>$id,
            'date'=>$date,
            'time_now'=>$time_now,
            'time_out'=>$time_out,
            'role'=>$role,
            'id_belong'=>$id_belong
        );
    array_push($lich_array['data'],$lich_item);
    }
    echo print_r($lich_array);
   }

?>
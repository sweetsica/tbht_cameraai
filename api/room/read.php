<?php
    header('Acces-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    include_once('../../config/db.php');
    include_once('../../model/room.php');

    $db=new db();
    $connect=$db->connect();
    $room=new room($connect);
    $read=$room->read();
   if(mysqli_num_rows($read)){
    $phong_array=[];
    $phong_array['data']=[];
    while($row=mysqli_fetch_assoc($read)){
        extract($row);
        $phong_item=array(
            'id'=>$mp,
            'name_room'=>$name_room,
            'id_company'=>$id_company,
            'level'=>$level
        );
    array_push($phong_array['data'],$phong_item);
    }
    echo print_r($phong_array);
   }

?>
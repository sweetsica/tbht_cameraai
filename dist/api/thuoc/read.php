<?php
    header('Acces-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    include_once('../../config/db.php');
    include_once('../../model/belong.php');

    $db=new db();
    $connect=$db->connect();
    $belong=new belong($connect);
    $read=$belong->read();
   if(mysqli_num_rows($read)){
    $ban_array=[];
    $ban_array['data']=[];
    while($row=mysqli_fetch_assoc($read)){
        extract($row);
        $ban_item=array(
            'id'=>$id,
            'id_staff'=>$id_staff,
            'id_room'=>$id_room
        );
    array_push($ban_array['data'],$ban_item);
    }
    echo print_r($ban_array);
   }

?>
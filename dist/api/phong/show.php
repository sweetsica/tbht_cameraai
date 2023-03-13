<?php
    header('Acces-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    include_once('../../config/db.php');
    include_once('../../model/room.php');

    $db=new db();
    $connect=$db->connect();
    $room=new room($connect);
    $room->show($_GET['id']);
    $phong_item=array(

            'id'=>$room->id,
            'name_room'=>$room->name_room,
            'id_company'=>$room->id_company,
            'level'=>$room->level
    );
    echo print_r($phong_item);
?>
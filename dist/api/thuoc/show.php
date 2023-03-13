<?php
    header('Acces-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    include_once('../../config/db.php');
    include_once('../../model/belong.php');

    $db=new db();
    $connect=$db->connect();
    $belong=new belong($connect);
    $belong->show($_GET['id']);
    $ban_item=array(

            'id'=>$belong->id,
            'id_staff'=>$belong->id_staff,
            'id_room'=>$belong->id_room
    );
    echo print_r($ban_item);
?>
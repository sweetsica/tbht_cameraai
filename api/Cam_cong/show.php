<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
    include_once('../../config/db.php');
    include_once('../../model/timekeeping.php');

    $db=new db();
    $connect=$db->connect();
    $timekeeping=new timekeeping($connect);
    $timekeeping->show($_GET['id']);
    $lich_item=array(

            'id'=>$timekeeping->id,
            'date'=>$timekeeping->date,
            'time_now'=>$timekeeping->time_now,
            'time_out'=>$timekeeping->time_out,
            'role'=>$timekeeping->role,
            'id_belong'=>$timekeeping->$id_belong
    );
    echo print_r($lich_item);
?>
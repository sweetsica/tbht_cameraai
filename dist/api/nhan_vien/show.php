<?php
    header('Acces-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    include_once('../../config/db.php');
    include_once('../../model/nhanvien.php');

    $db=new db();
    $connect=$db->connect();
    $nhan_vien=new nhanvien($connect);
    $nhan_vien->show($_GET['id']);
    $nhan_vien_item=array(

            'id'=>$nhan_vien->id,
            'title'=>$nhan_vien->fullname,
            'email'=>$nhan_vien->email,
            'date_birth'=>$nhan_vien->date_birth,
            'date_job_receive'=>$nhan_vien->date_job_receive,
            'status'=>$nhan_vien->status
    );
    echo print_r($nhan_vien_item);
?>
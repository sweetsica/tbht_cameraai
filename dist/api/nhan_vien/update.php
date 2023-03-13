<?php
header('Acces-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Acces-Control-Allow-Methods: PUT');
header('Acces-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include_once('../../config/db.php');
include_once('../../model/nhanvien.php');

$db=new db();
$connect=$db->connect();
$nhan_vien=new nhanvien($connect);
$data=json_decode(file_get_contents("php://input"));
$nhan_vien->id=$data->id;
$nhan_vien->fullname=$data->fullname;
$nhan_vien->email=$data->email;
$nhan_vien->date_birth=$data->date_birth;
$nhan_vien->date_job_receive=$data->date_job_receive;
$nhan_vien->status=$data->status;
$nhan_vien->status=$data->role;
if($nhan_vien->update($data->id,$data->fullname,$data->email,$data->date_birth,$data->date_job_receive,$data->status,$data->role)){
    echo json_encode(array('message','Question Update'));
}
else{
    echo json_encode(array('message','Question Not Update'));
}
?>
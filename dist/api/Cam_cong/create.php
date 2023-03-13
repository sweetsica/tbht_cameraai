<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../config/db.php');
include_once('../../model/timekeeping.php');

$db=new db();
$connect=$db->connect();
$timekeeping=new timekeeping($connect);
$data=json_decode(file_get_contents("php://input"));
// $timekeeping->id=$data->id;
$timekeeping->date=$data->date;
$timekeeping->time_now=$data->time_now;
$timekeeping->time_out=$data->time_out;
$timekeeping->role=$data->role;
$timekeeping->id_belong=$data->id_belong;
if($timekeeping->create($data->date,$data->time_now,$data->time_out,$data->role,$data->id_belong)){
    echo json_encode(array('message','Question Created'));
}
else{
    echo json_encode(array('message','Question Not Created'));
}
?>
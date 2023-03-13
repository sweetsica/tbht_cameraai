<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../config/db.php');
include_once('../../model/belong.php');

$db=new db();
$connect=$db->connect();
$belong=new belong($connect);
$data=json_decode(file_get_contents("php://input"));
// $belong->id=$data->id;
$belong->id_staff=$data->id_staff;
$belong->id_room=$data->id_room;
if($belong->create($data->id_staff,$data->id_room)){
    echo json_encode(array('message','Question Created'));
}
else{
    echo json_encode(array('message','Question Not Created'));
}
?>
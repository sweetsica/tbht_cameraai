<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../config/db.php');
include_once('../../model/room.php');

$db=new db();
$connect=$db->connect();
$room=new room($connect);
$data=json_decode(file_get_contents("php://input"));
$room->id=$data->id;

if($room->delete($data->id)){
    echo json_encode(array('message','Question DELETE'));
}
else{
    echo json_encode(array('message','Question Not DELETE'));
}
?>
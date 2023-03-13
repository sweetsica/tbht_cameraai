<?php
header('Acces-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Acces-Control-Allow-Methods: DELETE');
header('Acces-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include_once('../../config/db.php');
include_once('../../model/timekeeping.php');

$db=new db();
$connect=$db->connect();
$timekeeping=new timekeeping($connect);
$data=json_decode(file_get_contents("php://input"));
$timekeeping->id=$data->id;

if($timekeeping->delete($data->id)){
    echo json_encode(array('message','Question DELETE'));
}
else{
    echo json_encode(array('message','Question Not DELETE'));
}
?>
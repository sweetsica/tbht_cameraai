<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../config/db.php');
include_once('../../model/company.php');

$db=new db();
$connect=$db->connect();
$company=new company($connect);
$data=json_decode(file_get_contents("php://input"));
$company->id=$data->id;
$company->name_company=$data->name_company;
if($company->create($data->id,$data->name_company)){
    echo json_encode(array('message','Question Created'));
}
else{
    echo json_encode(array('message','Question Not Created'));
}
?>
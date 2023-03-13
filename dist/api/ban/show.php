<?php
    header('Acces-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    include_once('../../config/db.php');
    include_once('../../model/company.php');

    $db=new db();
    $connect=$db->connect();
    $company=new company($connect);
    $company->show($_GET['id']);
    $ban_item=array(

            'id'=>$company->id,
            'name_company'=>$company->name_company,
            'level'=>$company->level
    );
    echo print_r($ban_item);
?>
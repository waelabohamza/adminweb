<?php

include "../../connect.php";

$arraydatahome = array();

$userid = $_POST['userid'];

$and = null;

$limit = "LIMIT 100";

$data = getAllData("ordersserviceview", "users_id = '$userid'  $and  ORDER BY ordersservice_id DESC  $limit");

if ($data['count'] > 0) {

    $arraydatahome['ordersservice'] = $data['values'];

}else {
    
    $arraydatahome['ordersservice'] = "0" ;

}

$data = getAllData("orderscourseview", "users_id = '$userid'  $and  ORDER BY orderscourse_id DESC  $limit ");


if ($data['count'] > 0) {

    $arraydatahome['orderscourse'] = $data['values'];
}else {
    $arraydatahome['orderscourse'] = "0" ; 
}


echo json_encode($arraydatahome);

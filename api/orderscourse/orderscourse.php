<?php

include "../../connect.php";

$table = "orderscourseview";

$and = null;

$userid = $_POST['userid'] ;  
 
$limit = paginationLimit($_GET['page'] ?? null, 10);

$data = getAllData($table, "1 = '$userid'  $and  $limit");

createJson($data['count'], $data['values']);

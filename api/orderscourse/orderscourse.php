<?php

include "../../connect.php";


$table = "orderscourseview";


$and = null;


$userid = $_POST['userid'];


$limit = paginationLimit($_GET['page'] ?? null, 10);


$data = getAllData($table, "users_id = '$userid'  $and  ORDER BY orderscourse_id DESC  $limit");


createJson($data['count'], $data['values']);

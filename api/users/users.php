<?php
include "../../connect.php";
$table = "users";

$limit = paginationLimit($_GET['page'] ?? null , 10); 

$data = getAllData($table, "1 = 1  $limit ");
if ($data['count'] > 0) {
    echo json_encode($data['values']);
} else {

    zeroCount();
}

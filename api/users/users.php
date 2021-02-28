<?php

include "../../connect.php";

$table = "users" ; 

if (isset($_GET['page'])) {
    $page = $_GET['page'] ; 
    $limit = "LIMIT $page , 10";
} else {
    $limit = null;
}

$data = getAllData($table, "1 = 1  $limit ");

if ($data['count'] > 0) {

    echo json_encode($data['values']);

} else {

    zeroCount();
}

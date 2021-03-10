<?php
include "../../connect.php";

$table = "expertsview";

$and = null;

if (isset($_POST['id'])) {

    $search = $_POST['search'];

    $id = $_POST['id'];

    $and = "AND experts_cat = '$id' ";

    $and .= "AND ( experts_name like '%$search%' OR  experts_name_ar like '%$search%' ) ";
}


$limit = paginationLimit($_GET['page'] ?? null, 10);

$data = getAllData($table, "1 = 1   $and  ");

createJson($data['count'], $data['values']);

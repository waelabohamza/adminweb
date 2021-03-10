<?php
include "../../connect.php";
$table = "questions";

$and = null;

if (isset($_POST['id'])) {

    $search = $_POST['search'];

    $id = $_POST['id'];

    $and = "AND  ( questions_name like '%$search%' OR questions_name_ar  like '%$search%')  ";
}


$limit = paginationLimit($_GET['page'] ?? null, 10);
$data = getAllData($table, "1 = 1  $limit ");
createJson($data['count'], $data['values']);

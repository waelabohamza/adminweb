<?php

include "../../connect.php";

$table = "servciesview";

$and = null;

if (isset($_POST['id'])) {

    $search = $_POST['search'] ; 

    $id = $_POST['id'];

    $and = "AND services_categories = '$id' ";

    $and .= "AND  services_name like '%$search%' " ; 

}



$limit = paginationLimit($_GET['page'] ?? null, 10);

$data = getAllData($table, "1 = 1  $and  $limit");

createJson($data['count'], $data['values']);

<?php

include "../../connect.php";

$table = "servciesview";

$and = null;


$limit = paginationLimit($_GET['page'] ?? null, 1000);

if (isset($_POST['id'])) {  // For  Search Services in page ( services  ) in app  

    $search = $_POST['search'];

    $id = $_POST['id'];

    $and = "AND services_categories = '$id' ";

    $and .= "AND  services_name like '%$search%' ";
}

if (isset($_POST['dropdownsearch'])) {
    $limit = "LIMIT 10000";
}


$data = getAllData($table, "1 = 1  $and  $limit");

createJson($data['count'], $data['values']);

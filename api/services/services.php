<?php

include "../../connect.php";

$table = "servciesview";

$and = null;

$limit = paginationLimit($_GET['page'] ?? null, 1000);

if (isset($_POST['id'])) {  // For  Search Services in page ( services  ) in app  

    $search  = $_POST['search'];

    $id      = $_POST['id'];

    if ($id  == "all") {

        $and  = "AND 2 = 2 ";
    } else {    

        $and     = "AND services_categories = '$id' ";
    }

    $favorite = $_POST['favorite'];

    if ($favorite  == "yes") {
        $and .= "AND services_favorite = 1 ";
    };


    $and     .= "AND  services_name like '%$search%' ";
}

if (isset($_POST['dropdownsearch'])) {

    $limit = "LIMIT 10000";
}

$data = getAllData($table, "1 = 1  $and  $limit");

createJson($data['count'], $data['values']);

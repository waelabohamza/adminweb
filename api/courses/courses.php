<?php

include "../../connect.php";

$table = "coursesview";

$limit = paginationLimit($_GET['page'] ?? null, 10);

$and = null  ; 

if (isset($_POST['id'])) {

    $search = $_POST['search'] ; 

    $id = $_POST['id'];

    $and = "AND courses_type = '$id' ";

    $and .= "AND ( courses_name like '%$search%' OR  courses_name_ar like '%$search%' )" ; 

}



$data = getAllData($table, "1 = 1   $and  $limit ");

createJson( $data['count'], $data['values']) ; 
 
<?php

include "../../connect.php";

$table = "catcourses";

$limit = paginationLimit($_GET['page'] ?? null, 10);

$data = getAllData($table, "1 = 1  $limit ");

$count = $data['count'] ; 

$values = $data['values'] ; 

createJson($count, $values) ; 
 
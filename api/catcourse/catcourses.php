<?php

include "../../connect.php";

$table = "catcourses";

$limit = paginationLimit($_GET['page'] ?? null, 1000);

$data = getAllData($table, "1 = 1  $limit ");

createJson( $data['count'], $data['values']) ; 
 
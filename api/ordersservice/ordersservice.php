<?php 

include "../../connect.php";

$table = "ordersserviceview";

$and = null;

$userid = $_POST['userid'] ;  
 
$limit = paginationLimit($_GET['page'] ?? null, 100);

$data = getAllData($table, "users_id = '$userid'  $and  ORDER BY ordersservice_id DESC  $limit");

createJson($data['count'], $data['values']);

?>
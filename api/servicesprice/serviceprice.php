<?php

include "../../connect.php";


$table = "servicesprice";


$serviceid = $_POST['serviceid'];



$limit = paginationLimit($_GET['page'] ?? null, 10000);



$data = getAllData($table, "servicesprice_serviceid = '$serviceid'  $limit ");



createJson($data['count'], $data['values']);



?>
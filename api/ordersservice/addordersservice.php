<?php

include  "../../connect.php";

$table = "ordersservice";

$filedir = "ordersservice";

$msgerrors = array();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username   = superFilter($_POST['username']);

    $email      =  superFilter($_POST['email']);

    $phone      = superFilter($_POST['phone']);

    $address    = superFilter($_POST['address']);

    $serviceid  = superFilter($_POST['serviceid']);

    $userid  = superFilter($_POST['userid']);

    $against    = superFilter($_POST['against']);

    $fees       = superFilter($_POST['fees']);



    //   هل سبق ان قام سجل مثل هذه الدورة سابقا



    // Image Request 

    $image      = image_data("file");

    $filetmp   =  $image['tmp'];

    $imagename =  rand(0, 1000000) . "_" . $image['name'];

    if (isset($_FILES['filetwo']['name'])) {

        $imagetwo      = image_data("filetwo");

        $filetmptwo   =  $imagetwo['tmp'];

        $imagenametwo =  rand(0, 1000000) . "_" . $imagetwo['name'];
    } else {

        $imagenametwo    = "0";
    }
    // End Image Request 
    $values = array(
        "ordersservice_aganist"     => $against,
        "ordersservice_username"    => $userid,
        "ordersservice_email"       => $email,
        "ordersservice_phone"       => $phone,
        "ordersservice_address"     => $address,
        "ordersservice_fees"        => $fees,
        "ordersservice_licence"     => $imagenametwo,
        "ordersservice_identity"    => $imagename,
        "ordersservice_serviceid"   => $serviceid,
        "ordersservice_userid"      => $userid

    );
    if (empty($msgerrors)) {
        $countinsert  = insertData($table, $values);
        move_uploaded_file($filetmp, "../upload/" . $filedir . "/" . $imagename);
        if (isset($_FILES['filetwo']['name'])) {
            move_uploaded_file($filetmptwo, "../upload/" . $filedir . "/" . $imagenametwo);
        }
        countresault($countinsert);
    } else {
        echo json_encode(array("status" => "file Not Image"));
    }
} else {
    echo json_encode(array("status" => "Hacker"));
}

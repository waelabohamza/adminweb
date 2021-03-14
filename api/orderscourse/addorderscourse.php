<?php

include  "../../connect.php";

$table = "orderscourse";

$filedir = "orderscourse";

$msgerrors = array();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = superFilter($_POST['username']);

    $email    = superFilter($_POST['email']);

    $phone    = superFilter($_POST['phone']);

    $userid    = superFilter($_POST['userid']);

    $courseid    = superFilter($_POST['courseid']);

    //   هل سبق ان قام سجل مثل هذه الدورة سابقا

    $courseback = superFilter($_POST['courseback']);

    // Image Request 

    $image      = image_data("file");

    $filetmp   =  $image['tmp'];

    $imagename =  rand(0, 1000000) . "_" . $image['name'];


    $values = array(

        "orderscourse_username" => $username,
        "orderscourse_phone"    => $phone,
        "orderscourse_email"    => $email,
        "orderscourse_image"    => $imagename,
        "orderscourse_status"   => $status,
        "orderscourse_userid"   => $userid,
        "orderscourse_courseid" => $courseid,
        "orderscourse_back"     => $courseback
    );

    if (empty($msgerrors)) {

        $countinsert  = insertData($table, $values);

        move_uploaded_file($filetmp, "../upload/" . $filedir . "/" . $imagename);

        countresault($countinsert);
        
    } else {

        echo json_encode(array("status" => "file Not Image"));
    }
} else {
    echo json_encode(array("status" => "Hacker"));
}

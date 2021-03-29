<?php
include "../../connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   
   if (isset($_POST['username'])) {

    $username = superFilter($_POST['username'])  ; 

    $id = superFilter($_POST['id'])  ; 

    $data = array("users_name" =>    $username) ;  

    $count = updateData("users" ,$data  , "users_id = '$id' ") ; 

    countresault($count) ; 

   }
   
   if (isset($_POST['password'])) {

    $password = sha1($_POST['password'])  ; 

    $id = superFilter($_POST['id'])  ; 

    $data = array("users_password" =>    $password) ;  

    $count = updateData("users" ,$data  , "users_id = '$id' ") ; 

    countresault($count) ; 

    }


} else {
    echo json_encode(array("status" => "Page Not Found"));
}

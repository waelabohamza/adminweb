<?php
include "../../connect.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   
    $id       =  superFilter($_POST['id']) ; 
    $username =  superFilter($_POST['username']) ; 
    $password =  superFilter($_POST['password']) ; 


} else {
    echo json_encode(array("status" => "Page Not Found"));
}

<?php
include "../../connect.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email    = superFilter($_POST['email']);
        $password = sha1($_POST['password']);
        $data     = signInWithEmailAndPassword("users", "users_email", "users_password", $email, $password);
        $users    = $data['values'];
        $count    = $data['count'];
        if ($count > 0) {
            echo json_encode(array("status" => "success", "users" => $users));
        } else {
            echo json_encode(array("status" => "faild"));
        }
    } else {
        echo json_encode(array("status" => "faild"));
    }
} else {
    echo json_encode(array("status" => "Page Not Found"));
}

<?php
ob_start();
include "../../ini.php";  ?>
<?php include "../../include/header.php"; ?>
<?php include "../../include/navmobile.php";   ?>




<!-- Start Body  -->

<div class="container-fluid">

    <div class="row">

        <?php include "../../include/menutop.php";  ?>

    </div>
    <!-- Edn Menu-top -->


    <!-- Start SideBar And Body Page -->

    <div class="row">

        <!-- Start SideBar  -->
        <div class="col-md-4 col-lg-2 hidden-xs hidden-sm sidebar">

            <?php include "../../include/sidebar.php";   ?>

        </div>
        <!-- End SideBar  -->

        <!-- Start SideBar  -->
        <div class="col-xs-12  col-md-8 col-lg-10">

            <!-- start Body =================================== -->
            <?php


            $do  = isset($_GET['do']) ?   $_GET['do'] : "add";

            if ($do  == "add") {

            ?>


                <div class="panel panel-default panel-custom">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Users</h3>
                    </div>
                    <div class="panel-body">

                        <form enctype="multipart/form-data" autocomplete="off" class="form-horizontal addvalidate" action="<?php echo $_SERVER['PHP_SELF'] . '?do=insert'; ?>" method="post">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">password</label>
                                <div class="col-sm-10">
                                    <input type="text" name="password" class="form-control" id="password" placeholder="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" id="email" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="phone">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="col-sm-2 control-label">Role</label>
                                <div class="col-sm-10">
                                    <select class="niceselect wide" name="role">
                                        <option value="0">User</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Add User</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- End Body ======================================= -->

        </div>



    </div>
    <!-- End SideBar And Body Page -->


</div>







<!-- End Body  -->

<?php
            } elseif ($do == "insert") {

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    //    Start Page Insert 

                    $table = "users";

                    $msgerrors = array();

                    $verfiycode = rand(10000, 99999);


                    $username = superFilter($_POST['username']);

                    checkLength("username",  $username, 2, 100);

                    $password = sha1($_POST['password']);

                    checkLength("password",  $password, 2, 100);

                    $email    = superFilter($_POST['email']);

                    checkLength("email",  $email, 2, 100);


                    $phone    = superFilter($_POST['phone']);

                    checkLength("phone",  $phone, 2, 100);

                    $role    = superFilter($_POST['role']);



                    $data = getData("users", "users_email",  $email);

                    $count = $data['count'];

                    if ($count > 0) {

?>

        <div class="alert alert-warning">email Or phone already existst</div>


        <?php

                        // echo json_encode(array("status" => "faild", "cause" => "email Or phone already existst", "key" => "found"));

                    } else {

                        if (empty($msgerrors)) {

                            $values = array(
                                "users_name" => $username,
                                "users_phone" => $phone,
                                "users_email" => $email,
                                "users_password" => $password,
                                "users_approve" => "1",
                                "users_role"  => $role
                            );
                            $countinsert  = insertData($table, $values);
                            if ($countinsert > 0) {

        ?>
                <div class="alert alert-success"> Add Users Success </div>



            <?php

                                header("Location:users.php");
                                exit();
                            } else {
                                echo json_encode(array("status" => "faild", "cause" => "Insert Faild", "key" => "insert"));
                            }
                        } else {

                            foreach ($msgerrors as $errors) {
            ?>
                <div class="mg-15  alert alert-warning"><?php echo $errors;  ?></div>
<?php
                            }
                            // echo json_encode(array("status" => "faild", "cause" => $msgerrors, "key" => "insert"));
                        }
                    }

                    //    End Page Insert
                } else {
                    echo "reuest Not post";
                }
            } else {

                echo "Page Not Found";
            }
?>

<?php include "../../include/footer.php";

ob_flush();
?>
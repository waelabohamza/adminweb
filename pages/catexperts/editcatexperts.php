<?php
ob_start();
include "../../ini.php";  ?>
<?php include "../../include/header.php"; ?>
<?php include "../../include/navmobile.php";   ?>

<?php
if (isset($_GET['catexperts'])) {

    $category = unserialize($_GET['catexperts']);
}


?>


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


            $do  = isset($_GET['do']) ?   $_GET['do'] : "edit";

            if ($do  == "edit") {

            ?>


                <div class="panel panel-default panel-custom">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Categories</h3>
                    </div>

                    <div class="panel-body">


                        <form enctype="multipart/form-data" autocomplete="off" class="form-horizontal addvalidate" action="<?php echo $_SERVER['PHP_SELF'] . '?do=update'; ?>" method="post">
                            <input type="hidden" name="id" value="<?= $category['catexperts_id'] ?>">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">category name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?= $category['catexperts_name'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namear" class="col-sm-2 control-label">category name arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namear" class="form-control" id="namear" placeholder="namear" value="<?= $category['catexperts_name_ar'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-check"></i> Update Category </button>
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
            } elseif ($do == "update") {

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    //    Start Page Insert 

                    $table = "catexperts";

                    $msgerrors = array();

                        $id = superFilter($_POST['id']);

                        $name = superFilter($_POST['name']);

                        checkLength("category name",  $name, 2, 50);

                        $namear = $_POST['namear'];

                        checkLength("category name arabic",  $namear, 2, 50);



                        $data = getData("catexperts", "catexperts_id",  $id);

                        $count = $data['count'];

                        if ($count == 0) {

?>

            <div class="alert alert-warning"> category Not exsist</div>


            <?php

                            // echo json_encode(array("status" => "faild", "cause" => "email Or phone already existst", "key" => "found"));

                        } else {

                            if (empty($msgerrors)) {

                                $values = array(
                                    "catexperts_name" => $name,
                                    "catexperts_name_ar" => $namear
                                );
                                $countupdate = updateData($table, $values, "catexperts_id = '$id' ");
                                if ($countinsert > 0) {

            ?>
                    <div class="alert alert-success"> Edit Category Success </div>



                <?php

                                    header("Location:catexperts.php");
                                    exit();
                                } else {
                                    header("Location:catexperts.php");
                                    exit();
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




<!--  <div class="form-group">
                  <label for="image" class="col-sm-2 control-label">image</label>
                  <div class=" file-upload col-sm-10">
                    <div class="file-select">
                      <div class="file-select-button" id="fileName">Choose image</div>
                      <div class="file-select-name" id="noFile">No image chosen...</div> 
                      <input type="file" name="stdimage" id="chooseFile" placeholder="image">
                    </div>
                  </div>
                </div> -->
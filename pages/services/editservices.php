<?php
ob_start();
include "../../ini.php";  ?>
<?php include "../../include/header.php"; ?>
<?php include "../../include/navmobile.php";   ?>

<?php
if (isset($_GET['service'])) {

    $service = unserialize($_GET['service']);
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
                            <input type="hidden" name="id" value="<?= $service['categories_id'] ?>">
                           
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namear" class="col-sm-2 control-label">name arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namear" class="form-control" id="namear" placeholder="name arabic">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file" class="col-sm-2 control-label">Derscription</label>
                                <div class=" file-upload col-sm-10">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File Pdf</div>
                                        <div class="file-select-name" id="noFile">No File chosen...</div>
                                        <input type="file" name="file" id="chooseFile" placeholder="image">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="procedures" class="col-sm-2 control-label">procedures</label>
                                <div class="col-sm-10">
                                    <input type="text" name="procedures" class="form-control" id="procedures" placeholder="procedures">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="proceduresar" class="col-sm-2 control-label">procedures arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="proceduresar" class="form-control" id="proceduresar" placeholder="procedures arabic">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="document" class="col-sm-2 control-label">document</label>
                                <div class="col-sm-10">
                                    <input type="text" name="document" class="form-control" id="document" placeholder="document">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="documentar" class="col-sm-2 control-label">document arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="documentar" class="form-control" id="documentar" placeholder="document arabic">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="descar" class="col-sm-2 control-label">Common</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="common" value="1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="common" value="0" checked>
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descar" class="col-sm-2 control-label">Favorite</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="favorite" value="1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="favorite" value="0" checked>
                                            No
                                        </label>
                                    </div>
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

                    $table = "categories";

                    $msgerrors = array();



                    if ($_SERVER['REQUEST_METHOD'] == "POST") {

                        $id = superFilter($_POST['id']);

                        $name = superFilter($_POST['name']);

                        checkLength("category name",  $name, 2, 50);

                        $namear = $_POST['namear'];

                        checkLength("category name arabic",  $namear, 2, 50);

                        $desc    = superFilter($_POST['desc']);

                        checkLength("description",  $desc, 10, 250);

                        $descar    = superFilter($_POST['descar']);

                        checkLength("description",  $descar, 10, 250);


                        $data = getData("categories", "categories_id",  $id);

                        $count = $data['count'];

                        if ($count == 0) {

?>

            <div class="alert alert-warning"> category Not exsist</div>


            <?php

                            // echo json_encode(array("status" => "faild", "cause" => "email Or phone already existst", "key" => "found"));

                        } else {

                            if (empty($msgerrors)) {

                                $values = array(
                                    "categories_name" => $name,
                                    "categories_name_ar" => $namear,
                                    "categories_desc" => $desc,
                                    "categories_desc_ar" => $descar
                                );
                                $countupdate = updateData($table, $values, "categories_id = '$id' ");
                                if ($countinsert > 0) {

                                    ?>
                                            <div class="alert alert-success"> Edit Category Success </div>



                                        <?php

                                    header("Location:categories.php");
                                    exit();
                                } else {
                                    header("Location:categories.php");
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
<?php
ob_start();
include "../../ini.php";  ?>
<?php include "../../include/header.php"; ?>
<?php include "../../include/navmobile.php";   ?>

<?php

if (isset($_GET['experts'])) {

    $experts = unserialize($_GET['experts']);
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
                        <h3 class="panel-title">Edit expert info </h3>
                    </div>
                    <div class="panel-body">
                        <form enctype="multipart/form-data" autocomplete="off" class="form-horizontal addvalidate" action="<?php echo $_SERVER['PHP_SELF'] . '?do=update'; ?>" method="post">
                            <input type="hidden" name="id" value="<?= $experts['experts_id'] ?>">
                            <input type="hidden" name="fileold" value="<?= $experts['experts_image'] ?>">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?= $experts['experts_name'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namear" class="col-sm-2 control-label">name arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namear" class="form-control" id="namear" placeholder="namear" value="<?= $experts['experts_name_ar'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-2 control-label">description </label>
                                <div class="col-sm-10">
                                    <input type="text" name="desc" class="form-control" id="desc" placeholder="description" value="<?= $experts['experts_desc'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descar" class="col-sm-2 control-label">description arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="descar" class="form-control" id="descar" placeholder="description arabic" value="<?= $experts['experts_desc_ar'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="experience" class="col-sm-2 control-label">experience</label>
                                <div class="col-sm-10">
                                    <input type="text" name="exp" class="form-control" id="experience" placeholder="experience" value="<?= $experts['experts_experience'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="specialty" class="col-sm-2 control-label">specialty</label>
                                <div class="col-sm-10">
                                    <input type="text" name="spec" class="form-control" id="specialty" placeholder="specialty" value="<?= $experts['experts_spec'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="common" class="col-sm-2 control-label">Common</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="common" value="1" <?php if ($experts['experts_common'] == "1") echo "checked";  ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="common" value="0" <?php if ($experts['experts_common'] == "0") echo "checked";  ?>>
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file" class="col-sm-2 control-label">Image</label>
                                <div class=" file-upload col-sm-10">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File Image</div>
                                        <div class="file-select-name" id="noFile">No File chosen...</div>
                                        <input type="file" name="file" id="chooseFile" placeholder="image">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role" class="col-sm-2 control-label">Choose Category</label>
                                <div class="col-sm-10">
                                    <select class="niceselect wide" name="category">
                                        <?php $categories = getAllData("catexperts", "1 = 1  $and ORDER BY catexperts_id  DESC")['values'];
                                        foreach ($categories as $category) { ?>
                                            <option value="<?= $category['catexperts_id'] ?>" <?php if ($experts['experts_cat'] == $category['catexperts_id']) echo "selected";  ?>><?= $category['catexperts_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Save Update</button>
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



                    $table = "experts";

                    $msgerrors = array();

                    $filedir = "experts"  ;

                    $fileold = superFilter($_POST['fileold']);



                    if (isset($_FILES['file']['name']) && $_FILES['file']['error'] != "4") {

                        $image      = image_data("file");

                        $filetmp   =  $image['tmp'];

                        $filename =  rand(0, 1000000) . "_" . $image['name'];

                    } else {

                        $filename  =   $fileold;
                    }

                    $id = superFilter($_POST['id']);

                    $name = superFilter($_POST['name']);

                    checkLength("Expert name",  $name, 2, 50);

                    $namear = superFilter($_POST['namear']);

                    checkLength("Expert name arabic",  $namear, 2, 50);

                    $desc = superFilter($_POST['desc']);

                    checkLength("description ",  $desc, 2, 100);

                    $descar = superFilter($_POST['descar']);

                    checkLength("description  arabic",  $descar, 2, 100);


                    $spec    = superFilter($_POST['spec']);

                    checkLength("specialty",  $spec, 2, 120);

                    $exp    = superFilter($_POST['exp']);

                    checkLength("experience",  $exp, 2, 120);

                    $common =  superFilter($_POST['common']);

                    $category = superFilter($_POST['category']);


                    $data = getData("experts", "experts_id",  $id);

                    $count = $data['count'];

                    if ($count == 0) {

?>

        <div class="alert alert-warning"> Expert Not exsist</div>


        <?php

                        // echo json_encode(array("status" => "faild", "cause" => "email Or phone already existst", "key" => "found"));

                    } else {

                        if (empty($msgerrors)) {

                            $values = array(
                                "experts_name"          => $name,
                                "experts_name_ar"       => $namear,
                                "experts_image"         => $filename,
                                "experts_desc"          => $desc,
                                "experts_desc_ar"       => $descar,
                                "experts_experience"    => $exp,
                                "experts_common"        => $common,
                                "experts_spec"          => $spec,
                                "experts_cat"           => $category
                            );
                            $countupdate = updateData($table, $values, "experts_id = '$id' ");

                            if (isset($_FILES['file']['name']) && $_FILES['file']['error'] != "4") {
                                if (file_exists("../../api/upload/" . $filedir . "/" . $fileold)) {
                                    unlink("../../api/upload/" . $filedir . "/" . $fileold);
                                }
                                move_uploaded_file($filetmp, "../../api/upload/" . $filedir . "/" . $filename);
                            }
                            
                            if ($countinsert > 0) {

                            

        ?>
                <div class="alert alert-success"> Edit Expert info  Success </div>



            <?php

                                header("Location:experts.php");
                                exit();
                            } else {
                                header("Location:experts.php");
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
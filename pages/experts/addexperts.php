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
                        <h3 class="panel-title">Add Courses</h3>
                    </div>
                    <div class="panel-body">

                        <form enctype="multipart/form-data" autocomplete="off" class="form-horizontal addvalidate" action="<?php echo $_SERVER['PHP_SELF'] . '?do=insert'; ?>" method="post">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namear" class="col-sm-2 control-label">name arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namear" class="form-control" id="namear" placeholder="namear">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-2 control-label">description </label>
                                <div class="col-sm-10">
                                    <input type="text" name="desc" class="form-control" id="desc" placeholder="description">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descar" class="col-sm-2 control-label">description arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="descar" class="form-control" id="descar" placeholder="description arabic">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="experience" class="col-sm-2 control-label">experience</label>
                                <div class="col-sm-10">
                                    <input type="text" name="exp" class="form-control" id="experience" placeholder="experience">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="specialty" class="col-sm-2 control-label">specialty</label>
                                <div class="col-sm-10">
                                    <input type="text" name="spec" class="form-control" id="specialty" placeholder="specialty">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="common" class="col-sm-2 control-label">Common</label>
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
                                            <option value="<?= $category['catexperts_id'] ?>"><?= $category['catexperts_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Add Expert</button>
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

                    $table = "experts";

                    $msgerrors = array();

 



                    if (isset($_FILES['file']['name'])) {
                        $image      = image_data("file");

                        $filetmp   =  $image['tmp'];

                        $imagename =  rand(0, 1000000) . "_" . $image['name'];
                    } else {
                        $msgerrors[] = "Please Choose Image File ";
                    }

                    $name = superFilter($_POST['name']);

                    checkLength("Expert name",  $name, 2, 50);

                    $namear = superFilter($_POST['namear']);

                    checkLength("Expert name arabic",  $namear, 2, 50);

                    $desc = superFilter($_POST['desc']);

                    checkLength("description ",  $desc, 2, 100);

                    $descar = superFilter($_POST['descar']);

                    checkLength("description  arabic",  $descar, 2, 100);
  

                    $spec    = superFilter($_POST['spec']);

                    checkLength("specialty",  $spec, 3, 120);

                    $exp    = superFilter($_POST['exp']);

                    checkLength("experience",  $exp, 3, 120);

                    $common =  superFilter($_POST['common']);

                    $category = superFilter($_POST['category']);


                    $data = getData("experts", "experts_name",  $name);

                    $count = $data['count'];

                    if ($count > 0) {

?>

        <div class="alert alert-warning"> Expert already existst</div>


        <?php

                        // echo json_encode(array("status" => "faild", "cause" => "email Or phone already existst", "key" => "found"));

                    } else {

                        if (empty($msgerrors)) {

                            $values = array(
                                "experts_name"          => $name        ,
                                "experts_name_ar"       => $namear      ,
                                "experts_image"         => $imagename   ,
                                "experts_desc"          => $desc      ,
                                "experts_desc_ar"       => $descar        ,
                                "experts_experience"    => $exp    ,
                                "experts_common"        => $common      ,
                                "experts_spec"          => $spec    ,
                                "experts_cat"           => $category  
                            );
                            $countinsert  = insertData($table, $values);

                            if ($countinsert > 0){
                                $filedir =  "experts";
                                move_uploaded_file($filetmp, "../../api/upload/" . $filedir . "/" . $imagename);

        ?>
                <div class="alert alert-success"> Add Expert Success </div>
            <?php
                                header("Location:experts.php");
                                exit();
                           
                            }else{
                                
            ?>
               <div class="alert alert-danger mg-15"> Insert Faild Try Again</div>
            <?php
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
                else {
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
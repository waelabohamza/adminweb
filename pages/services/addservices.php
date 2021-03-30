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
                        <h3 class="panel-title">Add services</h3>
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
                                <label for="fees" class="col-sm-2 control-label">fees</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fees" class="form-control" id="fees" placeholder="fees">
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
                            <div class="form-group">
                                <label for="descar" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="price" value="1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="price" value="0" checked>
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="col-sm-2 control-label">Choose Category</label>
                                <div class="col-sm-10">
                                    <select class="niceselect wide" name="category">
                                        <?php $categories = getAllData("categories", "1 = 1  $and ORDER BY categories_id DESC")['values'];
                                        foreach ($categories as $category) { ?>
                                            <option value="<?= $category['categories_id'] ?>"><?= $category['categories_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Add Service </button>
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





                    $table = "services";

                    $msgerrors = array();


                    $verfiycode = rand(10000, 99999);



                    if (isset($_FILES['file'])) {
                        $image      = image_data("file");

                        $filetmp   =  $image['tmp'];

                        $imagename =  rand(0, 1000000) . "_" . $image['name'];
                    } else {
                        $msgerrors[] = "Please Choose Pdf File ";
                    }

                    $name = superFilter($_POST['name']);

                    $fees = superFilter($_POST['fees']);

                    checkLength("service name",  $name, 2, 50);

                    $namear = superFilter($_POST['namear']);

                    checkLength("service name arabic",  $namear, 2, 50);

                    $procedures = $_POST['procedures'];

                    checkLength("procedures",  $procedures, 2, 200);

                    $proceduresar = $_POST['proceduresar'];

                    checkLength("procedures arabic",  $proceduresar, 2, 200);

                    // $desc    = superFilter($_POST['desc']);

                    // checkLength("description",  $desc, 10, 250);

                    $document    = superFilter($_POST['document']);

                    checkLength("document",  $document, 10, 120);

                    $documentar    = superFilter($_POST['documentar']);

                    checkLength("document arabic ",  $documentar, 10, 120);

                    $common =  superFilter($_POST['common']);

                    $favorite =  superFilter($_POST['favorite']);

                    $price =  superFilter($_POST['price']);

                    $categories = superFilter($_POST['category']);




                    if (empty($msgerrors)) {
                        $values = array(
                            "services_name"         => $name,
                            "services_name_ar"      => $namear,
                            "services_desc"         => $imagename,
                            "services_procedures"   => $procedures,
                            "services_procedures_ar" => $proceduresar,
                            "services_document"     => $document,
                            "services_document_ar"  => $documentar,
                            "services_common"       => $common,
                            "services_favorite"     => $favorite,
                            "services_categories"   => $categories,
                            "services_typeprice"    => $price  , 
                            "services_fees"         => $fees
                        );
                        $countinsert  = insertData($table, $values);
                        if ($countinsert > 0) {
                            $filedir =  "pdfviewservices";
                            move_uploaded_file($filetmp, "../../api/upload/" . $filedir . "/" . $imagename);

?>
            <div class="alert alert-success"> Add Category Success </div>

            <?php

                            if ($price == "0") {
                                header("Location:services.php");
                                exit();
                            } else {
                                header("Location:addservicestwo.php");
                                exit();
                            }
                        } else {
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
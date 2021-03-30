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
                            <input type="hidden" name="id" value="<?= $service['services_id'] ?>">
                            <input type="hidden" name="fileold" value="<?= $service['services_desc'] ?>">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?= $service['services_name'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namear" class="col-sm-2 control-label">name arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namear" class="form-control" id="namear" placeholder="name arabic" value="<?= $service['services_name_ar'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file" class="col-sm-2 control-label">Derscription</label>
                                <div class=" file-upload col-sm-10">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File Pdf</div>
                                        <div class="file-select-name" id="noFile">No File chosen...</div>
                                        <input type="file" name="file" id="chooseFile" placeholder="file">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="procedures" class="col-sm-2 control-label">procedures</label>
                                <div class="col-sm-10">
                                    <input type="text" name="procedures" class="form-control" id="procedures" placeholder="procedures" value="<?= $service['services_procedures'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="proceduresar" class="col-sm-2 control-label">procedures arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="proceduresar" class="form-control" id="proceduresar" placeholder="procedures arabic" value="<?= $service['services_procedures_ar'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="document" class="col-sm-2 control-label">document</label>
                                <div class="col-sm-10">
                                    <input type="text" name="document" class="form-control" id="document" placeholder="document" value="<?= $service['services_document'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="documentar" class="col-sm-2 control-label">document arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="documentar" class="form-control" id="documentar" placeholder="document arabic" value="<?= $service['services_document_ar'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fees" class="col-sm-2 control-label">fees</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fees" class="form-control" id="fees" placeholder="fees" value="<?= $service['services_fees'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descar" class="col-sm-2 control-label">Common</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="common" value="1" <?php if ($service['services_common'] == "1") echo "checked";   ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="common" value="0" <?php if ($service['services_common'] == "0") echo "checked";   ?>>
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
                                            <input type="radio" name="favorite" value="1" <?php if ($service['services_favorite'] == "1") echo "checked";   ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="favorite" value="0" <?php if ($service['services_favorite'] == "0") echo "checked";   ?>>
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
                                            <option value="<?= $category['categories_id'] ?>" <?php if ($service['services_categories'])  echo "selected";; ?>><?= $category['categories_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Save Update </button>
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

                    echo "<pre>";
                    print_r($_FILES);
                    echo "</pre>";


                    $filedir = "pdfviewservices";



                    $table = "services";

                    $msgerrors = array();


                    $verfiycode = rand(10000, 99999);

                    $fileold = superFilter($_POST['fileold']);



                    if (isset($_FILES['file']['name']) && $_FILES['file']['error'] != "4") {

                        $image      = image_data("file");

                        $filetmp   =  $image['tmp'];

                        $filename =  rand(0, 1000000) . "_" . $image['name'];
                    } else {

                        $filename  =   $fileold;
                    }

                    $id = superFilter($_POST['id']);

                    $fees  = superFilter($_POST['fees']);

                    $name = superFilter($_POST['name']);

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

                    $categories = superFilter($_POST['category']);


                    $data = getData("services", "services_id",  $id);

                    $count = $data['count'];

                    if ($count == 0) {

?>

        <div class="alert alert-warning"> Service Not exsist</div>


        <?php

                        // echo json_encode(array("status" => "faild", "cause" => "email Or phone already existst", "key" => "found"));

                    } else {

                        if (empty($msgerrors)) {

                            $values = array(
                                "services_name"         => $name,
                                "services_name_ar"      => $namear,
                                "services_desc"         => $filename,
                                "services_procedures"   => $procedures,
                                "services_procedures_ar" => $proceduresar,
                                "services_document"     => $document,
                                "services_document_ar"  => $documentar,
                                "services_common"       => $common,
                                "services_favorite"     => $favorite,
                                "services_categories"   => $categories,
                                "services_fees"         => $fees
                                // "services_typeprice"    => $price
                            );

                            if (isset($_FILES['file']['name']) && $_FILES['file']['error'] != "4") {
                                if (file_exists("../../api/upload/" . $filedir . "/" . $fileold)) {
                                    unlink("../../api/upload/" . $filedir . "/" . $fileold);
                                }
                                move_uploaded_file($filetmp, "../../api/upload/" . $filedir . "/" . $filename);
                            }

                            $countupdate = updateData($table, $values, "services_id = '$id' ");
                            if ($countinsert > 0) {

        ?>
                <div class="alert alert-success"> Edit Category Success </div>



            <?php

                                header("Location:services.php");
                                exit();
                            } else {
                                header("Location:services.php");
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
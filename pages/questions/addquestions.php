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
                        <h3 class="panel-title">Add Question</h3>
                    </div>
                    <div class="panel-body">

                        <form enctype="multipart/form-data" autocomplete="off" class="form-horizontal addvalidate" action="<?php echo $_SERVER['PHP_SELF'] . '?do=insert'; ?>" method="post">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Question</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Question">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namear" class="col-sm-2 control-label">Question arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namear" class="form-control" id="namear" placeholder="Question Arabic">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ans" class="col-sm-2 control-label">Answer </label>
                                <div class="col-sm-10">
                                    <input type="text" name="ans" class="form-control" id="ans" placeholder="Answer">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ansar" class="col-sm-2 control-label">Answer arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ansar" class="form-control" id="ansar" placeholder="Answer arabic">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="document" class="col-sm-2 control-label">document</label>
                                <div class="col-sm-10">
                                    <input type="text" name="document" class="form-control" id="document" placeholder="document">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="documentar" class="col-sm-2 control-label">document Arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="documentar" class="form-control" id="documentar" placeholder="document Arabic">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="time" class="col-sm-2 control-label">time</label>
                                <div class="col-sm-10">
                                    <input type="text" name="time" class="form-control" id="time" placeholder="time">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="timear" class="col-sm-2 control-label">time Arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="timear" class="form-control" id="timear" placeholder="time Arabic">
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
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Add Question</button>
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

                    $table = "questions";

                    $msgerrors = array();

                    $name = superFilter($_POST['name']);

                    checkLength("Question name",  $name, 2, 200);

                    $namear = $_POST['namear'];

                    checkLength("Question  arabic",  $namear, 2, 200);

                    $ans = superFilter($_POST['ans']);

                    checkLength("Answer ",  $ans, 2, 255);

                    $ansar = superFilter($_POST['ansar']);

                    checkLength("Answer  arabic",  $ansar, 2, 255);


                    $document = superFilter($_POST['document']);

                    checkLength("document ",  $document, 2, 200);

                    $documentar = superFilter($_POST['documentar']);

                    checkLength("document Arabic ",  $documentar, 2, 200);


                    $time = superFilter($_POST['time']);

                    checkLength("time ",  $time, 1, 100);

                    $timear = superFilter($_POST['timear']);

                    checkLength("time Arabic ",  $timear, 1, 100);

                    $common = superFilter($_POST['common']);

                    $data = getData("questions", "questions_name",  $name);

                    $count = $data['count'];

                    if ($count > 0) {

?>

        <div class="alert alert-warning"> course already existst</div>


        <?php

                        // echo json_encode(array("status" => "faild", "cause" => "email Or phone already existst", "key" => "found"));

                    } else {

                        if (empty($msgerrors)) {

                            $values = array(
                                "questions_name"        => $name,
                                "questions_name_ar"     => $namear,
                                "questions_answer"      => $ans,
                                "questions_answer_ar"   => $ansar,
                                "questions_document"     => $document,
                                "questions_document_ar"  => $documentar,
                                "questions_time"        => $time,
                                "questions_time_ar"     => $timear,
                                "questions_common"      => $common
                            );
                            $countinsert  = insertData($table, $values);
                            if ($countinsert > 0) {
        ?>
                <div class="alert alert-success"> Add Courses Success </div>
            <?php
                                header("Location:questions.php");
                                exit();
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
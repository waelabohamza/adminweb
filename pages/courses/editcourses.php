<?php
ob_start();
include "../../ini.php";  ?>
<?php include "../../include/header.php"; ?>
<?php include "../../include/navmobile.php";   ?>

<?php

if (isset($_GET['courses'])) {

    $course = unserialize($_GET['courses']);
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
                        <h3 class="panel-title">Edit Courses</h3>
                    </div>
                    <div class="panel-body">
                        <form enctype="multipart/form-data" autocomplete="off" class="form-horizontal addvalidate" action="<?php echo $_SERVER['PHP_SELF'] . '?do=update'; ?>" method="post">
                            <input type="hidden" name="id" value="<?= $course['courses_id'] ?>">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Courses name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?= $course['courses_name'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namear" class="col-sm-2 control-label">Course name arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namear" class="form-control" id="namear" placeholder="namear" value="<?= $course['courses_name_ar'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-2 control-label">description </label>
                                <div class="col-sm-10">
                                    <input type="text" name="desc" class="form-control" id="desc" placeholder="description" value="<?= $course['courses_desc'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descar" class="col-sm-2 control-label">description arabic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="descar" class="form-control" id="descar" placeholder="description arabic" value="<?= $course['courses_desc_ar'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hour" class="col-sm-2 control-label">hour</label>
                                <div class="col-sm-10">
                                    <input type="text" name="hour" class="form-control" id="hour" placeholder="hour" value="<?= $course['courses_hour'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="document" class="col-sm-2 control-label">document</label>
                                <div class="col-sm-10">
                                    <input type="text" name="document" class="form-control" id="document" placeholder="document" value="<?= $course['courses_document'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="common" class="col-sm-2 control-label">Common</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="common" value="1" <?php if ($course['courses_common'] == "1") echo "checked";  ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="common" value="0" <?php if ($course['courses_common'] == "0") echo "checked";  ?>>
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role" class="col-sm-2 control-label">Choose Category</label>
                                <div class="col-sm-10">
                                    <select class="niceselect wide" name="category">
                                        <?php $categories = getAllData("catcourses", "1 = 1  $and ORDER BY catcourses_id ASC")['values'];
                                        foreach ($categories as $category) { ?>
                                            <option value="<?= $category['catcourses_id'] ?>" <?php if ($course['courses_type'] == $category['catcourses_id']) echo "selected";  ?>><?= $category['catcourses_name'] ?></option>
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

                    $table = "catcourses";

                    $msgerrors = array();



                    if ($_SERVER['REQUEST_METHOD'] == "POST"){

                        $table = "courses";

                        $msgerrors = array();

                        $id = superFilter($_POST['id']);
    
                        $verfiycode = rand(10000, 99999);
    
                        $name = superFilter($_POST['name']);
    
                        checkLength("course name",  $name, 2, 50);
    
                        $namear = $_POST['namear'];
    
                        checkLength("course name arabic",  $namear, 2, 50);
    
                        $desc = superFilter($_POST['desc']);
    
                        checkLength("description ",  $desc, 2, 100);
    
                        $descar = superFilter($_POST['descar']);
    
                        checkLength("description  arabic",  $descar, 2, 100);
    
                        $document = superFilter($_POST['document']);
    
                        checkLength("document ",  $document, 2, 100);
    
                        $hour = superFilter($_POST['hour']);
    
                        checkLength("hour ",  $hour, 1, 50);
    
                        $common = superFilter($_POST['common']);
    
                        $category = superFilter($_POST['category']);

                        $data = getData("courses", "courses_id",  $id);

                        $count = $data['count'];

                        if ($count == 0) {

?>

            <div class="alert alert-warning"> Course Not exsist</div>


            <?php

                            // echo json_encode(array("status" => "faild", "cause" => "email Or phone already existst", "key" => "found"));

                        } else {

                            if (empty($msgerrors)) {

                                $values = array(
                                    "courses_name" => $name,
                                    "courses_name_ar" => $namear,
                                    "courses_desc" => $desc,
                                    "courses_desc_ar" => $descar,
                                    "courses_hour" => $hour,
                                    "courses_document" => $document,
                                    "courses_common" => $common,
                                    "courses_type" => $category
                                );
                                $countupdate = updateData($table, $values, "courses_id = '$id' ");
                                if ($countinsert > 0) {

            ?>
                    <div class="alert alert-success"> Edit Course Success </div>



                <?php

                                    header("Location:courses.php");
                                    exit();
                                } else {
                                    header("Location:courses.php");
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
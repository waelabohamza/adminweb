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
                           <input type="hidden" id="numberprice" name="number" value="1">
                            <div class="formpricefees">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name0" class="form-control" id="name" placeholder="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Fees</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name0" class="form-control" id="name" placeholder="name">
                                    </div>
                                </div>

                            </div>

                            <div class="btn btn-success" id="addnewprice"> Add </div>








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

                   
                       
                        $number = $_POST['number'] ; 
                         
                        for($i = 0  ; $i <= $number ; $i++){

                            $name = superFilter($_POST['name' . $i]);

                            checkLength("price " . $i,  $name . $i, 1, 20);

                            $fees = superFilter($_POST['fees' . $i]);

                            checkLength("fees " . $i ,  $name . $i, 1, 20);

                        }
                         

               
 

                      


                     
 
                   
                    //    End Page Insert
                }else {
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
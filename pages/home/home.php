<?php
ob_start();
session_start();

if (!isset($_SESSION['email'])) {
    header("Location:../../index.php");
    exit();
}

include "../../ini.php";



$sql = " SELECT 

(select COUNT(*) from users ) as users    , 
(select COUNT(*) from services ) as services    , 
(select COUNT(*) from courses ) as courses    , 
(select COUNT(*) from experts ) as experts    , 
(select COUNT(*) from questions ) as questions    , 

(select COUNT(*) from catexperts ) as catexperts    , 
(select COUNT(*) from catcourses ) as catcourses     , 
(select COUNT(*)  from categories  ) as categories ,

(select COUNT(*) from orderscourse ) as orderscourse     , 
(select COUNT(*)  from ordersservice  ) as ordersservice 

 ";

$stmt = $con->prepare($sql);
$stmt->execute();
$countall  = $stmt->fetch(PDO::FETCH_ASSOC);


?>
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
        <!-- End SideBar And Body Page -->

        <div class="col-xs-12  col-md-8 col-lg-10 home">
            <!-- Start Page Current Body  -->









            <div class="row card-static">

                <a href="../users/users.php">
                    <div class="col-lg-3 col-md-4 com-sm-6 col-xs-12">
                        <div class="text-center mg-15 card one">
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <h2>
                                Users
                            </h2>
                            <h2>
                                <?php echo $countall['users'];  ?>
                            </h2>
                        </div>
                    </div>
                </a>


                <a href="../categories/categories.php">

                    <div class="col-lg-3 col-md-4 com-sm-6 col-xs-12">
                        <div class="text-center mg-15 card two">
                            <div class="icon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <h2>
                                Categories
                            </h2>
                            <h2>
                                <?php echo $countall['categories'];  ?>
                            </h2>
                        </div>
                    </div>

                </a>


                <a href="../services/services.php">
                    <div class="col-lg-3 col-md-4 com-sm-6 col-xs-12">
                        <div class="text-center mg-15 card three">
                            <div class="icon">
                                <i class="fa fa-suitcase"></i>
                            </div>
                            <h2>
                                Services
                            </h2>
                            <h2>
                                <?php echo $countall['services'];  ?>
                            </h2>
                        </div>
                    </div>
                </a>
                <a href="../ordersservices/ordersservices.php">
                    <div class="col-lg-3 col-md-4 com-sm-6 col-xs-12">
                        <div class="text-center mg-15 card four">
                            <div class="icon">
                                <i class="fa fa-sign-out"></i>
                            </div>
                            <h2>
                                Orders
                            </h2>

                            <h2>
                                <?php echo $countall['ordersservice'];  ?>
                            </h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="clearfix"></div>



            <div class="row card-static">
                <a href="../catexperts/catexperts.php">
                    <div class="col-lg-3 col-md-4 com-sm-6 col-xs-12">
                        <div class="text-center mg-15 card one">
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <h2>
                                cat Experts
                            </h2>
                            <h2>
                                <?php echo $countall['catexperts'];  ?>
                            </h2>
                        </div>
                    </div>
                </a>
                <a href="../experts/experts.php">
                    <div class="col-lg-3 col-md-4 com-sm-6 col-xs-12">
                        <div class="text-center mg-15 card two">
                            <div class="icon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <h2>
                                experts
                            </h2>
                            <h2>
                                <?php echo $countall['experts'];  ?>
                            </h2>
                        </div>
                    </div>
                </a>
                <a href="../catcourses/catcourses.php">
                <div class="col-lg-3 col-md-4 com-sm-6 col-xs-12">
                    <div class="text-center mg-15 card three">
                        <div class="icon">
                            <i class="fa fa-suitcase"></i>
                        </div>
                        <h2>
                            Cat courses
                        </h2>
                        <h2>
                            <?php echo $countall['catcourses'];  ?>
                        </h2>
                    </div>
                </div>
                </a>
                <a href="../courses/courses.php">
                <div class="col-lg-3 col-md-4 com-sm-6 col-xs-12">
                    <div class="text-center mg-15 card four">
                        <div class="icon">
                            <i class="fa fa-sign-out"></i>
                        </div>
                        <h2>
                            Courses
                        </h2>

                        <h2>
                            <?php echo $countall['courses'];  ?>
                        </h2>
                    </div>
                </div>
                </a>
            </div>

            <div class="clearfix"></div>




            <div class="clearfix"></div>























            <!-- End Page Current Body  -->

        </div>




    </div>


</div>


<!-- End Body  -->



<?php
include "../../include/footer.php";
ob_end_flush();
?>
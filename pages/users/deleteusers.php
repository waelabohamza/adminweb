<?php
ob_start() ; 
include "../../ini.php";  ?>
<?php include "../../include/header.php"; ?>
<?php include "../../include/navmobile.php";   ?>

<?php 


 
   $id = $_GET['userid'] ; 
   $count =  deleteData("users" , "users_id" , $id);
   if ($count > 0 ) {
              header("Location:users.php") ; 
              exit() ; 
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

            <!-- End Body ======================================= -->

        </div>



    </div>
    <!-- End SideBar And Body Page -->


</div>


<!-- End Body  -->



<?php include "../../include/footer.php"; 
ob_flush() ; 

?>
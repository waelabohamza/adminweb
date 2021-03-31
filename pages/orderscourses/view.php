<?php
ob_start() ; 
include "../../ini.php";  ?>

<?php include "../../include/header.php"; ?>
<?php include "../../include/navmobile.php";   ?>

<?php 

if (isset($_GET['details'])) {

    $view = unserialize($_GET['details']);
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
               
            <div class="panel panel-default panel-view">
            <div class="panel-heading">
                <img src="../../api/upload/orderscourse/<?php echo $view['orderscourse_image'] ; ?>" class="img-responsive center-block"  />
            </div>
            <div class="panel-body">
                 <div class="row">
                     <div class="col-sm-6 col-xs-12">
                       <ul class="list-unstyled ul-view">
                          <li>name :  <?= $view['orderscourse_username'] ; ?></li>
                          <li>email :  <?= $view['orderscourse_email'] ; ?> </li> 
                          <li>phone :  <?= $view['users_phone'] ; ?> </li>       
                          <!-- <li>Address :   </li> -->
                         
                       </ul>
                     </div>
                     <div class="col-sm-6 col-xs-12">
                      <ul class="list-unstyled ul-view">
                         
                          <li>course : <?= $view['courses_name'] ; ?></li> 
                          <li>category course :  <?= $view['courses_desc'] ; ?></li>
                        
                    
                       </ul>
                     </div>
                 </div>
                 <div class="clearfix"></div>
                 <!-- <h2>Information parents</h2>
                 <div class="row">
                    <div class="col-sm-6 col-xs-12">

                      <ul class="list-unstyled ul-view">
                           <li>name :  </li>
                           <li>Profession : </li>
                           <li>email : </li>
                           <li>phone  </li>
                      </ul>

                    </div>
                    <div class="col-sm-6 col-xs-12">

                      <ul class="list-unstyled ul-view">

                           <li>address : </li>
                           <li>date :  </li>
                           <li>username  </li>
                           <li>password </li>

                      </ul>

                    </div>
                 </div> -->
            </div>
        </div>
    
          

            <!-- End Body ======================================= -->

        </div>



    </div>
    <!-- End SideBar And Body Page -->


</div>


<!-- End Body  -->



<?php include "../../include/footer.php"; 
ob_end_flush() ; 

?>
<?php
ob_start();
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

            <div class="panel panel-default panel-view  panel-custom manage">
                <div class="panel-heading">

                    <h2 class="panel-title"> <strong> Info Order</strong> </h2>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <ul class="list-unstyled ul-view">
                                <li>name : <?= $view['ordersservice_username']; ?></li>
                                <li>email : <?= $view['ordersservice_email']; ?> </li>
                                <li>phone : <?= $view['ordersservice_phone']; ?> </li>
                                <li>Address : <?= $view['ordersservice_address']; ?> </li>
                                <!-- <li>Address :   </li> -->
                            </ul>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <ul class="list-unstyled ul-view">

                                <li>Service : <?= $view['services_name']; ?></li>
                                <li> Fees : <?= $view['ordersservice_fees']; ?></li>
                                <li>Against : <?= $view['ordersservice_aganist']; ?></li>



                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageidentity">Image identity</button>
             <?php if ($view['ordersservice_licence'] != "0") {    ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imagelicence">Image licence</button>
            <?php } if ($view['ordersservice_filecustom'] != "0") {   ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageaddtional">Image File Addtional</button>
            <?php  } ?>

                                        <a href="approvedorders.php?ordersid=<?php echo  $view['ordersservice_id']
                                                                                    ?>" class="btn-success btn mg-h-5 "><i class="fa  fa-check"> </i> <span class="hidden-xs">Approve</span> </a>
                                        <a href="deniedorders.php?ordersid=<?php echo  $view['ordersservice_id']
                                                                                    ?>" class="btn-warning  btn mg-h-5 "><i class="fa fa-remove"> </i> <span class="hidden-xs">Deny</span> </a>

         


            <div class="modal fade" tabindex="-1" id="imageidentity" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="imagealert">
                            <img src="../../api/upload/ordersservice/<?php echo $view['ordersservice_identity']; ?>" class="img-responsive center-block" height="400px" />
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($view['ordersservice_licence'] != "0") {    ?>
            <div class="modal fade" tabindex="-1" id="imagelicence" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="imagealert">
                            <img src="../../api/upload/ordersservice/<?php echo $view['ordersservice_licence']; ?>" class="img-responsive  center-block " />
                        </div>
                    </div>
                </div>
            </div>
            <?php } if ($view['ordersservice_filecustom'] != "0") {   ?>
            <div class="modal fade" tabindex="-1" id="imageaddtional" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="imagealert">
                            <img src="../../api/upload/ordersservice/<?php echo $view['ordersservice_filecustom']; ?>" class="img-responsive  center-block " />
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- End Body ======================================= -->

        </div>



    </div>
    <!-- End SideBar And Body Page -->


</div>


<!-- End Body  -->



<?php include "../../include/footer.php";
ob_end_flush();

?>
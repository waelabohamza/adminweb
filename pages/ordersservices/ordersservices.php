<?php include "../../ini.php";  ?>
<?php include "../../include/header.php"; ?>
<?php include "../../include/navmobile.php";   ?>

<?php
 ; 

$linkdeniedpage = "deniedorders.php";
$linkdeletepage = "deleteorders.php";
$linkapprovepage = "approvedorders.php";

if (isset($_GET['search'])) {
    $get = $_GET['search'];
    $and = "And (ordersservice_username  LIKE  '%$get%') 
         OR (ordersservice_email      LIKE  '%$get%') 
         OR (ordersservice_id         LIKE  '%$get%')";
} else {
    $and = null;
};

if (isset($_GET['searchstatus'])) {

    $get = $_GET['searchstatus'];
    if ($get == "wait") {
        $and = "And (ordersservice_status  =  0 )";
    }
    if ($get == "approved") {
        $and = "And (ordersservice_status  =  1 )";
    }
    if ($get == "denied") {
        $and = "And (ordersservice_status  =  10 )";
    }
} else {
    $and = null;
};

// Var Global For Every Page 

$titlepage  = "Orders Services View";


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


            <div class="panel panel-default panel-custom manage">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $titlepage; ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row m-b">
                        <div class="col-sm-9 col-xs-6">
                            <form action="<?= $_SERVER['PHP_SELF']; ?> " method="get" class="parent-search m-b">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <input type="text" class="form-control input-sm" id="search" placeholder="Search" name="search">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="col-xs-6  col-sm-3 ">
                            <form action="" method="get" class="parent-search m-b">
                                <select name="searchstatus" class="niceselect wide">
                                    <option value="all">All Orders</option>
                                    <option value="wait">Wait Approve</option>
                                    <option value="approved">Approved</option>
                                    <option value="denied">Denied</option>
                                </select>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- start pager -->
                    <ul class="nav nav-tabs m-b pager-section">
                        <li class="active"><a href="" data-target="all" class="all">All Orders</a> </li>
                        <li> <a href="" data-target="wait">wait approve</a> </li>
                        <li> <a href="" data-target="approved">approved</a> </li>
                        <li> <a href="" data-target="denied">denied</a> </li>
                    </ul>
                    <!-- End pager -->
                    <div class="clearfix"></div>
                    <!-- End pager  -->
                    <table class="table  table-bordered table-hover table-responsive table-section">

                        <thead>
                            <tr>
                                <td>service</td>
                                <td>username</td>
                                <td class="hidden-xs">phone</td>
                                <td class="hidden-xs">Status</td>
                                <td>control</td>
                            </tr>
                        </thead>

                        <?php
                        $orders = getAllData("ordersserviceview", "1 = 1  $and ORDER BY ordersservice_id DESC")['values'];
                        foreach ($orders as $order) {
                        ?>
                            <tr>
                                <td class=" "><?php echo $order['services_name']
                                                ?></td>
                                <td class='<?php
                                            if ($order['ordersservice_status'] == "0") {
                                                echo "wait";
                                            } elseif ($order['ordersservice_status'] == "1") {
                                                echo "approved";
                                            } else {
                                                echo "denied";
                                            }
                                            ?>'><?php echo $order['ordersservice_username']
                                                ?></td>
                                <td class=" hidden-xs"><?php echo $order['ordersservice_phone']
                                                        ?></td>
                                <td class=" hidden-xs"><?php
                                                        if ($order['ordersservice_status'] == "0") {
                                                            echo "wait";
                                                        } elseif ($order['ordersservice_status'] == "1") {
                                                            echo "approved";
                                                        } else {
                                                            echo "denied";
                                                        }
                                                        ?></td>
                                <td>
                                    <a href="<?= $linkdeletepage ?>?ordersid=<?php echo  $order['ordersservice_id']
                                                                                ?>" class="btn-primary btn-sm mg-h-5 "><i class="fa fa-info-circle"> </i> <span class="hidden-xs">View</span> </a>

                                    <?php if ($order['ordersservice_status'] == "0") { ?>

                                        <a href="<?= $linkapprovepage ?>?ordersid=<?php echo  $order['ordersservice_id']
                                                                                    ?>" class="btn-success btn-sm mg-h-5 "><i class="fa  fa-check"> </i> <span class="hidden-xs">Approve</span> </a>
                                        <a href="<?= $linkdeniedpage ?>?ordersid=<?php echo  $order['ordersservice_id']
                                                                                    ?>" class="btn-warning btn-sm mg-h-5 "><i class="fa fa-remove"> </i> <span class="hidden-xs">Deny</span> </a>
                                    <?php   } ?>

                                    <a href="<?= $linkdeletepage ?>?ordersid=<?php echo  $order['ordersservice_id']
                                                                                ?>" class="btn-danger btn-sm mg-h-5 "><i class="fa fa-trash-o"> </i> <span class="hidden-xs">Delete</span> </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>


            <!-- End Body ======================================= -->

        </div>



    </div>
    <!-- End SideBar And Body Page -->


</div>


<!-- End Body  -->



<?php include "../../include/footer.php";  ?>
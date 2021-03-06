<?php include "../../ini.php";  ?>
<?php include "../../include/header.php"; ?>
<?php include "../../include/navmobile.php";   ?>

<?php

// Var Global For Every Page 
 ; 

$titlepage          = "Services";
$linkaddpage        = "addservices.php";
$titleaddpage       = "Add Service";
$linkeditpage       = "editservices.php";
$linkdeletepage     = "deleteservices.php";

$currentpage = isset($_GET['pager']) && is_numeric($_GET['pager']) ? intval($_GET['pager'])  : 1;
$countdrug  = countCoulmn("services_id", "services");
$nextpage   = $currentpage + 1;
$prevpage   = $currentpage - 1;
$lastpage   = ceil($countdrug / $perpage);
$startpage  = ($currentpage - 1) * $perpage;
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
                        <div class="col-xs-6 col-sm-9 ">
                            <a href="<?= $linkaddpage ?>" class="btn btn-success btn-sm">+ <?php echo $titleaddpage;   ?></a>
                        </div>
                        <!-- Start Choose Select -->
                        <!-- <div class="col-xs-6 col-sm-3 col-pull-right">

                            <form action="" method="get" class="parent-search m-b">

                                <select name="searchclass" class="niceselect wide">
                                    <option value="0">choose class</option> -->
                        <?php
                        // foreach ($classsearch as $stdclass) {
                        //     echo "<option value='" . $stdclass['class_id'] . "'";

                        //     if ((isset($_GET['searchclass']) && $_GET['searchclass'] == $stdclass['class_id']) || (isset($_SESSION['searchclass']) && $_SESSION['searchclass'] == $stdclass['class_id'])) {

                        //         echo "selected";
                        //     }
                        //     echo ">" .  $stdclass['class_name'] . "</option>";
                        // }
                        ?>
                        <!-- </select>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>

                            </form>
                            <div class="clearfix m-b"></div>
                        </div> -->
                        <!-- End Choose Select -->
                    </div>
                    <div class="clearfix"></div>

                    <!-- start pager -->
                    <ul class="nav nav-tabs m-b pager-section">
                        <li class="active"><a href="" data-target="all" class="all">All Services</a> </li>
                        <!-- <li> <a href="" data-target="wait">wait approve</a> </li>
                        <li> <a href="" data-target="approved">approved</a> </li> -->
                    </ul>
                    <!-- End pager -->

                    <div class="clearfix"></div>
                    <form action="<?= $_SERVER['PHP_SELF']; ?> " method="get" class="parent-search m-b">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <input type="text" class="form-control input-sm" id="search" placeholder="Search" name="search">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
                                <?php
                                if (isset($_GET['search'])) {
                                    $get = $_GET['search'];
                                    $and = "And (services_name  LIKE  '%$get%') OR (services_name_ar  LIKE  '%$get%') ";
                                } else {
                                    $and = null;
                                };
                                ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="clearfix"></div>
                    <!-- End pager  -->
                    <table class="table  table-bordered table-hover table-responsive table-section">
                        <thead>
                            <tr>
                                <td>category name</td>
                                <td class="hidden-xs">services name</td>


                                <td>control</td>
                            </tr>
                        </thead>
                        <?php
                        $services = getAllData("servciesview", "1 = 1  $and ORDER BY services_id DESC  LIMIT $startpage,$perpage ")['values'];
                        foreach ($services as $service) {
                        ?>
                            <tr>
                                <td class=" "><?php echo $service['categories_name']
                                                ?></td>
                                <td class="hidden-xs "><?php echo $service['services_name']
                                                        ?></td>
                                <td>
                                    <a href="<?= $linkeditpage ?>?servicesid=<?= $service['services_id'] ?>&service=<?php echo urlencode(serialize($service)); ?>" class="btn-primary btn-sm mg-h-5 "> <i class="fa fa-edit"> </i> <span class="hidden-xs">Edit</span> </a>
                                    <a href="<?= $linkdeletepage ?>?servicesid=<?php echo  $service['services_id']
                                                                                ?>&filename=<?= $service['services_desc'] ; ?>" class="btn-danger btn-sm mg-h-5 "><i class="fa fa-remove"> </i> <span class="hidden-xs">Delete</span> </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <?php include "../../include/pager.php" ;  ?>
                </div>
            </div>


            <!-- End Body ======================================= -->

        </div>



    </div>
    <!-- End SideBar And Body Page -->


</div>


<!-- End Body  -->



<?php include "../../include/footer.php";  ?>
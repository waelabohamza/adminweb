<?php include "../../ini.php";  ?>
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


            <div class="panel panel-default panel-custom manage">
                <div class="panel-heading">
                    <h3 class="panel-title"> Users </h3>
                </div>
                <div class="panel-body">
                    <div class="row m-b">
                        <div class="col-xs-6 col-sm-9 ">
                            <a href="addusers.php" class="btn btn-success btn-sm">+ Add users</a>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-pull-right">

                            <form action="" method="get" class="parent-search m-b">

                                <select name="searchclass" class="niceselect wide">
                                    <option value="0">choose class</option>
                                    <?php
                                    // foreach ($classsearch as $stdclass) {
                                    //     echo "<option value='" . $stdclass['class_id'] . "'";

                                    //     if ((isset($_GET['searchclass']) && $_GET['searchclass'] == $stdclass['class_id']) || (isset($_SESSION['searchclass']) && $_SESSION['searchclass'] == $stdclass['class_id'])) {

                                    //         echo "selected";
                                    //     }
                                    //     echo ">" .  $stdclass['class_name'] . "</option>";
                                    // }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>

                            </form>
                            <div class="clearfix m-b"></div>




                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <!-- start pager -->
                    <ul class="nav nav-tabs m-b pager-section">
                        <li class="active"><a href="" data-target="all" class="all">All users</a> </li>
                        <li> <a href="" data-target="wait">wait approve</a> </li>
                        <li> <a href="" data-target="approved">approved</a> </li>
                    </ul>
                    <!-- End pager -->

                    <div class="clearfix"></div>
                    <form action="<?= $_SERVER['PHP_SELF']; ?> " method="get" class="parent-search m-b">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <input type="text" class="form-control input-sm" id="search" placeholder="Search" name="searchstd">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
                                <?php
                                if (isset($_GET['searchstd'])) {
                                    $get = $_GET['searchstd'];
                                    $and = "And users_name  LIKE  '%$get%' ";
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
                                <td>name</td>
                                <td class="hidden-xs">phone</td>
                                <td class="hidden-xs">email</td>

                                <td>control</td>
                            </tr>
                        </thead>

                        <?php
                        $users = getAllData("users", "users_role != 1 $and ORDER BY users_id DESC")['values'];


                        foreach ($users as $user) {
                        ?>
                            <tr>
                                <td class=" "><?php echo $user['users_name']
                                                ?></td>
                                <td class="hidden-xs <?php if ($user['users_approve'] == 1) {
                                                            echo "approved";
                                                        } else {
                                                            echo "wait";
                                                        };
                                                        ?>"><?php echo $user['users_phone']
                                                            ?></td>
                                <td class="hidden-xs <?php if ($user['users_approve'] == 1) {
                                                            echo "approved";
                                                        } else {
                                                            echo "wait";
                                                        };
                                                        ?>"><?php echo $user['users_email']
                                                            ?></td>

                                <td>
                                    <a href="users.php?do=edit&stdid=<?php   //echo $user['std_id']  
                                                                        ?>" class="btn-primary btn-sm mg-h-5 <?php //echo $user['std_section']; 
                                                                                                                ?>"> <i class="fa fa-edit"> </i> <span class="hidden-xs">Edit</span> </a>


                                    <a href="deleteusers.php?userid=<?php echo  $user['users_id']
                                                                    ?>" class="btn-danger btn-sm mg-h-5 <?php //echo $user['std_section']; 
                                                                                                        ?>"><i class="fa fa-remove"> </i> <span class="hidden-xs">Delete</span> </a>

                                    <?php if ($user['users_approve'] == "0") {  ?>

                                        <a href="approveusers.php?userid=<?php echo  $user['users_id']
                                                                            ?>" class="btn-info btn-sm mg-h-5 <?php //echo $user['std_section']; 
                                                                                                                ?>"><i class="fa fa-check"></i> <span class="hidden-xs">Approve</span> </a>
                                    <?php } ?>
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
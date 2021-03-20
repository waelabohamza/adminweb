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
                    <h3 class="panel-title"> Categories </h3>
                </div>
                <div class="panel-body">
                    <div class="row m-b">
                        <div class="col-xs-12 col-sm-12 ">
                            <a href="addcategories.php" class="btn btn-success btn-sm">+ Add users</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <!-- start pager -->
                    <ul class="nav nav-tabs m-b pager-section">
                        <li class="active"><a href="">All users</a>     </li>
                        <li>               <a href="" >wait approve</a> </li>
                        <li>               <a href=""  >approved</a>    </li>
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
                                // if (!isset($_GET['searchclass']) && !isset($_GET['searchstd'])) {
                                //     echo '<a href="print/print-all-user.php" class="print-button">print excel</a>';
                                // }
                                // if (isset($_GET['searchclass'])) {
                                //     echo '<a href="print/print-class-user.php?stdclass=' . $searchclass . '" class="print-button">print excel</a>';
                                // }
                                ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="clearfix"></div>
                    <!-- End pager  -->
                    <table class="table  table-bordered table-hover table-responsive table-user">
                        <thead>
                            <tr>
                                <td>name</td>
                                <td class="hidden-xs">phone</td>
                                <td class="hidden-xs">email</td>

                                <td>control</td>
                            </tr>
                        </thead>

                        <?php
                        $users = getAllData("users", "users_role != 1")['values'];


                        foreach ($users as $user) {
                        ?>

                            <tr>
                                <td class=" "><?php echo $user['users_name']
                                                ?></td>
                                <td class="hidden-xs <?php //echo  $user['std_section']; 
                                                        ?>"><?php echo $user['users_phone']
                                                            ?></td>
                                <td class="hidden-xs <?php //echo  $user['std_section']; 
                                                        ?>"><?php echo $user['users_email']
                                                            ?></td>

                                <td>
                                    <a href="users.php?do=edit&stdid=<?php   //echo $user['std_id']  
                                                                        ?>" class="btn-success btn-sm <?php //echo $user['std_section']; 
                                                                                                        ?>">Edit</a>
                                    <a href="users.php?do=view&stdid=<?php  // echo $user['std_id'] 
                                                                        ?>" class="btn-primary btn-sm <?php //echo $user['std_section']; 
                                                                                                        ?>">view</a>
                                    <?php if ($user['users_approve'] == "0") {  ?>

                                        <a href="users.php?do=delete&stdid=<?php //echo  $user['std_id'] 
                                                                            ?>" class="btn-info btn-sm <?php //echo $user['std_section']; 
                                                                                                        ?>">Approve</a>
                                    <?php } ?>
                                    <a href="users.php?do=delete&stdid=<?php //echo  $user['std_id'] 
                                                                        ?>" class="btn-danger btn-sm <?php //echo $user['std_section']; 
                                                                                                        ?>">delete</a>
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
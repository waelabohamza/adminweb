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
                        <div class="col-xs-6 col-sm-9 ">
                            <a href="addcategories.php" class="btn btn-success btn-sm">+ Add Categories</a>
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

                        <li role="presentation" class="active"><a href="" class="all-category">All categories</a></li>
                        <li role="presentation"><a href="" data-target="<?php //echo $sectionpager['section_id'];  
                                                                        ?>"><?php //echo $sectionpager['section_name']; 
                                                                            ?> </a></li>

                    </ul>
                    <div class="clearfix"></div>
                    <form action="<?= $_SERVER['PHP_SELF']; ?> " method="get" class="parent-search m-b">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <input type="text" class="form-control input-sm" id="search" placeholder="Search" name="searchstd">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
                                <?php
                                // if (!isset($_GET['searchclass']) && !isset($_GET['searchstd'])) {
                                //     echo '<a href="print/print-all-category.php" class="print-button">print excel</a>';
                                // }
                                // if (isset($_GET['searchclass'])) {
                                //     echo '<a href="print/print-class-category.php?stdclass=' . $searchclass . '" class="print-button">print excel</a>';
                                // }
                                ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="clearfix"></div>
                    <!-- End pager  -->
                    <table class="table  table-bordered table-hover table-responsive table-category">
                        <thead>
                            <tr>
                                <td>name</td>
                                <td class="hidden-xs">phone</td>
                                <td class="hidden-xs">email</td>
                                <td class="hidden-xs">Class</td>
                                <td>control</td>
                            </tr>
                        </thead>

                        <?php
                        $categories = getAllData("categories", "1 = 1")['values'];


                        foreach ($categories as $category) {
                        ?>

                            <tr>
                                <td class=" "><?php echo $category['categories_name']
                                                ?></td>
                                <td class="hidden-xs <?php //echo  $category['std_section']; 
                                                        ?>"><?php echo $category['categories']
                                                        ?></td>
                                <td class="hidden-xs <?php //echo  $category['std_section']; 
                                                        ?>"><?php //echo $category['std_phone'] 
                                                        ?></td>
                                <td class="hidden-xs <?php //echo  $category['std_section']; 
                                                        ?>"><?php //echo $category['class_name'] 
                                                        ?></td>
                                <td>
                                    <a href="categorys.php?do=edit&stdid=<?php   //echo $category['std_id']  
                                                                            ?>" class="btn-info btn-sm <?php //echo $category['std_section']; 
                                                                                                ?>">Edit</a>
                                    <a href="categorys.php?do=view&stdid=<?php  // echo $category['std_id'] 
                                                                            ?>" class="btn-primary btn-sm <?php //echo $category['std_section']; 
                                                                                                    ?>">view</a>
                                    <a href="categorys.php?do=delete&stdid=<?php //echo  $category['std_id'] 
                                                                            ?>" class="btn-danger btn-sm <?php //echo $category['std_section']; 
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
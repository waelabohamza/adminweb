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

<div class="panel panel-default panel-custom">
        <div class="panel-heading">
            <h3 class="panel-title">Add Categories</h3>
        </div>
           <div class="panel-body">

              <form  enctype="multipart/form-data" autocomplete="off" 
              class="form-horizontal addvalidate" action="<?php echo $_SERVER['PHP_SELF'] . '?do=insert';?>" method="post">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">name</label>
                  <div class="col-sm-10">
                    <input type="text" name="stdname" class="form-control" id="name" 
                    placeholder="name">
                  </div>
                </div>
               
                 <div class="form-group">
                  <label for="religion" class="col-sm-2 control-label">religion</label>
                  <div class="col-sm-10">
                    <select class="niceselect wide" name="stdreligion">
                       <option value="0">...</option>
                       <option value="1">Muslim</option>
                       <option value="2">Christian</option>
                       <option value="2">Jewish</option>
                       <option value="4">Atheist</option>
                       <option value="5">other</option>
                    </select>
                  </div>
                </div>
               
                
                 <div class="form-group">
                  <label for="image" class="col-sm-2 control-label">image</label>
                  <div class=" file-upload col-sm-10">
                    <div class="file-select">
                      <div class="file-select-button" id="fileName">Choose image</div>
                      <div class="file-select-name" id="noFile">No image chosen...</div> 
                      <input type="file" name="stdimage" id="chooseFile" placeholder="image">
                    </div>
                  </div>
                </div>
        
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success btn-sm">Add Categories</button>
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



<?php include "../../include/footer.php";  ?>
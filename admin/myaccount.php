<?php 
session_start();
include('include/header1.php'); ?>

<div class="main-container container-fluid">
  <!-- Page Container -->
  <div class="page-container">

    <!-- Page Sidebar -->
    <?php include('include/sidebar1.php'); ?>
    <!-- /Page Sidebar -->
           
    <!-- Page Content -->
    <div class="page-content">
      <!-- Page Breadcrumb -->
      <div class="page-breadcrumbs">
        <ul class="breadcrumb">
          <li c>lass="active">
            <i class="fa fa-home"></i>
            Dashboard
          </li>
                        
        </ul
      </div>
      <!-- /Page Breadcrumb -->
      <!-- Page Header -->
      <div class="page-header position-relative">
        <div class="header-title">
          <h1>
            Dashboard
          </h1>
        </div>         
      </div>
      <!-- /Page Header -->
      <!-- Page Body -->
      <div class="page-body">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
					    <div class="col-lg-4"></div>
					    <div class="col-lg-4">
				        <?php	if(isset($_GET['success']))
	              {
			          ?>
				 
                <div class="alert alert-info">
                  <i class="glyphicon glyphicon-home"></i> &nbsp; Welcome To Our Dashboard Mr. <?php echo ucfirst($name); ?> .
                </div>
                <?php
	              }
	              ?>
	            </div>
	            <div class="col-lg-4"></div>
            </div>
			

          </div>
        </div>
         
      </div>
      <!-- /Page Body -->
    </div>
    <!-- /Page Content -->

  </div>
  <!-- /Page Container -->
  <!-- Main Container -->

</div>

<!--Basic Scripts-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

<!--Beyond Scripts-->
<script src="assets/js/beyond.js"></script>
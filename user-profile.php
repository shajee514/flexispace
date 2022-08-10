
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/header.php');

if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['remsuid'];
    $fullname=$_POST['fullname'];
  $mobno=$_POST['mobilenumber'];
  $aboutme=$_POST['aboutme'];
 
     $query=mysqli_query($con, "update tbluser 
     set FullName ='$fullname', 
     MobileNumber='$mobno',Aboutme ='$aboutme'
     where ID='$uid'");
    if ($query) {
    $msg="User profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }

?>

			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ User Dashboard ================================== -->
			<div class="page-title" style="background:#f4f4f4 url(assets/img/slider-5.jpg);" data-overlay="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                    <h2 class="breadcrumb-title">User Profile</h2>
                </div>

            </div>
        </div>
    </div>
</div>

			<section class="gray pt-5 pb-5">
<div class="container-fluid">

<div class="row">
<?php include_once('includes/sidebar.php');?>
			


						
<div class="col-lg-9 col-md-9 col-sm-12">
<div class="dashboard-body">
<form class="mb-0" method="post">
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>	
<div class="dashboard-wraper">
<?php
  $uid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select * 
from tbluser where ID='$uid'");


while ($row=mysqli_fetch_array($ret)) {

?>
<!-- Basic Information -->

<div class="frm_submit_block">	
<h4>My Account</h4>
<div class="frm_submit_wrap">
<div class="form-row">
											
<div class="form-group col-md-6">
<label>Your Name</label>
<input type="text" class="form-control" 
name="fullname" id="fullname" required="true"
value="<?php  echo $row['FullName'];?>">
</div>
												
<div class="form-group col-md-6">
<label>Email</label>
<input type="email" class="form-control" 
name="email" id="email" readonly="true" 
value="<?php  echo $row['Email'];?>">
</div>

										
<div class="form-group col-md-6">
<label>Phone</label>
<input type="text" class="form-control"
name="mobilenumber" id="mobilenumber" 
required="true" 
value="<?php  echo $row['MobileNumber'];?>">
</div>
												
												
												
											
												
											
											
												
</div>
</div>
</div>
									

												
<div class="form-group col-lg-12 col-md-12 mt-4">
<button class="btn btn-theme btn-lg" 
type="submit" name="submit">Save Changes</button>

</form>
</div>
												
											</div>
										</div>
									</div>
									
								</div>
							
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ User Dashboard End ================================== -->
			
			<!-- ============================ Call To Action ================================== -->
		
			<!-- ============================ Call To Action End ================================== -->
			
		
			<!-- End Modal -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/ion.rangeSlider.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/slick.js"></script>
		<script src="assets/js/slider-bg.js"></script>
		<script src="assets/js/lightbox.js"></script> 
		<script src="assets/js/imagesloaded.js"></script>
		<script src="assets/js/daterangepicker.js"></script>
		<script src="assets/js/custom.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

	</body>
	<?php

include('includes/footer.php');
?>
            <?php }  ?>

			<?php }  ?>
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/header.php');



error_reporting(0);
if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$uid=$_SESSION['remsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbluser where ID='$uid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$uid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}

  
?>
<script type="text/javascript">
function checkpass() {
    if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
        alert('New Password and Confirm Password field does not match');
        document.changepassword.confirmpassword.focus();
        return false;
    }
    return true;
}
</script>

<!-- ============================ Page Title End ================================== -->

<!-- ============================ User Dashboard ================================== -->


<div class="page-title" style="background:#f4f4f4 url(assets/img/slider-5.jpg);" data-overlay="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
                    <h2 class="breadcrumb-title">Edit or Change Password</h2>
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
<form class="mb-0" method="post"
name="changepassword" onsubmit="return
                     checkpass();">
  <?php
$uid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select * from tbluser
 where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                              <p style="font-size:16px; color:red"
                               align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
<!-- Basic Information -->

<div class="frm_submit_block">	
<h4>Change your Account password</h4>
<div class="frm_submit_wrap">
<div class="form-row">
											
<div class="form-group col-md-6">
<label>Current Password</label>
<input type="password" class="form-control" 
id="currentpassword" name="currentpassword" 
value="" required="true">
</div>
												
<div class="form-group col-md-6">
<label>New Password</label>
<input type="password" 
name="newpassword" id="newpassword" 
class="form-control" value="" required='true'>
</div>

										
<div class="form-group col-md-6">
<label>Confirm password</label>
<input type="password" name="confirmpassword" id="confirmpassword" 
class="form-control" value="" required='true'>
</div>
												
												
												
											
												
											
											
												
</div>
</div>
</div>
									

												
<div class="form-group col-lg-12 col-md-12 mt-4">
<?php }?>

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
   

        </div>
    </div>
    <?php }  ?>

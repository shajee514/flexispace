<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/header.php');


if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  } else{
    

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">



<body>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
         <?php include_once('includes/header.php');?>

        <!-- Page Title #1
============================================ -->
<div class="page-title" style="background:#f4f4f4 url(assets/img/slider-5.jpg);" data-overlay="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Inquiry</li>
                    </ol>
                    <h2 class="breadcrumb-title">Recieve Inquiry</h2>
                </div>

            </div>
        </div>
    </div>
</div>
        <!-- #page-title end -->

        <!-- #user-profile
============================================= -->
        <section id="user-profile" class="user-profile">
            <div class="container">
                <div class="row">
                    <?php include_once('includes/sidebar.php');?>
                    <!-- .col-md-4 -->
                    <div class="col-xs-12 col-sm-12 col-md-8">

                       
                            
                            <div class="form-box">
                                
                                <h4 class="form--title">Enquiry Details</h4>
                                
                              
                               
                                
                                <div class="form-group">
                                   <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
            
                 
                    <th>Enquiry Number</th>
                    <th>Full Name</th>
                    <th>Mobile Number</th>
                   
                          <th>Status</th>
                          <th>Action</th>
                </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              </tr>
                                        </thead>
               <?php
               
               $uemail=$_SESSION['uemail'];
$ret=mysqli_query($con,"select * from  tblenquiry where Email='$uemail'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['EnquiryNumber'];?></td>
                  <td><?php  echo $row['FullName'];?></td>
                  <td><?php  echo $row['MobileNumber'];?></td>
                  <td><?php if($row['Status']=="")
{
echo "Not Confiremed Yet";
} else {
echo $row['Status'];
}?></td>
                  
                  <td><a href="view-enquiry-detail.php?viewid=<?php echo $row['ID'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
              </table>
                                </div>
                                <!-- .form-group end -->
                            </div>
                          
                            
                           
                       
                    </div>
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row end -->
            </div>
        </section>
        <!-- #user-profile  end -->

        <!-- cta #1
============================================= -->



       <?php include_once('includes/footer.php');?>
    </div>
    <!-- #wrapper end -->

  
</body>

</html>
<?php }  ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
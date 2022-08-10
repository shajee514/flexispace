<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/header.php');

if (strlen($_SESSION['remsuid']==0 || $_SESSION['ut']==3)) {
  header('location:logout.php');
  } else{



  ?>


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
<section id="add-property" class="add-property">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                       
                           
  
                          
                           

                            <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Total Received Enquiry</h4>
                                        
                                        <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
            
                 
                    <th>Enquiry Number</th>
                    <th>Full Name</th>
                    <th>Mobile Number</th>
                   
                          <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
               $uid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select tblenquiry.* from  tblenquiry join 
tblproperty on tblproperty.Id=tblenquiry.PropertyID where tblenquiry.Status
 is null and tblproperty.UserID='$uid' ");
$num=mysqli_num_rows($ret);
if($num >0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['EnquiryNumber'];?></td>
                  <td><?php  echo $row['FullName'];?></td>
                  <td><?php  echo $row['MobileNumber'];?></td>
                  
                  <td><a href="view-enquiry-detail.php?viewid=<?php echo $row['ID'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else {?>
<tr>
 <th colspan="5" style="text-align: center; color:red">No Record found</th>   

</tr>
<?php } ?>
              </table>             </div>
                                    <!-- .col-md-12 end -->
                                   
                                   
                                   
                                   
                                    <!-- .col-md-12 end -->

                                </div>
                                <!-- .row end -->
                            </div>
                  
                            
                       
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
        </section>

        <?php } ?>
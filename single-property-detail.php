<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/header.php');

if(isset($_POST['submit']))
  {
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobilenumber=$_POST['mobnum'];
    $message=$_POST['message'];
    $enquirynumber = mt_rand(100000000, 999999999);
$proid=$_GET['proid'];
    $query1=mysqli_query($con,"insert into  
    tblenquiry(PropertyID,FullName,Email,MobileNumber
    ,Message,EnquiryNumber)
    
    value('$proid','$fullname','$email',
    '$mobilenumber','$message','$enquirynumber')");
        if ($query1) {
 echo '<script>alert("Your enquiry successfully 
 send. Your Enquiry number is "+"'.$enquirynumber.'")
 </script>';
echo "<script>window.location.href='properties-grid.php'
</script>";
  }
  else
    {
echo '<script>alert("Something Went Wrong. Please
 try again")</script>';
    }

  
}


//Submit Feedback
if(isset($_POST['submitreview']))
{
if (strlen($_SESSION['remsuid']==0)) 
{
 echo '<script>alert("Login required for 
 publish review")</script>';
  } else {
$review=$_POST['reviewcomment'];
$uid=$_SESSION['remsuid'];
$pid=$_GET['proid'];
$query=mysqli_query($con,"insert into 
tblfeedback(UserId,PropertyId,UserRemark)
 value('$uid','$pid','$review')");
 echo '<script>alert("Your review successfully 
 submited, after review it will publish")</script>';
 echo "<script>window.location.href='properties-grid.php'
 </script>";
}
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>


    <title>FlexiSpace Best Co workingSpace provider</title>
</head>



<br>
<br>
<section id="property-single-gallery" 
class="property-single-gallery">
    <?php 

$proid=$_GET['proid'];
$query=mysqli_query($con,"select 
tblproperty.*,tblcountry.CountryName,
tblstate.StateName from
 tblproperty join tblcountry on tblcountry.ID=tblproperty.
Country join tblstate on 
tblstate.ID=tblproperty.State where 
tblproperty.ID='$proid'");
$num=mysqli_num_rows($query);
while ($row=mysqli_fetch_array($query)) {
?>


<section class="gallery_parts pt-2 pb-2 d-none d-sm-none d-md-none d-lg-none d-xl-block">
<div class="container">
<div class="row align-items-center">


<div class="col-lg-8 col-md-7 col-sm-12 pr-1">
<div class="gg_single_part left">
	

	
<img src="propertyimages/<?php 
echo $row['FeaturedImage'];?>" 
class="img-fluid mx-auto" alt="" /></div>
</div>

<div class="col-lg-4 col-md-5 col-sm-12 pl-1">
<div class="gg_single_part-right min">
	
		<img src="propertyimages/
<?php echo $row['GalleryImage1'];?>" 
		class="img-fluid mx-auto" alt="" /></div>
<div class="gg_single_part-right min mt-2 mb-2">
	

<img src="propertyimages/
<?php echo $row['GalleryImage2'];?>"
 class="img-fluid mx-auto" alt="" /></div>


<div class="gg_single_part-right min">
	
	
<img src="propertyimages/
<?php echo $row['GalleryImage3'];?>"
 class="img-fluid mx-auto"

alt="" /></div>

						</div>
					</div>
				</div>
			</section>
			<br><br><br>
    <div class="container">
        <div class="row">

            <!-- property main detail -->
            <div class="col-lg-8 col-md-12 col-sm-12">

                <div class="property_info_detail_wrap mb-4">

                    <div class="property_info_detail_wrap_first">
                        <div class="pr-price-into">
                            <ul class="prs_lists">
                                <li><span class="bed">
                                        <?php echo $row['CountryName'];?>
                                    </span></li>
                                <li><span class="bath">
                                        <?php echo $row['StateName'];?>
                                    </span></li>
                                <li><span class="gar">
                                        <?php echo $row['City'];?>
                                    </span></li>
                           
                            </ul>
                            <h2><?php echo $row['PropertyTitle'];?></h2>
                            <span><i class="lni-map-marker">

                                </i> <?php echo $row['Address'];?></span>
                        </div>
                    </div>

                    <div class="property_detail_section">
                        <div class="prt-sect-pric">
                            <ul class="_share_lists">
                                <li><a href="#"><i class="fa fa-bookmark"></i></a></li>
                                <li><a href="#"><i class="fa fa-share"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="property_block_wrap">

                    <div class="property_block_wrap_header">
                        <h4 class="property_block_title">About Property</h4>
                    </div>

                    <div class="block-body">
                        <p> <?php echo $row['PropertDescription'];?> </p>
                    </div>

                </div>

				<div class="property_block_wrap">
								
<div class="property_block_wrap_header">
<h4 class="property_block_title">Description</h4>
</div>
								
<div class="block-body">
<ul class="row p-0 m-0">
<li class="col-lg-4 col-md-6 mb-2 p-0">
	<p>Size: <?php echo $row['Size'];?></p>
	
	</li>

	<li class="col-lg-4 col-md-6 mb-2 p-0">
	<p>Type: <?php echo $row['Type'];?></p>
	
	</li>


	<li class="col-lg-4 col-md-6 mb-2 p-0">
	<p>Location: <?php echo $row['Location'];?></p>
	
	</li>
	<li class="col-lg-4 col-md-6 mb-2 p-0">
	<p>Status: <?php echo $row['Status'];?></p>
	
	</li>

	<li class="col-lg-4 col-md-6 mb-2 p-0">
	<p>Zipcode: <?php echo $row['ZipCode'];?></p>
	
	</li>


									</ul>
								</div>
								
							</div> 

							<div class="property-single-features inner-box">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="heading">
<h2 class="heading--title">Features</h2>
</div>
                                </div>
                                <!-- feature-item #1 -->
<div class="col-xs-6 col-sm-4 col-md-4">
<div class="feature-item">
<p>    
<?php if($row['CenterCooling']==1){?>
<img src="assets/images/check.png" width="12" 
height="12">
<?php } else { ?>
    <img src="assets/images/close.png" 
    width="12" height="12">               

    <?php } ?>    Center Cooling</p>
</div>
</div>
<!-- feature-item end -->
<!-- feature-item #2 -->
<div class="col-xs-6 col-sm-4 col-md-4">
<div class="feature-item">
  <p> 
<?php if($row['Balcony']==1){?>
<img src="assets/images/check.png" 
width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png"
     width="12" height="12">               
<?php } ?>Printing</p>
</div>
</div>
<!-- feature-item end -->
<!-- feature-item #3 -->
<div class="col-xs-6 col-sm-4 col-md-4">
<div class="feature-item">
<p>
<?php if($row['PetFriendly']==1){?>
<img src="assets/images/check.png" 
width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png"
     width="12" height="12">               
<?php } ?>Fast Internet</p>
                                    </div>
                                </div>
<!-- feature-item end -->
<!-- feature-item #4 -->

              <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="feature-item">
                    <p>
 <?php if($row['Barbeque']==1){?>
<img src="assets/images/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>Fire Alarm</p>
                                    </div>
                                </div>


<div class="col-xs-6 col-sm-4 col-md-4">
<div class="feature-item">
                                    <p>
 <?php if($row['FireAlarm']==1){?>
<img src="assets/images/check.png" 
width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" 
    width="12" height="12">               
<?php } ?>Projector</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #5 -->
<div class="col-xs-6 col-sm-4 col-md-4">
<div class="feature-item">
<p>
<?php if($row['ModernKitchen']==1){?>
<img src="assets/images/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>Phone Boot</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #6 -->
<div class="col-xs-6 col-sm-4 col-md-4">
<div class="feature-item">
<p>
<?php if($row['Storage']==1){?>
<img src="assets/images/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>Tea</p>
</div>
                                </div>
<div class="col-xs-6 col-sm-4 col-md-4">
<div class="feature-item">
<p>
<?php if($row['Dryer']==1){?>
<img src="assets/images/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>Games</p>
                                    </div>
                                </div>
<div class="col-xs-6 col-sm-4 col-md-4">
<div class="feature-item">
<p>
<?php if($row['Heating']==1){?>
<img src="assets/images/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>Heating</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #8 -->
<div class="col-xs-6 col-sm-4 col-md-4">
<div class="feature-item">
<p>
<?php if($row['Pool']==1){?>
<img src="assets/images/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>Pool</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #9 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>
                                        <?php if($row['Laundry']==1){?>
<img src="assets/images/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>Scanner</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #10 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>
                                        <?php if($row['Gym']==1){?>
<img src="assets/images/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>Gym</p>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>
                                        <?php if($row['Sauna']==1){?>
<img src="assets/images/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>Bike Parking</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #11 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>
                                        <?php if($row['Elevator']==1){?>
<img src="assets/images/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>Elevator</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #12 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>
                                        <?php if($row['DishWasher']==1){?>
<img src="assets/images/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>Dish Washer</p>
                                    </div>
                                </div>
<div class="col-xs-6 col-sm-4 col-md-4">
<div class="feature-item">
<p>
<?php if($row['EmergencyExit']==1){?>
<img src="assets/images/check.png" 
width="12" height="12">
<?php } else { ?>
    <img src="assets/images/close.png" width="12" height="12">               
<?php } ?>EmergencyExit</p>
                                    </div>
                                </div>

                                <!-- feature-item end -->
                            </div>
                            <!-- .row end -->
                        </div>
                    <br><br><br>

				
<div class="property_block_wrap">

<div class="property_block_wrap_header">
<h4 class="property_block_title">Write a Review</h4>
</div>

<div class="block-body">
<form id="post-comment" class="mb-0" method="post">
<div class="row">

                            
<div class="col-xs-12 col-sm-12 col-md-12">
<form id="post-comment" class="mb-0" method="post">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<label for="review-comment">Review*</label>
   <textarea class="form-control" 
   id="reviewcomment" name="reviewcomment"
    rows="2" required></textarea>
</div>
</div>
   <br>                          
<div class="col-xs-12 col-sm-12 col-md-12">

          <button type="submit" 
name="submitreview"
class="btn theme-bg rounded">Submit</button>

</div>
</div>
</form>
</div>
                          



                        </div>
                    </div>

                </div>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="property-sidebar">

<div class="sider_blocks_wrap">
<div class="side-booking-header">
<div class="sb-header-left">
<h3 class="price">
	Pkr-
<?php echo
 $row['RentorsalePrice'];?>
 <sub><?php echo $row['Status'];?></sub></h3>
</div>

</div>
<div class="side-booking-body">
<div class="row">
                               
                              
                                
                             

                              

                              

                                

                               
                            </div>
                        </div>
                    </div>

                    <!-- Agent Detail -->
<div class="sider_blocks_wrap">
<div class="side-booking-body">
<div class="agent-_blocks_title">
<?php                
$ret1=mysqli_query($con,"select * from tbluser 
join tblproperty on tblproperty.UserID=tbluser.ID 
where tblproperty.ID=$proid");
$cnt=1;
while ($row1=mysqli_fetch_array($ret1)) {

?>
<div class="widget--title">
<?php if($row1['UserType']=="1"){?>
<h5>Posted by  Agent/Broker</h5>
<?php } else{ ?>
<h5>Posted by  Owner</h5>
<?php } ?>
<div class="agent-_blocks_thumb">
									
<img src="assets/img/images.png" alt=""></div>
<div class="agent-_blocks_caption">
<h4><a href="#"><?php echo $row1['FullName'];?></a></h4>
<span class="approved-agent">
	<i class="ti-check"></i>approved</span>
</div>
<div class="clearfix"></div>
<br><br>
</div>
<?php if (strlen($_SESSION['remsuid']!=0)) {?>


<span id="number" data-last="+92300000000">
<span><i class="ti-headphone-alt"></i>
<a class="see"><?php echo $row1['MobileNumber'];?></a></span>
</span>
<span id="number" >
<span><i class="ti-email"></i>
<a class="see"><?php echo $row1['Email'];?>
</a></span>
</span>
<?php }?>
<?php if (strlen($_SESSION['remsuid']==0)) {?>

<p> Need Login to Access Contact number</p>
<?php }?>
<br><br>

<a href="#" class="agent-btn-contact" 
data-toggle="modal" data-target="#autho-message"><i
class="ti-comment-alt"></i>Message</a>
                        </div>
                    </div>

                    <!-- Mortgage Calculator -->
                   
                    <!-- Similar Property -->
<div class="sidebar-widgets">

<h4>Similar Property</h4>

<div class="sidebar_featured_property">

<!-- List Sibar Property -->
<div class="sides_list_property">
<div class="sides_list_property_thumb">
<?php
                      
$query=mysqli_query($con,"select * from tblproperty
order by rand() limit 1");
while($row=mysqli_fetch_array($query))
					  {
					  ?>
<img src="propertyimages/
<?php echo $row['FeaturedImage'];?>"
class="img-fluid" alt="" />
</div>
<div class="sides_list_property_detail">
<h4><a href="single-property-detail.php?proid=<?php 
echo $row['ID'];?>">
<?php echo $row['PropertyTitle'];?></a></h4>
<span><i class="ti-location-pin">

</i><?php echo $row['Address'];?></span>
<div class="lists_property_price">
<div class="lists_property_types">
<div class="property_types_vlix sale">
<?php echo $row['Status'];?>
</div>
</div>
<div class="lists_property_price_value">
<h4>PKR-<?php echo $row['RentorsalePrice'];?></h4>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <!-- List Sibar Property -->
                           
<div class="modal fade" id="autho-message" 
tabindex="-1" role="dialog" 

aria-labelledby="authomessage" aria-hidden="true">
<div class="modal-dialog 
modal-dialog-centered login-pop-form" role="document">
<div class="modal-content" 
id="authomessage">
<span class="mod-close" 
data-dismiss="modal" aria-hidden="true">

<i class="ti-close"></i></span>

<?php if($_SESSION['remsuid']==0)
{ ?>
<div class="modal-body">
<h4 class="modal-header-title">Drop Message</h4>
<div class="login-form">
<form class="mb-0" method="post">
								

<div class="form-group">
<label for="contact-name">Your Name*</label>
<input type="text" class="form-control" 
name="fullname" id="fullname" required="true">
</div>

<div class="form-group">
<label for="contact-email">Email Address*</label>
<input type="email" class="form-control"
 name="email" id="email" required="true">
</div>
<div class="form-group">
<label for="contact-phone">Phone Number</label>
<input type="text" class="form-control"
 name="mobnum" id="mobnum" required="true"
  maxlength="10" pattern="[0-9]+">
</div>

<div class="form-group">
<label>Messages</label>
<div class="input-with-icons">
<textarea class="form-control ht-80"
 name="message" id="message" rows="2"></textarea>
</div>
</div>
									
<div class="form-group">
<button type="submit" value="Send Request"
 name="submit"
class="btn btn-md full-width pop-login">

Send Message</button>
									</div>

								</form>
							</div>
						</div>

                        <?php } else {
//If user is logged in
$uid=$_SESSION['remsuid'];
$sqlq=mysqli_query($con,"select * from 
tbluser where ID='$uid'");
while($ret=mysqli_fetch_array($sqlq))
{
$fname=$ret['FullName'];
$uemail=$ret['Email'];
$mnumebr=$ret['MobileNumber'];
} 
?>         
<div class="modal-body">
<h4 class="modal-header-title">Drop Message</h4>
<div class="login-form">
<form class="mb-0" method="post">
								

<div class="form-group">
<label for="contact-name">Your Name*</label>
<input type="text" class="form-control" 
name="fullname" value="<?php echo $fname;?>" 
id="fullname" required="true">
</div>

<div class="form-group">
<label for="contact-email">Email Address*</label>
<input type="email" class="form-control"
 name="email" id="email" 
  value="<?php echo $uemail;?>" required="true">
</div>
<div class="form-group">
<label for="contact-phone">Phone Number</label>
<input type="text" 
value="<?php echo $mnumebr;?>"
class="form-control"
 name="mobnum" id="mobnum" required="true"
  maxlength="10" pattern="[0-9]+">
</div>

<div class="form-group">
<label>Messages</label>
<div class="input-with-icons">
<textarea class="form-control ht-80"
 name="message" id="message" rows="2"></textarea>
</div>
</div>
									
<div class="form-group">
<button type="submit" value="Send Request"
 name="submit"
class="btn btn-md full-width pop-login">

Send Message</button>
									</div>

								</form>
							</div>
						</div>         
					</div>
				</div>
			</div>
                          

                            <!-- List Sibar Property -->
                            

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
                      </div>

<?php } ?>
    <?php }?>
	<?php } ?>
					  </div>
					  </div>
                      
	<?php include_once('includes/footer.php');?>

    <?php }?>
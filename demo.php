
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/header.php');

if (strlen($_SESSION['remsuid']==0 ||
 $_SESSION['ut']==3)) {
echo "<script>alert('Please login for
 add property.');</script>";
echo "<script>window.location.href
 ='logout.php'</script>";
  }
  else{

if(isset($_POST['submit']))
  {
$uid=$_SESSION['remsuid'];
$protitle=$_POST['propertytitle'];
$prodec=$_POST['propertydescription'];
$type=$_POST['selecttype'];
$status=$_POST['status'];
$location=$_POST['location'];
$bedrooms=$_POST['bedrooms'];
$bathrooms=$_POST['availability'];
$floors=$_POST['floors'];
$garages=$_POST['garages'];
$website=$_POST['Website'];
$size=$_POST['size'];
$srprice=$_POST['rentorsaleprice'];
$beforepricelabel=$_POST['beforepricelabel'];
$afterpricelabel=$_POST['afterpricelabel'];
$ccolling=$_POST['centercolling'];
$balcony=$_POST['Printing'];
$petfrndly=$_POST['petfrndly'];
$barbeque=$_POST['barbeque'];
$firealarm=$_POST['firealarm'];
$modkitchen=$_POST['Parking'];
$storage=$_POST['storage'];
$dryer=$_POST['dryer'];
$heating=$_POST['heating'];
$pool=$_POST['pool'];
$laundry=$_POST['laundry'];
$sauna=$_POST['sauna'];
$gym=$_POST['gym'];
$elevator=$_POST['elevator'];
$dishwasher=$_POST['dishwasher'];
$eexit=$_POST['eexit'];

$proaddress=$_POST['address'];
$procountry=$_POST['country'];
$procity=$_POST['city'];
$prostate=$_POST['state'];
$prozipcode=$_POST['zipcode'];
$neighborhood=$_POST['neighborhood'];

$proid=mt_rand(100000000, 999999999);
//fetured Image
$pic=$_FILES["featuredimage"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));
//Property  Image 1
$pic1=$_FILES["galleryimage1"]["name"];
$extension1 = substr($pic1,strlen($pic1)-4,strlen($pic1));
//Property  Image 2
$pic2=$_FILES["galleryimage2"]["name"];
$extension2 = substr($pic2,strlen($pic2)-4,strlen($pic2));
//Property  Image 3
$pic3=$_FILES["galleryimage3"]["name"];
$extension3 = substr($pic3,strlen($pic3)-4,strlen($pic3));
//Property  Image 4
$pic4=$_FILES["galleryimage4"]["name"];
$extension4 = substr($pic4,strlen($pic4)-4,strlen($pic4));
//Property  Image 5
$pic5=$_FILES["galleryimage5"]["name"];
$extension5 = substr($pic5,strlen($pic5)-4,strlen($pic5));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Featured image has Invalid 
format. Only jpg / jpeg/ png /gif format 
allowed');</script>";
}
if(!in_array($extension1,$allowed_extensions))
{
echo "<script>alert('Property gallery image1 
has Invalid format. Only jpg / jpeg/ png 
/gif format allowed');</script>";
}
if(!in_array($extension2,$allowed_extensions))
{
echo "<script>alert('Property gallery image2 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension3,$allowed_extensions))
{
echo "<script>alert('Property gallery image3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension4,$allowed_extensions))
{
echo "<script>alert('Property gallery image4 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension5,$allowed_extensions))
{
echo "<script>alert('Property gallery image5 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename property images
$propic=md5($pic).time().$extension;
$propic1=md5($pic1).time().$extension1;
$propic2=md5($pic2).time().$extension2;
$propic3=md5($pic3).time().$extension3;
$propic4=md5($pic4).time().$extension4;
$propic5=md5($pic5).time().$extension5;
     move_uploaded_file($_FILES["featuredimage"]
     ["tmp_name"],"propertyimages/".$propic);
     move_uploaded_file($_FILES["galleryimage1"]
     ["tmp_name"],"propertyimages/".$propic1);
     move_uploaded_file($_FILES["galleryimage2"]
     ["tmp_name"],"propertyimages/".$propic2);
     move_uploaded_file($_FILES["galleryimage3"]
     ["tmp_name"],"propertyimages/".$propic3);
     move_uploaded_file($_FILES["galleryimage4"]
     ["tmp_name"],"propertyimages/".$propic4);
     move_uploaded_file($_FILES["galleryimage5"]
     ["tmp_name"],"propertyimages/".$propic5);

    $query=mysqli_query($con,"insert into
     tblproperty(UserID,PropertyTitle,PropertDescription,
     Type,Status,Location,Bedrooms,Availability,Floors,
     Garages,Website,Size, RentorsalePrice,BeforePricelabel,
     AfterPricelabel,PropertyID,CenterCooling,Printing,
     PetFriendly,Barbeque,FireAlarm,ModernKitchen,
     Storage,Dryer,Heating,Pool,Laundry,Sauna,Gym,
     Elevator,DishWasher,EmergencyExit,FeaturedImage,
     GalleryImage1,GalleryImage2,GalleryImage3,
     GalleryImage4,GalleryImage5,Address,Country,
     City,State,ZipCode,Neighborhood)value('$uid','
     $protitle','$prodec','$type','$status',
     '$location','$bedrooms','$bathrooms',
     '$floors','$garages','$website','$size',
     '$srprice','$beforepricelabel',
     '$afterpricelabel','$proid','$ccolling',
     '$balcony','$petfrndly','$barbeque',
     '$firealarm','$modkitchen','$storage',
     '$dryer','$heating','$pool','$laundry',
     '$sauna','$gym','$elevator','$dishwasher',
     '$eexit','$propic','$propic1','$propic2',
     '$propic3','$propic4','$propic5','$proaddress'
     ,'$procountry','$procity','$prostate',
     '$prozipcode','$neighborhood')");
   if ($query) {

    echo '<script>alert("Property detail has
     been added.")</script>';
echo "<script>window.location.href 
='add-property.php'</script>";
  }
  else
    {
echo '<script>alert("Something Went Wrong.
Please try again")</script>';
    }

  
}
}

?>
</head>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>


<script>
function getsate(val) {
  $.ajax({
type:"POST",
url:"get-sate.php",
data:'$countryid='+val,
success:function(data){
$("#state").html(data);
}

  });
}
</script>

<script>
function getcity(val1) {
  $.ajax({
type:"POST",
url:"get-sate.php",
data:'$stateid='+val1,
success:function(data){
$("#city").html(data);
}

  });
}
</script>


			
<!-- ============================ Call To Action End ================================== -->
<div class="page-title" 
style="background:#f4f4f4
 url(assets/img/bg.jpg);" data-overlay="5">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12">

<div class="breadcrumbs-wrap">
<ol class="breadcrumb">
<li class="breadcrumb-item active" 
aria-current="page">Submit Property</li>
</ol>
<h2 class="breadcrumb-title">Submit Your Property</h2>
</div>
							
</div>
</div>
</div>
</div>
			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Submit Property Start ================================== -->
			<section>

<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12">
<form class="mb-0" method="post" 
 enctype="multipart/form-data">
<p style="font-size:16px; color:red" 
align="center"> <?php if($msg){
    echo $msg;
  }  ?> 			
<div class="alert alert-info"
 role="alert">
<p>If you don't have an account 
    you can create one by 
    <a href="index.php">Click Here</a></p>
							</div>
						
						</div>
						
						<!-- Submit Form -->

<div class="col-lg-12 col-md-12">
						
<div class="submit-page p-0">

<!-- Basic Information -->
<div class="frm_submit_block">	
<h3>Basic Information</h3>
<div class="frm_submit_wrap">
<div class="form-row">

<div class="form-group col-md-12">
<label>Property Title<a href="#" 
class="tip-topdata" 
data-tip="Property Title">
<i class="ti-help"></i></a></label>
<input type="text" name="propertytitle" 
id="propertytitle" required class="form-control">
</div>
<div class="form-group col-md-12">
<label>Property Description<a href="#" 
class="tip-topdata" 
data-tip="Property Description">
<i class="ti-help"></i></a></label>
<textarea class="form-control" name="propertydescription" 
id="propertydescription" rows="2"></textarea>
</div>							
<div class="form-group col-md-6">
<label>Property Type</label>
<select id="status" name="selecttype" 
required="true" class="form-control">
<option value="">&nbsp;</option>
<?php $query1=mysqli_query($con,"select * 
from tblpropertytype");
while($row1=mysqli_fetch_array($query1))
              {
              ?>      
<option value="<?php echo $row1['PropertType'];?>">
<?php echo $row1['PropertType'];?></option>
                  <?php } ?>
</select>
</div>
											
<div class="form-group col-md-6">
<label>Country</label>
<select id="ptypes"  name="country" id="country"
     required="true" onChange="getsate(this.value)" 
      class="form-control">
<option value="">&nbsp;</option>
<?php $query=mysqli_query($con,"select *
 from tblcountry");
while($row=mysqli_fetch_array($query))
{
              ?>      
<option value="<?php echo $row['ID'];?>">
<?php echo $row['CountryName'];?></option>
                  <?php } ?>
</select>
</div>
<div class="form-group col-md-6">
<label>State</label>
<select id="text"  name="state" id="state"
     required="true" onChange="getsate(this.value)" 
      class="form-control">
<option value="">&nbsp;</option>
<?php $query=mysqli_query($con,"select *
 from tblstate");
while($row=mysqli_fetch_array($query))
{
              ?>      
<option value="<?php echo $row['CountryID'];?>">
<?php echo $row['StateName'];?></option>
                  <?php } ?>
</select>
</div>	
<div class="form-group col-md-6">
<label>City</label>
<select id="text" name="city" id="city"
     required="true" onChange="getsate(this.value)" 
      class="form-control">
<option value="">&nbsp;</option>
<?php $query=mysqli_query($con,"select *
 from tblcity");
while($row=mysqli_fetch_array($query))
{
              ?>      
<option value="<?php echo $row['CountryID'];?>">
<?php echo $row['CityName'];?></option>
                  <?php } ?>
</select>
</div>	

<div class="form-group col-md-6">
<label>Status</label>
<select id="status" name="status" class="form-control">
<option value="">&nbsp;</option>
<option value="1">Daily</option>
<option value="2">Weekly</option>
<option value="3">Monthly</option>
<option value="4">Quartely</option>
												</select>
											</div>			
                      
<div class="form-group col-md-6">
<label>Office Size</label>
<select id="size" name="size"
 class="form-control">
<option value="">&nbsp;</option>
<option value="1">1-3</option>
<option value="2">1-10</option>
<option value="3">1-100</option>
												</select>
											</div>	

<div class="form-group col-md-6">
<label>Price PKR</label>
<input type="text" name="salerentprice"
 id="salerentprice" required class="form-control">
											</div>
<div class="form-group col-md-6">
<label>Website</label>
<input type="text" id="website" name="website" 
class="form-control" placeholder="www.felxispace.com">
</div>

											
									
</div>
</div>
</div>
<div class="frm_submit_block">	
									<h3>Detailed Information</h3>
									<div class="frm_submit_wrap">
										<div class="form-row">
										
											
											
										
										
								
											
<div class="form-group col-md-12">
<label>Amenties</label>
<div class="o-features">
<ul class="no-ul-list third-row">
														<li>
<input name="centercolling" 
id="centercolling" value="1"
 class="checkbox-custom" 
 type="checkbox">
<label for="a-1" 
class="checkbox-custom-label">
Air Condition</label>
</li>
<li>
<input id="a-2" class="checkbox-custom" 
name="a-2" type="checkbox">
<label for="a-2" 
class="checkbox-custom-label">Bedding</label>
</li>
<li>
<input id="a-3" class="checkbox-custom"
 name="a-3" type="checkbox">
<label for="a-3" 
class="checkbox-custom-label">Heating</label>
</li>
<li>
<input id="a-4"
 class="checkbox-custom"
  name="a-4" type="checkbox">
<label for="a-4" 
class="checkbox-custom-label">Internet</label>
</li>
<li>
<input id="a-5" 
class="checkbox-custom" 
name="a-5" type="checkbox">
<label for="a-5"
 class="checkbox-custom-label">Microwave</label>
</li>
<li>
<input id="a-6" 
class="checkbox-custom" 
name="a-6" type="checkbox">
<label for="a-6" 
class="checkbox-custom-label">
Smoking Allow</label>
</li>
<li>
<input id="a-7"
 class="checkbox-custom" 
 name="a-7" type="checkbox">
<label for="a-7" 
class="checkbox-custom-label">Terrace</label>
</li>
<li>
<input id="a-8" 
class="checkbox-custom" 
name="a-8" type="checkbox">
<label for="a-8" 
class="checkbox-custom-label">Balcony</label>
</li>
<li>
<input id="a-9" 
class="checkbox-custom" 
name="a-9" type="checkbox">
<label for="a-9" 
class="checkbox-custom-label">Icon</label>
</li>
<li>
<input id="a-10" 
class="checkbox-custom" 
name="a-10" type="checkbox">
<label for="a-10" 
class="checkbox-custom-label">Wi-Fi</label>
</li>
<li>
<input id="a-11" 
class="checkbox-custom"
 name="a-11" type="checkbox">
<label for="a-11"
 class="checkbox-custom-label">Beach</label>
</li>
<li>
<input id="a-12" 
class="checkbox-custom" 
name="a-12" type="checkbox">
<label for="a-12" 
class="checkbox-custom-label">Parking</label>
</li>
</ul>
</div>
</div>
											
</div>
</div>
</div>	
								<!-- Gallery -->
<div class="form-box">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<h4 class="form--title">Property Gallery</h4>
</div>
                                    <!-- .col-md-12 end -->
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="form-group">
<label for="address">Featured Image</label>
<input type="file" class="form-control" 
name="featuredimage" required>
</div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="form-group">
<label for="address">Gallery Image1</label>
<input type="file" class="form-control"
 name="galleryimage1" required>
</div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="form-group">
<label for="address">Gallery Image2</label>
<input type="file" class="form-control"
 name="galleryimage2" >
</div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="form-group">
<label for="address">Gallery Image3</label>
<input type="file" class="form-control" 
name="galleryimage3">
</div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="form-group">
<label for="address">Gallery Image4</label>
<input type="file" class="form-control" 
name="galleryimage4" >
                                        </div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="form-group">
<label for="address">Gallery Image5</label>
<input type="file" class="form-control"
 name="galleryimage5" >
</div>
</div>
								
<!-- Location -->



</div>
</div>
</div>
								
								<!-- Detailed Information -->

								
<br>
<br>
								
<div class="form-group">
<div class="col-lg-12 col-md-12">
<button class="btn btn-theme" 
type="submit" value="submit" 

name="submit">Submit Office Spaces</button>
</form>
</div>
								</div>
											
							</div>
						</div>
						
					</div>
				</div>
						
			</section>	
		
			
		
			<!-- End Modal -->
			
			<a id="back2Top" class="top-scroll"
             title="Back to top" href="#">
                <i class="ti-arrow-up"></i></a>

                </html>
                <?php

include('includes/footer.php');
?>
                <?php }?>
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0 || 
$_SESSION['ut']==3)) {
echo "<script>alert('Please login
 for add property.');</script>";
echo "<script>window.location.href ='logout.php'</script>";
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
$bathrooms=$_POST['bathrooms'];
$floors=$_POST['floors'];
$garages=$_POST['garages'];
$area=$_POST['area'];
$size=$_POST['size'];
$srprice=$_POST['salerentprice'];
$beforepricelabel=$_POST['beforepricelabel'];
$afterpricelabel=$_POST['afterpricelabel'];
$ccolling=$_POST['centercolling'];
$balcony=$_POST['balcony'];
$petfrndly=$_POST['petfrndly'];
$barbeque=$_POST['barbeque'];
$firealarm=$_POST['firealarm'];
$modkitchen=$_POST['modkitchen'];
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
echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension1,$allowed_extensions))
{
echo "<script>alert('Property gallery image1 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
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
     move_uploaded_file($_FILES["featuredimage"]["tmp_name"],"propertyimages/".$propic);
     move_uploaded_file($_FILES["galleryimage1"]["tmp_name"],"propertyimages/".$propic1);
     move_uploaded_file($_FILES["galleryimage2"]["tmp_name"],"propertyimages/".$propic2);
     move_uploaded_file($_FILES["galleryimage3"]["tmp_name"],"propertyimages/".$propic3);
     move_uploaded_file($_FILES["galleryimage4"]["tmp_name"],"propertyimages/".$propic4);
     move_uploaded_file($_FILES["galleryimage5"]["tmp_name"],"propertyimages/".$propic5);

    $query=mysqli_query($con,"insert into
     tblproperty(UserID,PropertyTitle,PropertDescription,
     Type,Status,Location,Bedrooms,Bathrooms,
     Floors,Garages,Area,Size,RentorsalePrice,
     BeforePricelabel,AfterPricelabel,PropertyID,
     CenterCooling,Balcony,PetFriendly,Barbeque,
     FireAlarm,ModernKitchen,Storage,Dryer,
     Heating,Pool,Laundry,Sauna,Gym,Elevator,
     DishWasher,EmergencyExit,FeaturedImage,
     
     GalleryImage1,GalleryImage2,GalleryImage3,
     
     GalleryImage4,GalleryImage5,Address,Country,
     
     City,State,ZipCode,Neighborhood)value('$uid',
     '$protitle','$prodec','$type','$status',
     '$location','$bedrooms','$bathrooms',
     '$floors','$garages','$area','$size',
     '$srprice','$beforepricelabel',
     '$afterpricelabel','$proid','$ccolling',
     '$balcony','$petfrndly','$barbeque',
     '$firealarm','$modkitchen','$storage',
     '$dryer','$heating','$pool','$laundry',
     '$sauna','$gym','$elevator','$dishwasher',
     '$eexit','$propic','$propic1','$propic2',
     '$propic3','$propic4','$propic5','$proaddress',
     '$procountry','$procity','$prostate','$prozipcode',
     '$neighborhood')");
   if ($query) {
    echo '<script>alert("Property detail has been added.")</script>';
echo "<script>window.location.href ='add-property.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. 
         Please try again")</script>';
    }

  
}
}



?>

 <!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
 
<link rel="icon" type="image/x-icon" href="assets/img/mylogo.png">

   
    <title>Flexi_Space|| Add Property</title>
</head>
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


<body>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <?php include_once('includes/header.php');?>
        
        <!-- Page Title #1
============================================ -->
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
        <!-- #page-title end -->

        <!-- #Add Property
============================================= -->

        <section id="add-property" class="add-property">
            
            <div class="container">

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <form class="mb-0" method="post"  
                        enctype="multipart/form-data">
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="form-box">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<h4 class="form--title">Property Description</h4>
</div>
<!-- .col-md-12 end -->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<label for="property-title">Property Title*</label>
<input type="text" class="form-control"
 name="propertytitle" id="propertytitle" required>
</div>
</div>
<!-- .col-md-12 end -->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<label for="property-description">Property Description*</label>
<textarea class="form-control" name="propertydescription" 
id="propertydescription" rows="2"></textarea>
                                        </div>
</div>
                                    <!-- .col-md-12 end -->
<div class="col-xs-12 col-sm-4 col-md-4">
<div class="form-group">
<label for="select-type">Type</label>
<div class="select--box">
<i class="fa fa-angle-down"></i>
<select id="selecttype" name="selecttype" required="true"
class="form-control">
<option value="">Select Property Type</option>
              <?php $query1=mysqli_query($con,"select * 
              from tblpropertytype");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>      
                  <option
                  
                  value="<?php echo $row1['PropertType'];?>">
                  
                  <?php echo $row1['PropertType'];?>
                
                </option>
                  <?php } ?>
                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
<div class="col-xs-12 col-sm-4 col-md-4">
<div class="form-group">
<label for="select-status">Status</label>
<div class="select--box">
<i class="fa fa-angle-down"></i>
<select id="status" name="status" class="form-control">
<option>Daily</option>
<option>Weekly</option>
<option>Monthly </option>
<option>Quartely </option>
                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
<div class="form-group">
<label for="location">Location</label>
<input type="text" class="form-control" name="location"
 id="location">
</div>
</div>
<!-- .col-md-4 end -->
<div class="col-xs-12 col-sm-4 col-md-4">
<div class="form-group">
<label for="Bedrooms">Avaibality</label>
<div class="select--box">
<i class="fa fa-angle-down"></i>
<select id="bedrooms" name="bedrooms" class="form-control">
<option>Day</option>
<option>Night</option>
<option>24/7 </option>

</select>
</div>                                      
  </div>
              </div>
                         
              


<!-- .col-md-4 end -->
<div class="col-xs-12 col-sm-4 col-md-4">
<div class="form-group">
<label for="Size">Office Size</label>
<div class="select--box">
<i class="fa fa-angle-down"></i>
<select id="size" name="size" class="form-control">
<option>1-3</option>
<option>1-10</option>
<option>1-100 </option>

</select>
</div>                                      
  </div>
              </div>

<!-- .col-md-4 end -->

                                    <!-- .col-md-4 end -->
<div class="col-xs-12 col-sm-4 col-md-4">
<div class="form-group">
<label for="Sale-Rent-Price">Price PKR</label>
<input type="text" class="form-control" 
name="salerentprice" id="salerentprice" required>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->

                                </div>
                                <!-- .row end -->
                            </div>
             
             
             
                            <br>
<br>
<br>               <!-- .form-box end -->
<div class="form-box">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<h4 class="form--title">Property Features</h4>
</div>
<!-- .col-md-12 end -->
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="input-checkbox">
<label class="label-checkbox">
<span>Center Cooling</span>
<input type="checkbox" name="centercolling" 
id="centercolling" value="1">
<span class="check-indicator"></span>
</label>
</div>
</div>
<!-- .col-md-3 end -->
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="input-checkbox">
<label class="label-checkbox">
<span>Printing</span>
<input type="checkbox" name="balcony" 
id="balcony" value="1">
<span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
<!-- .col-md-3 end -->
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="input-checkbox">
<label class="label-checkbox">
<span>Pet Friendly</span>
<input type="checkbox" name="petfrndly" 
id="petfrndly" value="1">
<span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Fast Internet</span>
                                        <input type="checkbox" name="barbeque" id="barbeque" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Fire Alarm</span>
                                        <input type="checkbox" name="firealarm" id="firealarm" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Projector</span>
                                        <input type="checkbox" name="modkitchen" id="modkitchen" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Phone Boot</span>
                                        <input type="checkbox" name="storage" id="storage" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Tea</span>
                                        <input type="checkbox" name="dryer" id="dryer" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Games</span>
                                        <input type="checkbox" name="heating" id="heating" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Pool</span>
                                        <input type="checkbox" name="pool" id="pool" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Scanner</span>
                                        <input type="checkbox" name="laundry" id="laundry" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Bike Parking</span>
                                        <input type="checkbox" name="sauna" id="sauna" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Gym</span>
                                        <input type="checkbox" name="gym" id="gym" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Elevator</span>
                                        <input type="checkbox" name="elevator" id="elevator" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Dish Washer</span>
                                        <input type="checkbox" name="dishwasher" id="dishwasher" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Emergency Exit</span>
                                        <input type="checkbox" name="eexit" id="eexit" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->
                            <br>
<br>
<br>
                            <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Property Gallery</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Featured Image</label>
                                            <input type="file" class="form-control" name="featuredimage" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image1</label>
                                            <input type="file" class="form-control" name="galleryimage1" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image2</label>
                                            <input type="file" class="form-control" name="galleryimage2" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image3</label>
                                            <input type="file" class="form-control" name="galleryimage3" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image4</label>
                                            <input type="file" class="form-control" name="galleryimage4" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image5</label>
                                            <input type="file" class="form-control" name="galleryimage5" required>
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->

                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->
                            <br>
<br>
<br>
                            <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Property Location</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address*</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter your property address" required>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="select-country">Country</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
    <select type="text" name="country" id="country"
    
    required="true" onChange="getsate(this.value)" 
    
    class="form-control">
<option value="">Select Country</option>
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
                                        </div>
                                    </div>


            <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="state">State</label>
               <div class="select--box">
               <i class="fa fa-angle-down"></i>
             <select type="text" class="form-control" name="state" id="state" onChange="getcity(this.value)" >

             <option value="">Select State</option>
              <?php $query=mysqli_query($con,"select * 
              from tblstate");
              while($row=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $row['CountryID'];?>
                  "><?php echo $row['StateName'];?></option>
                  <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    </div>


                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                            <select class="form-control" name="city" id="city">
                                            <option value="">Select city</option>
              <?php $query=mysqli_query($con,"select * from tblcity");
              while($row=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $row['ID'];?>">
                  <?php echo $row['CityName'];?></option>
                  <?php } ?>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                        
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Zip/Postal-code">Zip/Postal Code</label>
                                            <input type="text" class="form-control" name="zipcode" id="zipcode">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    
                                    <!-- .col-md-4 end -->
                                 
                                    <!-- .col-md-12 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->
                            <br><br>
                            <div class="form-group">
									<div class="col-lg-12 col-md-12">
									<button class="btn btn-theme" type="submit" 
                                    value="Submit" name="submit">Submit flexi spaces</button>
									</div>
								</div>
                        </form>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
        </section>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

        </header>
        
        

        <!-- Footer #1
============================================= -->
        <?php include_once('includes/footer.php');?>
    </div>
    
</body>

</html>
 <?php } ?>
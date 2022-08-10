<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

include('includes/header.php');

if (strlen($_SESSION['remsuid']==0 || 
$_SESSION['ut']==3)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
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


$query=mysqli_query($con,"update tblproperty 
set PropertyTitle='$protitle',PropertDescription='$prodec'
,Type='$type',Status='$status',Location='$location'
,Bedrooms='$bedrooms',Bathrooms='$bathrooms'
,Floors='$floors',Garages='$garages',Area='$area'
,Size='$size',RentorsalePrice='$srprice'
,BeforePricelabel='$beforepricelabel'
,AfterPricelabel='$afterpricelabel'
,CenterCooling='$ccolling',
Balcony='$balcony',PetFriendly='
$petfrndly',Barbeque='$barbeque',FireAlarm='
$firealarm',ModernKitchen='$modkitchen',
Storage='$storage',Dryer='$dryer',Heating='
$heating',Pool='$pool',Laundry='$laundry',Sauna='$sauna',Gym='$gym',Elevator='$elevator',DishWasher='$dishwasher',EmergencyExit='$eexit',Address='$proaddress',Country='$procountry',City='$procity',State='$prostate',ZipCode='$prozipcode',Neighborhood='$neighborhood' where ID='$eid'");
   if ($query) {
    echo '<script>alert("Property detail has been updated.")</script>';
echo "<script>window.location.href ='my-properties.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}




?>


 <!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
 
    
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
<?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select 
tblproperty.*,tblcountry.CountryName,tblcountry.ID as 
cid,tblstate.StateName,tblstate.id as sid from tblproperty 
join tblcountry on tblcountry.ID=tblproperty.Country join 
tblstate on tblstate.ID=tblproperty.State where tblproperty.ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

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
 name="propertytitle" id="propertytitle" required='true'
 value="<?php  echo $row['PropertyTitle'];?>">
</div>
</div>
<!-- .col-md-12 end -->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<label for="property-description">Property Description*</label>
<textarea class="form-control" name="propertydescription" 
id="propertydescription" rows="2" readonly="true">
<?php  echo $row['PropertDescription'];?>
</textarea>
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
<option value="<?php  echo $row['Type'];?>"><?php 
 echo $row['Type'];?></option>
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

<option value="<?php  echo $row['Status'];?>">
<?php  echo $row['Status'];?></option>
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
 id="location" value="<?php  echo $row['Location'];?>">
</div>
</div>
<!-- .col-md-4 end -->
<div class="col-xs-12 col-sm-4 col-md-4">
<div class="form-group">
<label for="Bedrooms">Avaibality</label>
<div class="select--box">
<i class="fa fa-angle-down"></i>
<select id="bedrooms" name="bedrooms" class="form-control">
<option value="<?php  echo $row['Bedrooms'];?>">
<?php  echo $row['Bedrooms'];?></option>

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
<option value="<?php  echo $row['Size'];?>">
<?php  echo $row['Size'];?></option>
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
name="salerentprice" id="salerentprice" required
value="<?php  echo $row['RentorsalePrice'];?>">
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
<span>Balcony</span>
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
                                        <span>Barbeque</span>
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
                                        <span>Modern Kitchen</span>
                                        <input type="checkbox" name="modkitchen" id="modkitchen" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Storage</span>
                                        <input type="checkbox" name="storage" id="storage" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Dryer</span>
                                        <input type="checkbox" name="dryer" id="dryer" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Heating</span>
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
                                        <span>Laundry</span>
                                        <input type="checkbox" name="laundry" id="laundry" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Sauna</span>
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
                                            <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" width="200"
                                                height="150" value="<?php  echo $row['FeaturedImage'];?>">
                                            <a href="changeimage.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit
                                                Image</a>                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image1</label>
                                            <img src="propertyimages/<?php echo $row['GalleryImage1'];?>" width="200"
                                                height="150" value="<?php  echo $row['GalleryImage1'];?>">
                                            <a href="changeimage1.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit
                                                Image</a>                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image2</label>
                                            <img src="propertyimages/<?php echo $row['GalleryImage2'];?>" width="200"
                                                height="150" value="<?php  echo $row['GalleryImage2'];?>">
                                            <a href="changeimage2.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit
                                                Image</a>                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image3</label>
                                            <img src="propertyimages/<?php echo $row['GalleryImage3'];?>" width="200"
                                                height="150" value="<?php  echo $row['GalleryImage3'];?>">
                                            <a href="changeimage3.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit
                                                Image</a>                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image4</label>
                                            <img src="propertyimages/<?php echo $row['GalleryImage4'];?>" width="200"
                                                height="150" value="<?php  echo $row['GalleryImage4'];?>">
                                            <a href="changeimage4.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit
                                                Image</a>                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image5</label>
                                            <img src="propertyimages/<?php echo $row['GalleryImage5'];?>" width="200"
                                                height="150" value="<?php  echo $row['GalleryImage5'];?>">
                                            <a href="changeimage5.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit
                                                Image</a>                                        </div>
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
                                            <input type="text" class="form-control" 
                                            name="address" id="address" 
                                            placeholder="Enter your property address" required
                                            value="<?php  echo $row['Address'];?>">
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

<option value="<?php  echo $row['cid'];?>">
<?php  echo $row['CountryName'];?></option>
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
             <select type="text" class="form-control" 
             name="state" id="state" onChange="getcity(this.value)" >

             <option value="<?php  echo $row['sid'];?>">
<?php  echo $row['StateName'];?></option>

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
                                            <option value="<?php  echo $row['City'];?>">
                                                        <?php  echo $row['City'];?></option>            
                  
    
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                        
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Zip/Postal-code">Zip/Postal Code</label>
                                            <input type="text" class="form-control" name="zipcode" id="zipcode"
                                            value="<?php  echo $row['ZipCode'];?>">
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
 <?php } ?>
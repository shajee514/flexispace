<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8" />
		<meta name="author" content="Thegbtech" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title>Flexispace Space </title>
        <link rel="icon" type="image/x-icon" href="assets/img/mylogo.png">

        <!-- Custom CSS -->
        <link href="assets/css/styles.css" rel="stylesheet">
		
    </head>
<body>
<div id="wrapper" class="wrapper clearfix">
        <?php include_once('includes/header.php');?>

<div class="image-cover hero_banner" style="background:url(assets/img/banner-2.png) 
	no-repeat;" data-overlay="0">
    <div class="container">

        <h1 class="big-header-capt mb-0">Search Your
            Favorite Offices
        </h1>
        <p class="text-center mb-4">Find new &
            featured Offices in Your city.</p>
        <!-- Type -->


        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11 col-md-12">
                <div class="full_search_box nexio_search
 lightanic_search hero_search-radius modern">
                    <div class="search_hero_wrapping">
                        <form method="post" name="search" action="property-search.php">
                            <div class="row">
                                <div class="col-lg-4 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Select City</label>
                                        <div class="input-with-icon">

                                            <select name="city" id="city" class="form-control">

                                                <option value="">&nbsp;</option>
                                                <?php
$query=mysqli_query($con,"select distinct City 
from  tblproperty");
while($row=mysqli_fetch_array($query))
{
?>
                                                <option value="<?php echo $row['City'];?>">
                                                    <?php echo $row['City'];?></option>
                                                <?php } ?>

                                                <option>


                                                </option>


                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Property Type</label>
                                        <div class="input-with-icon">
                                            <select id="selecttype" name="selecttype" required="true"
                                                class="form-control">
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
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group none">
                                        <label>Select Status</label>
                                        <div class="input-with-icon">
                                            <select id="price" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <?php
$query2=mysqli_query($con,"select distinct Status from
  tblproperty");
while($row2=mysqli_fetch_array($query2))
{
?>
                                                <option value="<?php echo $row2['Status'];?>">
                                                    <?php echo $row2['Status'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-12 small-padd">
                                    <div class="form-group none">


                                        <input type="submit" name="search" class="btn search-btn" class="fa fa-search">
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->

<!-- ============================ Hero Search Start ================================== -->

<!-- ============================ Hero Search End ================================== -->

<!-- ============================ How It Works Start ================================== -->
<section class="min">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h2>How It Works?</h2>
                    <p>Flexispace help you to find the flexible office spaces as per your requirement.
                    </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="wpk_process">
                    <div class="wpk_thumb">
                        <div class="wpk_thumb_figure">
                            <img src="assets/img/account-cl.svg" class="img-fluid" alt="" />
                        </div>
                    </div>
                    <div class="wpk_caption">
                        <h4>Create An Account</h4>
                        <p>Create an account on flexispace and find the coworking office
                            spaces as per your requirement.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="wpk_process active">
                    <div class="wpk_thumb">
                        <div class="wpk_thumb_figure">
                            <img src="assets/img/search.svg" class="img-fluid" alt="" />
                        </div>
                    </div>
                    <div class="wpk_caption">
                        <h4>Find & Search Property</h4>
                        <p>Search the nearest office spaces as per your requirement.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="wpk_process">
                    <div class="wpk_thumb">
                        <div class="wpk_thumb_figure">
                            <img src="assets/img/booking-cl.svg" class="img-fluid" alt="" />
                        </div>
                    </div>
                    <div class="wpk_caption">
                        <h4>Book Your Property</h4>
                        <p>Book the working space on flexispace as per your requirement.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>

</section>
<div class="clearfix"></div>
<!-- ============================ How It Works End ================================== -->

<!-- ============================ Featured Properties Start ================================== -->
<section class="pt-0 min">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h2>Featured Listed Property</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

        <?php
                      
                      $query=mysqli_query($con,"select * from tblproperty order 
                      by rand() limit 3");
                      while($row=mysqli_fetch_array($query))
                      {
                      ?>
            <!-- Single Property -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="property-listing property-2">

                    <div class="listing-img-wrapper">
                        <div class="_exlio_125">
                            <?php echo $row['Status'];?></div>
                        <div class="list-img-slide">
                            <div class="click">
                                <div><a href="single-property-detail.php?proid=
<?php echo $row['ID'];?>">
                                <img src="propertyimages/
<?php echo $row['FeaturedImage'];?>"
                                            class="img-fluid mx-auto"
                                             alt="" />
                                        </a></div>
                               
                                
                            </div>
                        </div>
                    </div>

                    <div class="listing-detail-wrapper">
                        <div class="listing-short-detail-wrap">
                            <div class="_card_list_flex mb-2">
                                <div class="_card_flex_01">
                                    <span class="_list_blickes _netork">
                                    <?php echo $row['ID'];?></span>
                                    <span class="_list_blickes types">
                                        <?php echo $row['City'];?></span>
                                </div>
                                <div class="_card_flex_last">
                                    <h6 class="listing-card-info-price mb-0">
                                        Pkr-
                                    <?php echo $row['RentorsalePrice'];?></h6>
                                </div>
                            </div>
                            <div class="_card_list_flex">
                                <div class="_card_flex_01">
                                    <h4 class="listing-name verified">
                                    <a href="single-property-detail.php?proid=
                              <?php echo $row['ID'];?>">
                            <?php echo $row['PropertyTitle'];?></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="price-features-wrapper">
                        <div class="list-fx-features">
                            <div class="listing-card-info-icon">
                                <div class="inc-fleat-icon">
                                    <img src="assets/img/person.svg" 
                                    width="13" alt="" /></div>

                                    <?php echo $row['Size'];?>
                            </div>
                            <div class="listing-card-info-icon">
                                <div class="inc-fleat-icon">
                                    <img src="assets/img/room.svg"
                                     width="13" alt="" /></div>
                                     <?php echo $row['Type'];?>
                            </div>
                            <div class="listing-card-info-icon">
                                <div class="inc-fleat-icon">
                                    <img src="assets/img/time.svg"
                                     width="13" alt="" /></div>
                                     <?php echo $row['Status'];?>
                            </div>
                        </div>
                    </div>

                    <div class="listing-detail-footer">
                        <div class="footer-first">
                            <div class="foot-location">
                                <img src="assets/img/pin.svg" width="18" 
                                alt="" />
                                <?php echo $row['Address'];?></div>
                        </div>
                        <div class="footer-flex">
                            <ul class="selio_style">
                                
                                
                                <li>
                                    <div class="prt_saveed_12lk">
                                    <a href="single-property-detail.php?proid=
<?php echo $row['ID'];?>"
                                        data-toggle="tooltip" 
                                        data-placement="top"
                                            data-original-title="View 
                                            Property">
                                            <i class="ti-arrow-right"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <?php } ?>

            <!-- ============================ Featured Properties End ================================== -->

            <!-- ============================ Property By Location ================================== -->
            <section class="min">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-8">
                            <div class="sec-heading center">
                                <h2>Top Property Places</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <a href="citywise-property-detail.php?cityproid=Islamabad" class="img-wrap">
                                <div class="location_wrap_content visible">
                                    <div class="location_wrap_content_first">
                                        <h4>Islamabad, PAK</h4>
                                        <span>8 Properties</span>
                                    </div>
                                    <div class="location_btn"><i class="fa fa-arrow-right"></i></div>
                                </div>
                                <div class="img-wrap-background" style="background-image: url(assets/img/c1.jpg);">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <a href="citywise-property-detail.php?cityproid=Skardu" class="img-wrap">
                                <div class="location_wrap_content visible">
                                    <div class="location_wrap_content_first">
                                        <h4>Skardu, PAk</h4>
                                        <span>2 Properties</span>
                                    </div>
                                    <div class="location_btn"><i class="fa fa-arrow-right"></i></div>
                                </div>
                                <div class="img-wrap-background" style="background-image: url(assets/img/c2.jpg);">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <a href="citywise-property-detail.php?cityproid=Lahore" class="img-wrap">
                                <div class="location_wrap_content visible">
                                    <div class="location_wrap_content_first">
                                        <h4>Lahore, PAK</h4>
                                        <span>4 Properties</span>
                                    </div>
                                    <div class="location_btn"><i class="fa fa-arrow-right"></i></div>
                                </div>
                                <div class="img-wrap-background" style="background-image: url(assets/img/c3.jpg);">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <a href="citywise-property-detail.php?cityproid=Karachi" class="img-wrap">
                                <div class="location_wrap_content visible">
                                    <div class="location_wrap_content_first">
                                        <h4>Karachi, PAK</h4>
                                        <span>35 Properties</span>
                                    </div>
                                    <div class="location_btn"><i class="fa fa-arrow-right"></i></div>
                                </div>
                                <div class="img-wrap-background" style="background-image: url(assets/img/c4.jpg);">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <a href="citywise-property-detail.php?cityproid=Peshawar" class="img-wrap">
                                <div class="location_wrap_content visible">
                                    <div class="location_wrap_content_first">
                                        <h4>Peshawar, PAK</h4>
                                        <span>10 Properties</span>
                                    </div>
                                    <div class="location_btn">
                                        <i class="fa fa-arrow-right"></i></div>
                                </div>
                                <div class="img-wrap-background" 
                                style="background-image: url(assets/img/city-5.png);">
                                </div>
                            </a>
                        </div>

                    </div>

                </div>
                      </div>
                      </div>
            </section>
            <!-- ============================ Property By Location End ================================== -->





            <!-- ============================ Call To Action ================================== -->
            <section class="theme-bg call_action_wrap-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="call_action_wrap">
                                <div class="call_action_wrap-head">
                                    <h3>Do You Have Questions ?</h3>
                                    <span>We'll help you to grow your business.</span>
                                </div>
                                <a href="contact-us.php" class="btn btn-call_action_wrap">Contact Us Today</a>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- ============================ Call To Action End ================================== -->


            <!-- ============================ Footer End ================================== -->




            <!-- End Modal -->

            <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
            <?php

include('includes/footer.php');
?>

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



</html>
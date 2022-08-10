<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
include('includes/header.php');

if (strlen($_SESSION['remsuid']==0|| $_SESSION['ut']==3)) 
{
  header('location:logout.php');
  } else{?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>


    <title>Flexispace System</title>
</head>


<!-- ============================ Page Title End ================================== -->

<!-- ============================ User Dashboard ================================== -->
<section class="gray pt-5 pb-5">
    <div class="container-fluid">

        <div class="row">

        <?php include_once('includes/sidebar.php');?>

           

            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="dashboard-body">

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="_prt_filt_dash">
                                <div class="_prt_filt_dash_flex">
                                    <div class="foot-news-last">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                             placeholder="Email Address">
                                            <div class="input-group-append">
                                                <span type="button" class="input-group-text theme-bg b-0 text-light"><i
                                                        class="fas fa-search"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="_prt_filt_dash_last m2_hide">
                                    <div class="_prt_filt_radius">

                                    </div>
                                    <div class="_prt_filt_add_new">
                                        <a href="add-property.php" class="prt_submit_link">

                                            <i class="fas fa-plus-circle"></i>

                                            <span class="d-none d-lg-block d-md-block">Add New Office Spaces</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row justify-content-center">
                            
                            <?php
$uid=$_SESSION['remsuid'];
$query=mysqli_query($con,"select * 
from tblproperty where UserID='$uid'");
$num=mysqli_num_rows($query);
if($num>0){
while($row=mysqli_fetch_array($query))
{
?>

                            <!-- Single Property -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="property-listing list_view">

                                    <div class="listing-img-wrapper">
                                        <div class="_exlio_125">
                                            <?php echo $row['Status'];?>
                                        </div>
                                        <div class="like_unlike_prt">
                                            <label class="toggler toggler-danger">
                                                <input type="checkbox"><i class="fa fa-heart"></i></label>
                                        </div>
                                        <div class="list-img-slide">
                                            <div class="click">
                                                <div>
                                                    <a href="single-property-detail.php?proid=
                                   <?php echo $row['ID'];?>">
                                                        <img src="propertyimages/
<?php echo $row['FeaturedImage'];?>" class="img-fluid mx-auto" alt="" />
                                                    </a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="list_view_flex">

                                        <div class="listing-detail-wrapper mt-1">
                                            <div class="listing-short-detail-wrap">
                                                <div class="_card_list_flex mb-2">
                                                    <div class="_card_flex_01">
                                                        <span class="_list_blickes _netork">
                                                        <?php echo $row['ID'];?>
                                                        </span>
                                                        <span class="_list_blickes types">
                                                        <?php echo $row['City'];?>
                                                        </span>
                                                    </div>
                                                    <div class="_card_flex_last">
                                                        <h6 class="listing-card-info-price mb-0">
                                                            
                                                        Pkr- <?php echo $row['RentorsalePrice'];?>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="_card_list_flex">
                                                    <div class="_card_flex_01">
                                                    <h4 class="property--title">
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
                                                        width="13"
                                                            alt="" />
                                                        </div><?php echo $row['Size'];?>
                                                </div>
                                                <div class="listing-card-info-icon">
                                                    <div class="inc-fleat-icon">
                                                        <img src="assets/img/room.svg"
                                                            width="13" alt="" /></div>
                                                            <?php echo $row['Type'];?>
                                                </div>
                                                <div class="listing-card-info-icon">
                                                    <div class="inc-fleat-icon">
                                                        <img src="assets/img/timer.svg"
                                                            width="13" alt="" /></div>
                                                            <?php echo $row['Status'];?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="listing-detail-footer pl-0">
                                            
                                            <div class="footer-flex">
                                                <a href="single-property-detail.php?proid=
                                     <?php echo $row['ID'];?> " data-toggle="modal" 
                                                data-target="#availability"
                                                    class="prt-view theme-bg">Check Availability</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- End Single Property -->
                            <!-- tr block -->


                            <!-- tr block -->

                            <?php } } else { ?>
                            <h3 style="color:red" align="center">
                                No Properties added yet </h3>
                            <?php } ?>

                            <?php } ?>


                            <div class="col-xs-12 col-sm-12 col-md-12 
text-center mt-50">
<ul class="pagination" >
<li class="active">
    <a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ 
            echo 'disabled'; } ?>">
            <a href="<?php 
if($pageno <= 1){ echo '#'; } else
 { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
<li class="<?php if($pageno >=
 $total_pages){ echo 'disabled'; } ?>">
<a href="<?php if($pageno >=
 $total_pages){ echo '#'; } else
  { echo "?pageno=".($pageno + 1); } ?>">Next</a>
</li>
        <li>
<a href="?pageno=<?php echo 
$total_pages; ?>">Last</a></li>
    </ul>
                            </div>

                            <!-- row -->
                            <br>






                            <br>
                            <br>
        </div>
</section>





<!-- End Modal -->






        </div>
        </div>



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

</html>


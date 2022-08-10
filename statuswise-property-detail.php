

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/header.php');


?>

<section class="gray pt-4">

    <div class="container">

        <div class="row m-0">
            <div class="short_wraping">
                <div class="row align-items-center">

<div class="col-lg-3 col-md-6 col-sm-12  col-sm-6">
<ul class="shorting_grid">
<li class="list-inline-item">
    <a href="#" 
    class="" id="switch-list"><span
class="ti-layout-grid2"></span>Grid</a></li>
<li class="list-inline-item">
    <a id="switch-grid" href="#"
    class="active"><span
class="ti-view-list"></span>List</a></li>

                        </ul>
                    </div>




                </div>
            </div>
        </div>

        <div class="row">

            <!-- property Sidebar -->
<div class="col-lg-4 col-md-12 col-sm-12">
<div class="page-sidebar p-0">
<a class="filter_links" 
data-toggle="collapse" 
href="#fltbox" role="button" aria-expanded="false"
aria-controls="fltbox">Open Advance Filter
<i class="fa fa-sliders-h ml-2"></i></a>
<div class="collapse" id="fltbox">
<!-- Find New Property -->
<div class="sidebar-widgets p-4">

<div class="form-group">
<div class="input-with-icon">
<h5>Property Type</h5>

<?php
$query3=mysqli_query($con,"select distinct 
Type from  tblproperty");
while($row3=mysqli_fetch_array($query3))
{
?>
                                    <li>
<a href="protypewise-property-detail.php?protypeid=
<?php echo $row3['Type'];?>">
<?php echo $row3['Type'];?></a>


</li>
<?php } ?>
                                </div>
                            </div>

                            <div class="form-group">
<div class="input-with-icon">
<h5>Offices by Status</h5>

<?php
$query4=mysqli_query($con,"select distinct
 Status from  tblproperty");
while($row4=mysqli_fetch_array($query4))
{
?>
<ul class="list-unstyled mb-0">
<li>
<a href="statuswise-property-detail.php?stproid=<?php 
echo $row4['Status'];?>">
<?php echo $row4['Status'];?></a>
</li>
<?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
<div class="input-with-icon">
<h5>Offices by City</h5>

<?php
$query5=mysqli_query($con,"select distinct
 City from  tblproperty");
while($row5=mysqli_fetch_array($query5))
{
?>
<li>
<a href="citywise-property-detail.php?cityproid=
<?php echo $row5['City'];?>">
<?php echo $row5['City'];?></a>
</li>
                                    
<?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Sidebar End -->
            </div>

<div class="col-lg-8 col-md-12 col-sm-12">
<div class="row justify-content-center">

<?php
$stproid=$_GET['stproid'];
$query=mysqli_query($con,"select * from tblproperty 
where Status='$stproid'");
$num=mysqli_num_rows($query);
while($row=mysqli_fetch_array($query))
{
?>
                
                    <!-- End Single Property -->

                  
           

                    <!-- Single Property -->
                    
                    <!-- Single Property -->
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
<div class="property-listing list_view">

<div class="listing-img-wrapper">
<div class="_exlio_125"> <?php echo $row['Status'];?></div>
<div class="list-img-slide">
<div class="click">
<div>
    <a href="single-property-detail.php?proid=
<?php echo $row['ID'];?>">
<img src="propertyimages/
<?php echo $row['FeaturedImage'];?>"></a>
</div>


</div>
</div>
                            </div>

<div class="list_view_flex">
<div class="listing-detail-wrapper mt-1">
<div class="listing-short-detail-wrap">
<div class="_card_list_flex mb-2">
<div class="_card_flex_01">
<span class="_list_blickes _netork"><?php echo $row['Type'];?></span>
<span class="_list_blickes types"><?php echo $row['City'];?></span>
</div>
<div class="_card_flex_last">
<h6 class="listing-card-info-price mb-0">
    Pkr-
<?php echo $row ['RentorsalePrice'];?>
</h6>
</div>
</div>
<div class="_card_list_flex">
<div class="_card_flex_01">
<h4 class="listing-name verified">
<a href="single-property-detail.php?proid=<?php
 echo $row['ID'];?>">
    <?php echo $row['PropertyTitle'];?>
</a></h4>
</div>
</div>
</div>
</div>

<div class="price-features-wrapper">
<div class="list-fx-features">
<div class="listing-card-info-icon">
<div class="inc-fleat-icon">
    <img src="assets/img/bed.svg" width="13"
alt="" /></div><?php echo $row['Size'];?>
</div>
<div class="listing-card-info-icon">
<div class="inc-fleat-icon">
    <img src="assets/img/bathtub.svg" width="13"
alt="" /></div><?php echo $row['Type'];?>
</div>
<div class="listing-card-info-icon">
<div class="inc-fleat-icon">
    <img src="assets/img/move.svg" width="13"
alt="" /></div><?php echo $row['Status'];?>
</div>
</div>
</div>

<div class="listing-detail-footer">
<div class="footer-first">
<div class="foot-rates">
<span class="elio_rate perfect">4.8</span>
<div class="_rate_stio">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</div>
</div>
                                    </div>
<div class="footer-flex">
<a href="single-property-detail.php?proid=<?php
 echo $row['ID'];?>">View Detail</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php } ?>

                    <!-- End Single Property -->

                </div>

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
            </div>


        </div>
    </div>

</section>
<!-- ============================ All Property ================================== -->

<!-- ============================ Call To Action ================================== -->
<section class="theme-bg call_action_wrap-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="call_action_wrap">
                    <div class="call_action_wrap-head">
                        <h3>Do You Have Questions ?</h3>
                        <span>We'll help you to grow your career and growth.</span>
                    </div>
                    <a href="contact-us.php" class="btn btn-call_action_wrap">Contact Us Today</a>
                </div>

            </div>
        </div>
    </div>
</section>
<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
<?php include_once('includes/footer.php');?>

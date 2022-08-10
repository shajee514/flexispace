<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/header.php');


?>

<div class="page-title" style="background:#f4f4f4 url(assets/img/slider-5.jpg);" data-overlay="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Choose Package</li>
                    </ol>
                    <h2 class="breadcrumb-title">Select Your Membership</h2>
                </div>

            </div>
        </div>
    </div>
</div>


<section class="gray pt-5 pb-5">
    <div class="container-fluid">
	<div class="col-lg-8 col-md-8">
            <div class="dashboard-body">

                <div class="row">
				<?php include_once('includes/sidebar.php');?>

                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <div id="extraPackages">
                            <div class="row">

                                <!-- Single Package -->
                                <div class="col-lg-4 col-md-4 c-l-sm-12">
                                    <div class="package-box">
                                        <span class="theme-cl">Gold Package</span>
                                        <h4 class="packages-features-title">Pkr 500 / 1 Week</h4>
                                        <ul class="packages-lists-list">
                                            <li>2 listings</li>
                                            <li>10 Featured</li>
                                            <li>5 Images</li>
                                            <li>Help & Support</li>
                                        </ul>
                                        <div class="buypackage">
                                            <div class="switchbtn paying">
                                                <input id="gold" class="switchbtn-checkbox" type="radio" value="2"
                                                    checked name="package7">
                                                <label class="switchbtn-label" for="gold"></label>
                                            </div>
                                            <span>Switch to this package</span>
                                        </div>
                                    </div>
                                </div>
  <!-- Single Package -->
  <div class="col-lg-4 col-md-4 c-l-sm-12">
                                    <div class="package-box">
                                        <span class="theme-cl">Premium Package</span>
                                        <h4 class="packages-features-title">Pkr 2000 / 1 Month</h4>
                                        <ul class="packages-lists-list">
                                            <li>5 listings</li>
                                            <li>20 Featured</li>
                                            <li>4 image / listing</li>
                                            <li>Help & Support</li>
                                        </ul>
                                        <div class="buypackage">
                                            <div class="switchbtn paying">
                                                <input id="premium" class="switchbtn-checkbox" type="radio" value="2"
                                                    name="package7">
                                                <label class="switchbtn-label" for="premium"></label>
                                            </div>
                                            <span>Switch to this package</span>
                                        </div>
                                    </div>
                                </div>
								<div class="col-lg-4 col-md-4 c-l-sm-12">
                                    <div class="package-box">
                                        <span class="theme-cl">Standard Package</span>
                                        <h4 class="packages-features-title">Pkr 5000 / 1 year</h4>
                                        <ul class="packages-lists-list">
                                            <li>35 listings</li>
                                            <li>30 Featured</li>
                                            <li>6 image/listing</li>
                                            <li>Help & Support</li>
                                        </ul>
                                        <div class="buypackage">
                                            <div class="switchbtn paying">
                                                <input id="standard" class="switchbtn-checkbox" type="radio" value="2"
                                                    name="package7">
                                                <label class="switchbtn-label" for="standard"></label>
                                            </div>
                                            <span>Switch to this package</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
							<div class="row mt-5">
                                <div class="col-lg-12 col-md-12">
                                    <h4>Payment Method</h4>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <a href="checkout.php" class="pay-btn paypal">Pay with PayPal</a>
                                    <a href="checkout.php" class="pay-btn stripe">Pay with Stripe</a>
                                    <a href="checkout.php" class="pay-btn wire-trans">Wire Transfer</a>
                                </div>
                            </div>


							</div>
                            </div>
							</div>
                            </div>
							</div>
                            </div>
							</div>
                            </div>
							<?php

include('includes/footer.php');
?>


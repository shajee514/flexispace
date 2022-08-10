<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

include('includes/header.php');

?>

<div class="page-title" style="background:#f4f4f4 url(assets/img/slider-3.jpg);" data-overlay="5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							
							<div class="breadcrumbs-wrap">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">Blog</li>
								</ol>
								<h2 class="breadcrumb-title">Blog Grid - Our Blogs</h2>
							</div>
							
						</div>
					</div>
				</div>
			</div>

            <section class="gray">
			
				<div class="container">
				
					<div class="row">
						<div class="col text-center">
							<div class="sec-heading center">
								<h2>Latest News</h2>
								<p>We post regulary most powerful articles for help and support.</p>
							</div>
						</div>
					</div>
				
					<!-- row Start -->
					<div class="row">
						
					
						
						<!-- Single blog Grid -->
						<div class="col-lg-4 col-md-6">
							<div class="grid_blog_box">
								
								<div class="gtid_blog_thumb">
									<a href="single-blog.php"><img src="assets/img/b-5.jpg" class="img-fluid" alt="" /></a>
									<div class="gtid_blog_info"><span>15</span>jun 2022</div>
								</div>								
								
								<div class="blog-body">
									<h4 class="bl-title"><a href="single-blog.php">Workspcae Latest News</a>
                                    <span class="latest_new_post hot">Hot</span></h4>
									<p>Workspace is the most trending business now a dat in the entire </p>
								</div>
								
								<div class="modern_property_footer">
									<div class="property-author">
										<div class="path-img"><a href="#" tabindex="-1">
                                            <img src="assets/img/my.jpg" class="img-fluid" alt=""></a></div>
										<h5><a href="about-us.php" tabindex="-1">Murtaza</a></h5>
									</div>
									<span class="article-pulish-date"><i class="ti-comment-alt mr-2"></i>407</span>
								</div>
								
							</div>
						</div>

                        <!-- Single blog Grid -->
						<div class="col-lg-4 col-md-6">
							<div class="grid_blog_box">
								
								<div class="gtid_blog_thumb">
									<a href="single-blog.php"><img src="assets/img/b-5.jpg" class="img-fluid" alt="" /></a>
									<div class="gtid_blog_info"><span>15</span>jun 2022</div>
								</div>								
								
								<div class="blog-body">
									<h4 class="bl-title"><a href="single-blog.php">Workspcae Latest News</a>
                                    <span class="latest_new_post hot">Hot</span></h4>
									<p>Workspace is the most trending business now a dat in the entire </p>
								</div>
								
								<div class="modern_property_footer">
									<div class="property-author">
										<div class="path-img">
                                            
                                        <a href="#" tabindex="-1">
                                            <img src="assets/img/my.jpg" class="img-fluid" alt=""></a></div>
										<h5><a href="about-us.php" tabindex="-1">Murtaza</a></h5>
									</div>
									<span class="article-pulish-date"><i class="ti-comment-alt mr-2"></i>407</span>
								</div>
								
							</div>
						</div>
						
						<!-- Single blog Grid -->
						<div class="col-lg-4 col-md-6">
							<div class="grid_blog_box">
								
								<div class="gtid_blog_thumb">
									<a href="blog-detail.html">
                                        <img src="assets/img/b-6.jpg" class="img-fluid" alt="" /></a>
									<div class="gtid_blog_info"><span>25</span>jun 2022</div>
								</div>								
								
								<div class="blog-body">
									<h4 class="bl-title">
                                        <a href="single-blog.php">Workspcae Offices benefit</a>
                                        <span class="latest_new_post">New</span></h4>
									<p>Workspace office is the latest trending method to replace the </p>
								</div>
								
								<div class="modern_property_footer">
									<div class="property-author">
										<div class="path-img">
                                            <a href="#" tabindex="-1">
                                                <img src="assets/img/my.jpg" 
                                                class="img-fluid" alt=""></a></div>
										<h5><a href="about-us.php" tabindex="-1">Syed Murtaz Ali</a></h5>
									</div>
									<span class="article-pulish-date">
                                        
                                    <i class="ti-comment-alt mr-2"></i>410</span>
								</div>
								
							</div>
						</div>
</div>
</div>
</div>
<?php include_once('includes/footer.php');?>





<?include_once("global.php");?>
<?
// recent 3 posts

//booked rooms list
$query_recent3Posts = "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId group by c.postId order by p.views desc limit 3"; 


?>
<!doctype html>
<html lang="en">
    <?php include_once("./phpComponents/header.php")?>
<body>
        
	<!--================ Start Header Menu Area =================-->
	<?php include_once("./phpComponents/navbar.php")?>
	
	<!--================ End Header Menu Area =================-->
	
	<!--================ Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="banner_content">
					<p class="upper_text">Give a hand</p>
					<h2>to make the world better</h2>
					<p>
						That don't lights. Blessed land spirit creature divide our made two 
						itself upon you'll dominion waters man second good you they're divided upon winged were replenish night
					</p>
					<a class="primary_btn mr-20" href="./allPosts.php">Donate Now</a>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->
	
	
	<!--================ Start Features Cause section =================-->
	<br><br>
	<section class="features_causes">
		<div class="container">
			<div class="main_title">
				<h2>Featured Projects</h2>
				<p>Some of the featured projects.</p>
			</div>

			<div class="row">
			    <?
                    $result_recent3Posts = $con->query($query_recent3Posts); 
                    if ($result_recent3Posts->num_rows > 0)
                    { 
                        while($row = $result_recent3Posts->fetch_assoc()) 
                        { 
                ?>
				            <div class="col-lg-4 col-md-6">
            					<div class="card">
            						<div class="card-body">
            							<figure>
            								<img class="card-img-top img-fluid"src="./uploads/postImages/<?echo $row['image']?>" alt="<?echo $row['title']?>">
            							</figure>
            							<div class="card_inner_body">
            								<h4 class="card-title"><?echo $row['title']?></h4>
            								<p class="card-text">
            									<?echo $row['excerpt']?>
            								</p>
            								<div class="d-flex justify-content-between raised_goal">
            									<p>Raised: $<?echo $row['amountEarned']?></p>
            									<p><span>Goal: $<?echo $row['goal']?></span></p>
            								</div>
            								<div class="d-flex justify-content-between donation align-items-center">
            									<a href="./postPage.php?id=<?echo $row['id']?>" class="primary_btn">donate</a>
            									<p><span class="lnr lnr-heart"></span> <?echo $row['nContributors']?> Donors</p>
            								</div>
            							</div>
            						</div>
            					</div>
            				</div>
				<?
                        }
                    }
				?>
				
			</div>
		</div>
	</section>
	
	<!--================ Start Causes Area =================-->
	<section class="causes_area" style="padding:0px;">
		<div class="container">
			<div class="main_title">
				<h2>Our major Projects</h2>
				<p>Creepeth called face upon face yielding midst is after moveth </p>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
						<h4>Give Donation</h4>
						<img src="img/causes/c1.png" alt="">
						<p>
							It you're. Was called you're fowl grass lesser land together waters beast darkness earth land whose male all moveth fruitful.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
						<h4>Give Inspiration</h4>
						<img src="img/causes/c2.png" alt="">
						<p>
							It you're. Was called you're fowl grass lesser land together waters beast darkness earth land whose male all moveth fruitful.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
						<h4>Become Bolunteer</h4>
						<img src="img/causes/c3.png" alt="">
						<p>
							It you're. Was called you're fowl grass lesser land together waters beast darkness earth land whose male all moveth fruitful.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Causes Area =================-->

	<!--================ Start About Us Area =================-->
	<section class="about_area section_gap_bottom">
		<div class="container">
			<div class="row">	
				<div class="single_about row">
					<div class="col-lg-6 col-md-12 text-center about_left">
						<div class="about_thumb">
							<img src="img/about-img.jpg" class="img-fluid" alt="">
						</div>
					</div>
					<div class="col-lg-6 col-md-12 about_right">
						<div class="about_content">
							<h2>
								We are nonprofit team <br>
									and work worldwide
							</h2>
							<p>
									Their multiply doesn't behold shall appear living heaven second 
									roo lights. Itself hath thing for won't herb forth gathered good 
									bear fowl kind give fly form winged for reason
							</p>
							<p>
									Land their given the seasons herb lights fowl beast whales it 
									after multiply fifth under to it waters waters created heaven 
									very fill agenc to. Dry creepeth subdue them kind night behold 
									rule stars him grass waters our without 
							</p>
							<a href="#" class="primary_btn">Learn more</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End About Us Area =================-->

	<!--================ End Features Cause section =================-->

	<!--================ Start CTA Area =================-->
	<?php if($logged==0)include_once("./phpComponents/volunteer.php")?>
	<!--================ End CTA Area =================-->

	<!--================ Start footer Area  =================-->	
     <?php include_once("./phpComponents/footer.php")?>
	<!--================ End footer Area  =================-->
	
	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/countdown.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/theme.js"></script>
</body>
</html>
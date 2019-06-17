<?include_once("global.php");?>
    <?

//recent posts
if(isset($_GET['sort'])){
    $sortBy = $_GET['sort'];
    if($sortBy=='popularity'){
        $query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId group by p.id order by p.views desc"; 
    }
    if($sortBy=='name'){
        $query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId group by p.id order by p.title desc"; 
    }
    if($sortBy=='date'){
        $query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId group by p.id order by p.datePosted desc"; 
    }
    else{
        $query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId group by p.id order by p.views desc"; 
    }
}
else{
        $query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId group by p.id order by p.views desc"; 
    }
$result_allPosts = $con->query($query_allPosts); 

?>
<!doctype html>
<html lang="en">
    <?php include_once("./phpComponents/header.php")?>
<body>
        
    <!--================ Start Header Menu Area =================-->
    <?php include_once("./phpComponents/navbar.php")?>
    <!--================ End Header Menu Area =================-->
        
    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Projects</h2>
                    <p>Donate to some of the best ideas in your hometown</p>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->
	
	<!--================ Start Causes Area =================-->
	
    <!--================ End Causes Area =================-->

	<!--================ Start Features Cause section =================-->
	
	<section class="features_causes" style="margin-top:40px;">
        <div class="container">
            <div class="main_title">
                <h2>All Projects</h2>
                <p>Donate to some of the best ideas in your hometown</p>
                <select name="project_category"  placeholder="asdsad" onchange="javascript:handleSelect(this)">
                    <option value="popularity">Popularity</option>
                    <option value="name" >Name</option>
                    <option value="date" >Date</option>
                </select>
                <script type="text/javascript">
                    function handleSelect(elm)
                    {
                    window.location = "./allPosts.php?sort="+elm.value;
                    }
                </script>
            </div>

            <div class="row">
			    <?
                    $result_allPosts = $con->query($query_allPosts); 
                    if ($result_allPosts->num_rows > 0)
                    { 
                        while($row = $result_allPosts->fetch_assoc()) 
                        { 
                ?>
                            
				            <div class="col-lg-3 col-md-6">
            					<div class="card">
            						<div class="card-body">
            							<figure>
            							    <?
            							    if(substr($row['image'],-3)=="mp4"){
                                            ?>
                                            <video class="videoImg card-img-top img-fluid" controls loop autoplay>
                                              <source src="./uploads/postImages/<?echo $row['image']?>" type="video/mp4">
                                            </video>
                                            <?}else{?>
                                            
                                            <img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $row['image']?>" alt="">
                                            <?}?>
            							</figure>
            							<div class="card_inner_body" style="padding: 5px 5px;">
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
    <!--================ End Features Cause section =================-->

    <!--================ End CTA Area =================-->
    <!--================ End Features Cause section =================-->

	<!--================ Start CTA Area =================-->
	<?php if($logged==0)include_once("./phpComponents/volunteer.php")?>
	<!--================ End CTA Area =================-->

	<!--================ Start footer Area  =================-->	
     <?php include_once("./phpComponents/footer.php")?>
	<!--================ End footer Area  =================-->
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
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
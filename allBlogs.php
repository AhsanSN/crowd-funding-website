<?include_once("global.php");?>
    <?

//recent posts
if(isset($_GET['sort'])){
    $sortBy = $_GET['sort'];
    if($sortBy=='popularity'){
        $query_allBlogs= "select * from fik_blogs order by views desc"; 
    }
    if($sortBy=='name'){
        $query_allBlogs= "select * from fik_blogs order by title desc";         
    }
    if($sortBy=='date'){
        $query_allBlogs= "select * from fik_blogs order by datePosted desc"; 
        }
    else{
        $query_allBlogs= "select * from fik_blogs order by views desc";     }
}
else{
        $query_allBlogs= "select * from fik_blogs order by views desc"; 
        }
    
//recent posts
$result_allBlogs = $con->query($query_allBlogs); 

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
                    <h2>Blogs</h2>
                    <p>Read of 100s of blogs</p>
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
                <h2>Blogs</h2>
                    <p>Read of 100s of blogs</p>
                    <select name="project_category"  placeholder="asdsad" onchange="javascript:handleSelect(this)">
                    <option value="popularity">Popularity</option>
                    <option value="name" >Name</option>
                    <option value="date" >Date</option>
                </select>
                <script type="text/javascript">
                    function handleSelect(elm)
                    {
                    window.location = "./allBlogs.php?sort="+elm.value;
                    }
                </script>
            </div>

            <div class="row">
			    <?
                    $result_allBlogs = $con->query($query_allBlogs); 
                    if ($result_allBlogs->num_rows > 0)
                    { 
                        while($row = $result_allBlogs->fetch_assoc()) 
                        { 
                ?>
                            
				            <div class="col-lg-3 col-md-6">
            					<div class="card">
            						<div class="card-body">
            							<figure>
            								<img class="card-img-top img-fluid"src="./uploads/postImages/<?echo $row['image']?>" alt="<?echo $row['title']?>">
            							</figure>
            							<div class="card_inner_body" style="padding: 5px 5px;">
            								<h4 class="card-title"><?echo $row['title']?></h4>
            								<p class="card-text">
            									<?echo $row['excerpt']?>
            								</p>
            								<div class="d-flex justify-content-between donation align-items-center">
            									<a href="./blogPage.php?id=<?echo $row['id']?>" class="primary_btn">Read</a>
            									<p><span class="lnr lnr-heart"></span> <?echo $row['views']?> Views</p>
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
<?include_once("global.php");?>
    <?

//recent posts
if(isset($_GET['sort'])){
    $sortBy = $_GET['sort'];
    if($sortBy=='popularity'){
        $query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity*s.price) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId left outer join fik_shopItems s on c.contribution=s.id where p.title != '' group by p.id order by p.views desc"; 
    }
    if($sortBy=='name'){
        $query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity*s.price) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId left outer join fik_shopItems s on c.contribution=s.id where p.title != '' group by p.id order by p.title desc"; 
    }
    if($sortBy=='date'){
        $query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity*s.price) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId left outer join fik_shopItems s on c.contribution=s.id where p.title != '' group by p.id order by p.datePosted desc"; 
    }
    else{
        $query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity*s.price) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId left outer join fik_shopItems s on c.contribution=s.id where p.title != '' group by p.id order by p.views desc"; 
    }
}
else{
        $query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity*s.price) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId left outer join fik_shopItems s on c.contribution=s.id where p.title != '' group by p.id order by p.views desc"; 
    }
$result_allPosts = $con->query($query_allPosts); 

?>
<!doctype html>
<html lang="en">
    <?php include_once("./phpComponents/header.php")?>
    <style>
        .progress{
            margin-bottom:-10px;
            height:7px;
            border-radius: 0px;
        }
        .progress-bar{
            background-color:#54a829;
        }
    </style>
  
<body>
        
    <?php include_once("./phpComponents/navbar.php")?>  
    <!--================ End Header Menu Area =================-->
        
    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
          <style>
        .banner_area .banner_inner .overlay{
            
            background: linear-gradient(0deg, rgba(6, 13, 1, 0.3), rgba(6, 13, 1, 0.3)), url(./img/projectpage.jpg) no-repeat scroll center center;
            background-size:cover
        }
    </style>
            <div class="overlay bg-parallax" id="backImg" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container" style="opacity: 1;border-radius: 20px;">
                <div class="banner_content text-center">
                    <h2 style="color:white;font-size:40px;text-transform: uppercase;"><?translate("All Projects","BAH&Ccedil;IVANLARIN PROJELER&#304;")?></h2>
                    <p style="color:white;font-size:20px;text-transform: uppercase;"><?translate("Donate to some of the best ideas in your hometown","G&#304;r&#304;&#351;&#304;mc&#304;ler ve F&#304;k&#304;r Sah&#304;pler&#304; Neler Yapmak &#304;st&#304;yor?")?></p>
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
            <!--
            <select name="project_category"  placeholder="asdsad" onchange="javascript:handleSelect(this)">
                    <option value="popularity"><?translate("Popularity","Pop&#252;lerlik")?></option>
                    <option value="name" ><?translate("Name","isim")?></option>
                    <option value="date" ><?translate("Date","tarih")?></option>
                </select>
                -->
            <div class="main_title">
                <h2><?translate("All Projects","T&#252;m projeler")?></h2>
                <p><?translate("Donate to some of the best ideas in your hometown","Giri&#351;imciler ve Fikir Sahipleri Neler Yapmak &#304;stiyor?")?></p>
                
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
				                <a href="./postPage.php?id=<?echo $row['id']?>" style="color:#777777;">
            					    <div class="card">
            						<div class="card-body">
            							<figure>
            							    <?
            							    if(substr($row['image'],-3)=="mp4"){
                                            ?>
                                            <video class="videoImg card-img-top img-fluid" controls loop>
                                              <source src="./uploads/postImages/<?echo $row['image']?>" type="video/mp4">
                                            </video>
                                            <?}else{?>
                                            
                                            <img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $row['image']?>" alt="">
                                            <?}?>
            							</figure>
            							<?
            							$percentageCollected = ($row['amountEarned']/($row['goal']+1))*100;
            							?>
            							<div class="progress" style="margin-bottom:3px;">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?echo $percentageCollected?>%">
                                              
                                            </div>
                                          </div>
            							<div class="card_inner_body" style="padding: 5px 5px;">
            								<h4 class="card-title"><?echo $row['title']?></h4>
            								<p class="card-text">
            									<?echo $row['excerpt']?>
            								</p>
            								<div class="d-flex justify-content-between raised_goal">
            									<p><?translate("Raised","Biriken")?>:  &#8378; <?echo $row['amountEarned']?></p>
            									<p><span><?translate("Goal","Hedef")?>:  &#8378; <?echo $row['goal']?></span></p>
            								</div>
            								<div class="d-flex justify-content-between donation align-items-center">
            									<a href="./postPage.php?id=<?echo $row['id']?>" class="primary_btn"><?translate("donate","Destekle")?></a>
            									<p><span class="lnr lnr-heart"></span> <?echo $row['nContributors']?> <?translate("Donors","Destek&#231;iler")?></p>
            								</div>
            							</div>
            						</div>
            					</div>
            					</a>
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
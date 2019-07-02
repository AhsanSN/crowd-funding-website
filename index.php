<?include_once("global.php");?>
<?
// recent 3 posts

//booked rooms list
$query_recent3Posts = "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId group by c.postId order by p.id desc limit 3"; 

?>
<!doctype html>
<html lang="en">
    <?php include_once("./phpComponents/header.php")?>
    <link rel="stylesheet" href="css/videoBanner.css">
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
        
	<!--================ Start Header Menu Area =================-->
	<?php include_once("./phpComponents/navbar.php")?>  
	<!--================ End Header Menu Area =================-->
	
	<!--================ Home Banner Area =================-->
	
	<section class="features_causes" style="background-color:#008c7d;padding-bottom:2px;margin-top:3px;">
		

<video autoplay muted height="100%" width="100%" loop id="myVideo" style="margin-top:68px;">
  <source src="./uploads/bannerVideo.mp4" type="video/mp4">
</video>

<div class="container">
    <br>
			<div class="main_title">
				<h3 style=" color: white;font-size:30px"><?translate("Create a better world","DAHA B&Uuml;Y&Uuml;K B&#304;R A&#304;LE &#304;&Ccedil;&#304;N!")?></h3>
                        <p style="color: white;font-size:20pxline-height: 20px;">
                            <?translate("Donate to some of the best ideas globally. ","Haydi Beraber &#304;lk Ba&#351;ar&#305; Hikayemizi Olu&#351;tural&#305;m!")?></p>
            <a class="primary_btn mr-20" href="./postPage.php?id=2" style="font-size:13px;"><?translate("Donate Now","F&#304;k&#304;r Bah&ccedil;&#305;van&#305;'na Destek Olun!")?></a>
                            
			</div>
			</div>

					
	</section>
	<!--================ End Home Banner Area =================-->
	
	
	<!--================ Start Features Cause section =================-->
	<br><br>
	<section class="features_causes">
		<div class="container">
			<div class="main_title">
				<h2><?translate("Newest Projects", "Bah&ccedil;&#305;vanlar&#305;n Projeleri")?></h2>
				<p><?translate("Some of the newest projects.","Haydi Fikir Tohumlar&#305;n&#305; &#304;nceleyelim!")?></p>
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
            								<?
            							    if(substr($row['image'],-3)=="mp4"){
                                            ?>
                                            <video class="videoImg card-img-top img-fluid" controls loop>
                                              <source src="./uploads/postImages/<?echo $row['image']?>" type="video/mp4" alt="<?echo $row['title']?>">
                                            </video>
                                            <?}else{?>
                                            
                                            <img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $row['image']?>" alt="<?echo $row['title']?>">
                                            <?}?>
            							</figure>
            							<?
            							$percentageCollected = ($row['amountEarned']/($row['goal']+1))*100;
            							?>
            							<div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?echo $percentageCollected?>%">
                                              
                                            </div>
                                          </div>
            							<div class="card_inner_body">
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
				<h2><?translate("What do we do?", "Neler Yap&#305;yoruz?")?></h2>
				<p><?translate("We bring the generous donors and the people with big ideas one step closer.", "Kitleleri ve fikir sahiplerini bir araya getirerek, projelerin ye&#351;ermesi i&ccedil;in &ccedil;al&#305;&#351;malar yap&#305;yoruz.")?></p>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
						<h4><?translate("Give Donation", "Fikir Tohumlar&#305;n&#305; &#304;nceleyin!")?></h4>
						<img style="height:100px; width:100px;" src="img/symbol1.png" alt="">
						<p>
							<?translate("Give donation to some of the best ideas around you and help make this world a better place to live in.", "Platformda yer alan projeleri inceleyebilir ya da sizde proje yollayarak platformumuzda yer alabilirsiniz. Her fikir gelece&#287;i de&#287;i&#351;tirebilir anlay&#305;&#351;&#305; ile her konudaki fikire a&ccedil;&#305;&#287;&#305;z. Tek istedi&#287;imiz sizin fikrinize g&uuml;venmeniz.")?>
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
						<h4><?translate("Give Inspiration", "Bah&ccedil;&#305;vanlar&#305;n Yan&#305;nda Yer Al&#305;n!")?></h4>
						<img style="height:100px; width:100px;" src="img/symbol2.png" alt="">
						<p>
							<?translate("Inspire people with big dreams and passion to come forward and contribute in making this world better.", "Her fikir sahibi ve fikrin geli&#351;mesi i&ccedil;in &ccedil;aba g&ouml;sterenler bizim i&ccedil;in bir bah&ccedil;&#305;vand&#305;r, &ccedil;&uuml;nk&uuml; her fikir bir tohumdur. Sizde platformumuzda yer alan projelere destekte bulunarak, bah&ccedil;&#305;vanlar&#305;n yan&#305;nda bulunabilirsiniz.")?>
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
						<h4><?translate("Become Volunteer", "El Ele Neler Ba&#351;ard&#305;&#287;&#305;m&#305;z&#305; Fark Edin!")?></h4>
						<img style="height:100px; width:100px;" src="img/symbol3.png" alt="">
						<p>
							<?translate("Be one of the thousands generous donors, and donate to the deserving minds.", "Destekte bulundu&#287;unuz fikirlerin sizler sayesinde neler ba&#351;ard&#305;&#287;&#305;n&#305; g&ouml;zlerinizle g&ouml;rd&uuml;&#287;&uuml;n&uuml;z zaman gelece&#287;e dair anlay&#305;&#351;&#305;n&#305;z de&#287;i&#351;ecek. &#350;unu unutmay&#305;n ki: siz, bah&ccedil;&#305;van&#305;n yan&#305;nda bulunmasayd&#305;n&#305;z; proje ba&#351;ar&#305;ya ula&#351;mayacakt&#305;.")?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Causes Area =================-->

	<!--================ Start About Us Area =================-->
	
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
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
        

</body>


</html>
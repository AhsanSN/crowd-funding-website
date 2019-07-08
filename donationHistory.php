<?include_once("global.php");?>
    <?
    include_once("./phpComponents/checkLoginStatus.php");


//cart items for check out (1. single line for each)
//$query_cartItemsCheckout= "SELECT p.title, s.name, c.quantity, (c.quantity*s.price)as cost, c.timeDone FROM `fik_contributions` c inner join fik_posts p on p.id=c.postId inner join fik_shopItems s on s.id=c.contribution order by c.id desc"; //for now

$query_cartItemsCheckout= "SELECT p.title, s.name, sum(c.quantity)as quantity, sum(c.quantity*s.price)as cost,round(sum(c.quantity*s.price) - (sum(c.quantity*s.price)*100)/(118),2) as kdv,  c.timeDone FROM `fik_contributions` c inner join fik_posts p on p.id=c.postId inner join fik_shopItems s on s.id=c.contribution where c.userId='$session_userId' GROUP by c.postId order by c.id DESC
"; //for now


$result_cartItemsCheckout = $con->query($query_cartItemsCheckout); 

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
            <style>
        .banner_area .banner_inner .overlay{
            
            background: linear-gradient(0deg, rgba(6, 13, 1, 0.3), rgba(6, 13, 1, 0.3)), url(./img/garden.jpg) no-repeat scroll center center;
            background-size:cover
        }
    </style>
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2><?translate("Donation History","Ba&#287;&#305;&#351; Tarihi")?></h2>
                </div>
            </div>
        </div>
    </section>

	
	<section class="features_causes">
        <div class="container">
      

            <div class="row">
                <div class="col-lg-12 posts-list">
                    
                    <div class="section-top-border">
						<div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head">
									<div class="serial">#</div>
									<div class="country"><?translate("Title","Ba&#351;l&#305;k")?></div>
									<div class="visit"><?translate("Item","madde")?></div>
									<div class="percentage"><?translate("Quantity","miktar")?></div>
									<div class="percentage"><?translate("Value","de&#287;er")?></div>
									<?
									if($session_AgreeOption == "moneyToFikir"){
									   ?><div class="percentage"><?translate("Sales Tax","KDV")?></div><?
									}
									?>
									
									<div class="percentage"><?translate("Date","tar&#304;h")?></div>
									
								</div>
								<?
								if ($result_cartItemsCheckout->num_rows > 0)
                                { 
                                    while($row = $result_cartItemsCheckout->fetch_assoc()) 
                                    { 
    								?>
    								    <div class="table-row">
        									<div class="serial">-</div>
        									<div class="country"><?echo $row['title']?></div>
        									<div class="visit"><?echo $row['name']?></div>
        									<div class="percentage"><?echo $row['quantity']?></div>
        									<div class="percentage">&#8378; <?echo $row['cost']?></div>
        									<?
        									if($session_AgreeOption == "moneyToFikir"){
        									    ?><div class="percentage">&#8378; <?echo $row['kdv']?></div><?
        									}
        									?>
        									
        									<div class="percentage">
        										 <?echo date('Y/m/d H:i', $row['timeDone']);?>
        									</div>
        								</div>
    								<?
                                    }
                                }
								?>
						
							</div>
						</div>
					</div>
                    
                    
                    
				</div>
				
				
				
			
                    
			</div>
        </div>
    </section>

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
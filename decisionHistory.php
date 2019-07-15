<?include_once("global.php");?>
    <?
    include_once("./phpComponents/checkLoginStatus.php");


//cart items for check out
$query_cartItemsCheckout= "select * from fik_postApproval where userId = '$session_userId' order by id desc"; //for now
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
                    <h2><?translate("Posts","Projelerinizin Durumları")?></h2>
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
									<div class="country"><?translate("Title","Proje Adı")?></div>
									<div class="visit"><?translate("Goal","Hedef")?></div>
									<div class="percentage"><?translate("Excerpt","Kısa açıklama")?></div>
									<div class="percentage"><?translate("Decision","Karar")?></div>
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
        									<div class="visit"><?echo $row['goal']?> &#8378; </div>
        									<div class="percentage">
        										 <?echo $row['excerpt']?>
        									</div>
        									<div class="percentage">
        									    <?if ($row['decision']==''){
        									        ?>
        									        <p style="color:orange;"><?translate("Pending","Bekleniyor")?></p>
        									        <?
        									    }
        									    ?>
        									    <?if ($row['decision']=='rejected'){
        									        ?>
        									        <p style="color:red;"><?translate("Rejected","Reddedildi")?></p>
        									        <?
        									    }
        									    ?>
        									    <?if ($row['decision']=='posted'){
        									        ?>
        									        <p style="color:green;"><?translate("Approved","Onaylandı")?></p>
        									        <?
        									    }
        									    ?>
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

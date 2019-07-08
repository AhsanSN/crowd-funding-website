<?include_once("global.php");?>
<?include_once("global.php");?>
    <?
    include_once("./phpComponents/checkLoginStatus.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        //cart items for check out
        $query_cartItemsCheckout= "SELECT p.id, p.datePosted,  p.title, s.name, c.quantity, (c.quantity*s.price)as cost, c.timeDone FROM `fik_contributions` c inner join fik_posts p on p.id=c.postId
        inner join fik_shopItems s on s.id=c.contribution where p.id='$id' order by c.id desc "; //for now
        $result_cartItemsCheckout = $con->query($query_cartItemsCheckout); 
    }
    else{
        ?>
            <script type="text/javascript">
                window.location = "./home.php";
            </script>
            <?
    }
?>

<!doctype html>
<html lang="en">
    <?php include_once("./phpComponents/header.php")?>
<body>
        
	<!--================ Start Header Menu Area =================-->
	<?php include_once("./phpComponents/navbar.php")?>
	
    <!--================ End Header Menu Area =================-->
        
    <!--================ Home Banner Area =================-->
     <style>
        .banner_area .banner_inner .overlay{
            
            background: linear-gradient(0deg, rgba(6, 13, 1, 0.3), rgba(6, 13, 1, 0.3)), url(./img/about.jpg) no-repeat scroll center center;
            background-size:cover
        }
    </style>
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container" style="background-color:purple;opacity: .8;border-radius: 20px;">
                <div class="banner_content text-center">
                    <h2><?translate("Receipt","Receipt")?></h2>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

	<!--================ Start About Us Area =================-->
    <!--================ End About Us Area =================-->

	<!--================Team Area =================-->
	<section class="team_area section_gap">
        <div class="container">
            <div class="main_title">
                <h2>Donation Receipt</h2>
                <p>Project has expired and here is the receipt</p>
            </div>
            <div >
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
									<div class="percentage"><?translate("Date","tarih")?></div>
								</div>
								<?
								if ($result_cartItemsCheckout->num_rows > 0)
                                { 
                                    while($row = $result_cartItemsCheckout->fetch_assoc()) 
                                    { 
                                        if(((time() - $row['datePosted']) >= 7776000 )&&( $row['id']!=2)){
                                            echo "";
                                        }
                                        else{
                                            ?>
                                            <script type="text/javascript">
                                                window.location = "./home.php";
                                            </script>
                                            <?
                                        }
                                        
    								?>
    								    
    								    <div class="table-row">
        									<div class="serial">-</div>
        									<div class="country"><?echo $row['title']?></div>
        									<div class="visit"><?echo $row['name']?></div>
        									<div class="percentage"><?echo $row['quantity']?></div>
        									<div class="percentage">&#8378; <?echo $row['cost']?></div>
        									<div class="percentage">
        										 <?echo date('Y/m/d H:i', $row['timeDone']);?>
        									</div>
        								</div>
    								<?
                                    }
                                }
                                else{
                                    ?>
                                    <script type="text/javascript">
                                        window.location = "./home.php";
                                    </script>
                                    <?
                                }
								?>
						
							</div>
						</div>
					</div>
                    
                    
                    
				</div>
				
				
				
			
                    
			</div>
        </div>
    </section>
    <!--================End Team Area =================-->

	<!--================ Start CTA Area =================-->
	
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
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
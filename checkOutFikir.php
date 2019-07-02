<?include_once("global.php");?>
    <?
    include_once("./phpComponents/checkLoginStatus.php");

if(isset($_GET['removeItem'])){
    $remItem = $_GET['removeItem'];
    $sql="delete from fik_cart where object='$remItem' and userId='$session_userId'";
        if(!mysqli_query($con,$sql))
        {
        echo"err";
        }
}

//cart items for check out
$query_cartItemsCheckout= "select c.id, c.userId,c.object,c.quantity,s.name,s.price,s.image,s.description,(s.price*c.quantity)as total from fik_cart c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_cartItemsCheckout = $con->query($query_cartItemsCheckout); 

//total bill
$query_totalBill= "select sum(s.price*c.quantity) as total from fik_cart c inner join fik_shopItems s on c.object=s.id where userId='$session_userId'"; //for now
$result_totalBill = $con->query($query_totalBill); 
if ($result_totalBill->num_rows > 0)
{ 
    while($row = $result_totalBill->fetch_assoc()) 
    { 
        $total = $row['total'];
    }
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
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <style>
                #backImg{
                    /**background: rgba(0, 0, 0, 0) url("https://img1.beachbodyimages.com/teambeachbody/image/upload/Teambeachbody/shared_assets/Shop/Nutrition/Shop-Nutrition-CDP/Hero/shop-nut-cdp-hero-bcb-launch-mbl-1920-500-en-us-030818.jpg") no-repeat scroll center center;position: absolute;**/
                
                    background: rgba(0, 0, 0, 0) url("./img/manavbanner(3).jpg") no-repeat scroll center center;position: absolute;
                }
            </style>
            <div class="overlay bg-parallax" id="backImg" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2><?translate("Thanks for donating","Ba&#287;&#305;&#351; i&ccedil;in te&#351;ekk&uuml;rler")?></h2>
                </div>
            </div>
        </div>
    </section>

	
	<section class="features_causes" style="margin-top:40px;">
        <div class="container">
          
            <div class="row">
                <div class="col-lg-8 posts-list">
                    
                    <div class="section-top-border">
						<div class="progress-table-wrap">
							<div class="progress-table" class="text-center">
								<h2 class="text-center"><?translate("Thanks for donating","Ba&#287;&#305;&#351; i&ccedil;in te&#351;ekk&uuml;rler")?></h2>
							</div>
						</div>
					</div>
                    
                    
                    
				</div>
				
				
				
				<div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title"><?translate("Summary","&#246;zet")?></h4>
                                <?
                                
                                ?>
                                <ul class="list cat-list">
                                    <?
                                    $costWithoutKDV = round(($total*100)/(118),2);
                                    $kdv = $total - $costWithoutKDV;
                                    ?>
                                  
                                                <a class="d-flex justify-content-between">
                                                    <h4><?translate("Total","Genel Toplam")?></h4>
                                                    <h4>
                                                        
                                                        <div class="row">
                                                                <div class="col s12">
                                                                   
                                                                  <div class="input-field inline">
                                                                      <label for="email_inline">&#8378 </label>
                                                                    <input style="width:100px; text-align: center; " id="email_inline" type="number" class="validate" min="1" max="100000">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                    </h4>
                                                </a>
                                    </li>
                                    															
                                </ul>
                            </aside>
                            
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title"><?translate("Payment Options","&#246;deme se&#231;enekleri")?></h4>
                                <ul class="list cat-list">
                                    <li>
                                                <a class="d-flex justify-content-between">
                                                    <p>PayTr</p>
                                                    <p>
                                                       <button type="button" class="btn btn-primary" id="sendNewSms" >
                                                                    <?translate("","")?>Pay
                                                                </button>
                                                    </p>
                                                </a>
                                    </li>
                                    															
                                </ul>
                                <div class="form-group">
                                    <br>
                              <p class="text-center"><span><input type="checkbox" id="scales" name="scales"  onchange="document.getElementById('sendNewSms').disabled = !this.checked;" required> I agree with the <a href="./tnc.php">terms and conditions</a></span></p>
                           </div>
                            </aside>
            
        

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
        <script>
            document.getElementById('sendNewSms').disabled = true;
        </script>
    </body>
</html>
<?include_once("global.php");?>
    <?
    include_once("./phpComponents/checkSignupStatus.php");

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
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Checkout</h2>
                    <p>Use your most trusted payment methods to make the payment.</p>
                </div>
            </div>
        </div>
    </section>

	
	<section class="features_causes" style="margin-top:40px;">
        <div class="container">
            <div class="main_title">
                <h2>Checkout</h2>
                <p>Use your most trusted payment methods to make the payment.</p>
            </div>

            <div class="row">
                <div class="col-lg-8 posts-list">
                    
                    <div class="section-top-border">
						<div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head">
									<div class="serial">#</div>
									<div class="country">Item</div>
									<div class="visit">Quantity</div>
									<div class="percentage">Total Cost</div>
									<div class="percentage">Action</div>
								</div>
								<?
								if ($result_cartItemsCheckout->num_rows > 0)
                                { 
                                    while($row = $result_cartItemsCheckout->fetch_assoc()) 
                                    { 
    								?>
    								    <div class="table-row">
        									<div class="serial">01</div>
        									<div class="country"> <img  width="70" height="50"  src="./uploads/postImages/<?echo $row['image']?>" alt="flag"><?echo $row['name']?></div>
        									<div class="visit"><?echo $row['quantity']?></div>
        									<div class="percentage">
        										$<?echo $row['quantity']* $row['price']?>
        									</div>
        									<div class="percentage">
        										<a href="?removeItem=<?echo $row['id']?>" style="background-color:red;" class="btn btn-primary">
                                                    Remove
                                                </a>
        									</div>
        								</div>
    								<?
                                    }
                                }
								?>
								<div class="table-row" style="background-color:#b6ff5c;">
    									<div class="serial"><b style="font-weight:bold;color:black;">Total</b></div>
    									<div class="country"></div>
    									<div class="visit"></div>
    									<div class="percentage">
    										<b style="font-weight:bold;color:black;">$<?echo $total?></b>
    									</div>
    							</div>
					
							</div>
						</div>
					</div>
                    
                    
                    
				</div>
				
				
				
				<div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Payment Options</h4>
                <ul class="list cat-list">
                    <li>
                                <a class="d-flex justify-content-between">
                                    <p>PayTr</p>
                                    <p>
                                       <button type="button" class="btn btn-primary">
                                                    Pay
                                                </button>
                                    </p>
                                </a>
                    </li>
                    															
                </ul>
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
    </body>
</html>
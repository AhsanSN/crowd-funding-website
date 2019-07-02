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

$costWithoutKDV = round(($total*100)/(118),2);
$kdv = $total - $costWithoutKDV;

if(isset($_GET['insertOrder'])){
    $orderId = md5(md5(sha1( mt_rand(111111111, 99999999999999999999999))).'Anomoz');
    $country= mb_htmlentities($_POST['country']);
    $state= mb_htmlentities($_POST['state']);
    $city= mb_htmlentities($_POST['city']);
    $streetAddress= mb_htmlentities($_POST['streetAddress']);
    
    $date = time();
    $sql="insert into fik_orders (`orderId`, `datePlaced`, `totalAmount`, `KDV`, `withoutKDV`, `status`, `userId`, `country`, `state`, `city`, `streetAddress`) values ('$orderId', '$date', '$total', '$kdv', '$costWithoutKDV', 'waiting', '$session_userId', '$country', '$state', '$city', '$streetAddress')";
    if(!mysqli_query($con,$sql))
    {
    echo"err";
    }
    
    //add to cartitems
    //cart items for check out
    $query_cartItemstoDBOrders= "select c.id, c.userId,c.object,c.quantity,s.name,s.price,s.image,s.description,(s.price*c.quantity)as total from fik_cart c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
    $result_cartItemstoDBOrders = $con->query($query_cartItemstoDBOrders); 
    if ($result_cartItemstoDBOrders->num_rows > 0)
    { 
        while($row = $result_cartItemstoDBOrders->fetch_assoc()) 
        { 
            $item = $row['object'];
            $quantity = $row['quantity'];
            $sql="insert into fik_orderItems (`orderId`, `item`, `quantity`) values ('$orderId', '$item', '$quantity')";
            if(!mysqli_query($con,$sql))
            {
            echo"err";
            }
            
        }
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

	<br>
	<form action="" method="post">
	    <section class="features_causes" style="margin-top:100px;">
        <div class="container">
            <div class="main_title">
                <h2><?translate("Checkout","&#199;&#305;k&#305;&#351; yapmak")?></h2>
                    <p><?translate("Use your most trusted payment methods to make the payment.","&#246;deme yapmak &#231;in en g&#252;venilir &#246;deme y&#246;ntemlerinizi kullan&#305;n.")?></p>
            </div>

            <div class="row">
                <div class="col-lg-8 posts-list">
                    
                    <div class="section-top-border">
						<div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head">
									<div class="serial">#</div>
									<div class="country"><?translate("Item","Madde")?></div>
									<div class="visit"><?translate("Quantity","miktar")?></div>
									<div class="percentage"><?translate("Total Cost","Toplam tutar")?></div>
									<div class="percentage"><?translate("Action","Aksiyon")?></div>
								</div>
								<?
								if ($result_cartItemsCheckout->num_rows > 0)
                                { 
                                    while($row = $result_cartItemsCheckout->fetch_assoc()) 
                                    { 
    								?>
    								    <div class="table-row">
        									<div class="serial">-</div>
        									<div class="country"> <img  width="70" height="50"  src="./uploads/postImages/<?echo $row['image']?>" alt="flag"><?echo $row['name']?></div>
        									<div class="visit"><?echo $row['quantity']?></div>
        									<div class="percentage">
        										 &#8378; <?echo $row['quantity']* $row['price']?>
        									</div>
        									<div class="percentage">
        										<a href="?removeItem=<?echo $row['id']?>" style="background-color:red;" class="btn btn-primary">
                                                    <?translate("Remove","Kald&#305;r")?>
                                                </a>
        									</div>
        								</div>
    								<?
                                    }
                                }
								?>
								<div class="table-row" style="background-color:#b6ff5c;">
    									<div class="serial"><b style="font-weight:bold;color:black;"><?translate("Total","Genel Toplam")?></b></div>
    									<div class="country"></div>
    									<div class="visit"></div>
    									<div class="percentage">
    										<b style="font-weight:bold;color:black;"> &#8378; <?echo $total?></b>
    									</div>
    							</div>
    							<br>
    							<h4><?translate("Address","Address")?></h4>
    							<div class="table-row" >
    							    <div class="row">
    							        <div class="col-md-4">
    							            <p>Country</p>
                                                <select name="country" class="countries form-control" id="countryId" style="margin-bottom:5px;">
                                                    <option value="<?echo $session_country?>"><?echo $session_country?></option>
                                                </select>
    							        </div>
    							        <div class="col-md-4">
    							           <p>State</p>
                                                <select name="state" class="states form-control" id="stateId" style="margin-bottom:5px;">
                                                    <option value="<?echo $session_state?>" ><?echo $session_state?></option>
                                                </select>
    							        </div>
    							        <div class="col-md-4">
    							            <p>City</p>
                                                <select name="city" class="cities form-control" id="cityId" style="margin-bottom:5px;">
                                                    <option value="<?echo $session_city?>"><?echo $session_city?></option>
                                                </select>
    							        </div>
    							        
    							    </div>
    							    
    							    
    							</div>
    							<div class="row">
    							    <div class="col-md-12">
    							            <p>Street Address</p>
                                                <textarea style="width: 50vw;height:20vh;" name="streetAddress" class="form-control" placeholder="Describe yourself here..."><?if($session_streetAddress!=''){echo $session_streetAddress;}else{echo 'Street Address...';}?></textarea>

    							        </div>
    							        </div>
    							<br>
    							<h4><?translate("Agreements","Agreements")?></h4>
    							
    							
					
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
                                    
                                    <li>
                                                <a class="d-flex justify-content-between">
                                                    <p><?translate("Cost", "Maliyet")?></p>
                                                    <p>
                                                       &#8378; <?echo $costWithoutKDV?>
                                                    </p>
                                                </a>
                                    </li>
                                    <li>
                                                <a class="d-flex justify-content-between">
                                                    <p>KDV</p>
                                                    <p>
                                                       &#8378; <?echo $kdv?>
                                                    </p>
                                                </a>
                                    </li>
                                    <li>
                                                <a class="d-flex justify-content-between">
                                                    <h4><?translate("Total","Genel Toplam")?></h4>
                                                    <h4>
                                                        &#8378; <?echo $total?>
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
                                                       <a href="./checkout.php?insertOrder=3s2d1s83v12f5cd1g7m3do6">
                                                       <button type="submit" class="btn btn-primary" id="sendNewSms" >
                                                                    <?translate("","")?>Pay
                                                                </button></a>
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
    </form>

	<?php if($logged==0)include_once("./phpComponents/volunteer.php")?>
	<!--================ End CTA Area =================-->

	<!--================ Start footer Area  =================-->	
     <?php include_once("./phpComponents/footer.php")?>
	<!--================ End footer Area  =================-->
    <!--================ End footer Area  =================-->  
        
        <script src="js/jquery-3.2.1.min.js"></script>
                       
                        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
                        <script src="//geodata.solutions/includes/countrystatecity.js"></script>
        <script>
            document.getElementById('sendNewSms').disabled = true;
        </script>
    </body>
</html>
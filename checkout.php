<?include_once("global.php");?>
    <?
    include_once("./phpComponents/checkLoginStatus.php");

if(isset($_GET['postRefId'])&&isset($_GET['itemId'])){
    $postRefId = $_GET['postRefId'];
    $itemIdURL = $_GET['itemId'];
    //only have this item cart -delete rest
    if($postRefId!="none"){
        $sql="delete from fik_cart where object!='$itemIdURL' and userId='$session_userId'";
        if(!mysqli_query($con,$sql))
        {
        echo"err";
        }
    }
    
}else{
    $postRefId="none";
}

if(isset($_GET['removeItem'])){
    $remItem = $_GET['removeItem'];
    ?>
    <script>console.log("9999");</script>
    <?
    $sql="delete from fik_cart where object='$remItem' and userId='$session_userId'";
        if(!mysqli_query($con,$sql))
        {
        echo"err";
        }
}

//cart items for check out
$query_cartItemsCheckout= "select s.id, c.userId,c.object,c.quantity,s.name,s.price,s.image,s.description,(s.price*c.quantity)as total from fik_cart c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
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

if(isset($_POST['condition'])){
    $orderId = md5(md5(sha1( mt_rand(111111111, 99999999999999999999999))).'Anomoz');
    
    if(!isset($_POST['country'])){
        $country = $session_country;
    }else{$country= mb_htmlentities($_POST['country']);}
    
    if(!isset($_POST['state'])){
        $state = $session_state;
    }else{$state= mb_htmlentities($_POST['state']);}
    
    if(!isset($_POST['city'])){
        $city = $session_city;
    }else{$city= mb_htmlentities($_POST['city']);}
    
    if(!isset($_POST['streetAddress'])){
        $streetAddress = $session_streetAddress;
    }else{$streetAddress= mb_htmlentities($_POST['streetAddress']);}
    
    if(!isset($_POST['identityNumber'])){
        $identityNumber = $session_identityNumber;
    }else{$identityNumber= mb_htmlentities($_POST['identityNumber']);}
    
    $isAnon= mb_htmlentities($_POST['isAnon']);
    
    
    
    $date = time();
    $AgreeOption = $_POST['condition'];
    $sql="insert into fik_orders (`orderId`, `datePlaced`, `totalAmount`, `KDV`, `withoutKDV`, `status`, `userId`, `country`, `state`, `city`, `streetAddress`, `AgreeOption`, `identityNumber`) values
    ('$orderId', '$date', '$total', '$kdv', '$costWithoutKDV', 'waiting', '$session_userId', '$country', '$state', '$city', '$streetAddress', '$AgreeOption', '$identityNumber')";
    if(!mysqli_query($con,$sql))
    {
    echo"err";
    }
  
    $sql="update fik_users set AgreeOption='$AgreeOption', isAnon='$isAnon',  country='$country', state='$state', city='$city', streetAddress='$streetAddress', identityNumber='$identityNumber'  where  id='$session_userId'";
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
    
    
    //considering everything was purchased - $postRefId
    //clean cart
    
    
    //first add things to my bag
    $query_dbOrdersToBag= "select * from fik_cart c where c.userId='$session_userId'"; //for now
    $result_dbOrdersToBag = $con->query($query_dbOrdersToBag); 
    if ($result_dbOrdersToBag->num_rows > 0)
    { 
        while($row = $result_dbOrdersToBag->fetch_assoc()) 
        { 
            $object = $row['object'];
            $quantity = $row['quantity'];
            //if item exist
            $query_itemInCart= "select * from fik_inventory i where i.userId='$session_userId' and i.object='$object'"; 
            $result_itemInCart = $con->query($query_itemInCart); 
            if ($result_itemInCart->num_rows > 0)
            { 
                //update
                $sql="update fik_inventory set quantity=quantity+'$quantity' where userId='$session_userId' and object='$object'";
                if(!mysqli_query($con,$sql))
                {
                echo"err";
                }
            }
            else{
                // insert new
                $sql="insert into fik_inventory (`userId`, `object`, `quantity`) values ('$session_userId', '$object', '$quantity')";
                if(!mysqli_query($con,$sql))
                {
                echo"err";
                }
            }
        }
    }
    
    //delete my cart
    $sql="delete from fik_cart where userId='$session_userId'";
        if(!mysqli_query($con,$sql))
        {
        echo"err";
        }
    
    //donate to $postRefId
    if($postRefId!="none"){
        ?>
            <script>window.location = "./postPage.php?id=<?echo $postRefId?>&postRefId=<?echo $postRefId?>&itemId=<?echo $itemIdURL?>"</script>
            <?
    }
    else{
        ?>
            <script>window.location = "./home.php"</script>
            <?
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
             <style>
                 .progress-table{
                     min-width: 100px;
                 }
             </style>
            
                <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="section-top-border">
						<div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head">
									<div class="serial">#</div>
									<div class="country" style="margin-left:4px;"><?translate("Image","Image")?></div>
									<div class="country" style="margin-left:4px;"><?translate("Item","Madde")?></div>
									<div class="country" style="margin-left:4px;"><?translate("Quantity","miktar")?></div>
									<div class="country"style="margin-left:4px;"><?translate("Total Cost","Toplam tutar")?></div>
									<div class="country"style="margin-left:4px;"><?translate("Action","Aksiyon")?></div>
								</div>
								<?
								if ($result_cartItemsCheckout->num_rows > 0)
                                { 
                                    while($row = $result_cartItemsCheckout->fetch_assoc()) 
                                    { 
    								?>
    								    <div class="table-row">
        									<div class="serial">-</div>
        									<div class="country" style="margin-left:4px;">
        									     <img  width="70" height="50"  src="./uploads/postImages/<?echo $row['image']?>" alt="flag">
        									</div>
        									<div class="country" style="margin-left:4px;"><?echo $row['name']?></div>
        									<div class="country" style="margin-left:4px;"><?echo $row['quantity']?></div>
        									<div class="country" style="margin-left:4px;">
        										 &#8378; <?echo $row['quantity']* $row['price']?>
        									</div>
        									<div class="country" style="margin-left:4px;">
        									    <a href="./checkout.php?removeItem=<?echo $row['id']?>" style="background-color:red;" class="btn btn-primary">
                                                    <?translate("Remove","Kald&#305;r")?>
                                                </a>
        									    <!--
        										<div onclick='removeItem("<?echo $row['id']?>")' style="background-color:red;" class="btn btn-primary">
                                                    <?translate("Remove","Kald&#305;r")?>
                                                </div>
                                                -->
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
    									<div class="country">
    										<b style="font-weight:bold;color:black;"> &#8378; <?echo $total?></b>
    									</div>
    							</div>
    							<br>
    							 
    							 <?if(strlen($session_identityNumber)<3){?>
    							 <h4><?translate("Identity Number","Identity Number")?></h4>
    							 <input style="width: 50vw;" maxlength="11" name="identityNumber" type="text" class="form-control" value="00000000000" required>
    							 <br>
    							 <?}?>
    							 
    							 
                                <?if((strlen($session_streetAddress)<3) || (strlen($session_country)<3)){?>
    							<h4><?translate("Address","Address")?></h4>
    							<?}?>
    							<?if(strlen($session_country)<3){?>
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
    							<?}?>
    							
    							<?if(strlen($session_streetAddress)<3){?>
    							<div class="row">
    							    <div class="col-md-12">
    							            <p>Street Address</p>
                                                <textarea style="width: 50vw;height:20vh;" name="streetAddress" class="form-control" placeholder="Describe yourself here..."><?if($session_streetAddress!=''){echo $session_streetAddress;}else{echo 'Street Address...';}?></textarea>

    							        </div>
    							        </div>
    							 <?}?>
    							<br>
    							<?if ($postRefId!=2){?>
        							<h4><?translate("Agreements","Agreements")?></h4>
        							
                                    <div>
                                      <input type="radio" id="huey" name="condition" value="moneyToMe"
                                             >
                                      <label for="huey">If the project expires and goal has not been met, all the money should be sent to Me</label>
                                    </div>
                                    <div>
                                      <input type="radio" id="huey" name="condition" value="moneyToFikir"
                                             >
                                      <label for="huey">If the project expires and goal has not been met, all the money should be sent to FIKIR BAHCIVANI</label>
                                    </div>
                                <?}else{?>
                                    <input type="radio" id="huey" name="condition" value="moneyToFikir" checked style="display:none;"
                                             >
                                <?}?>
                                
                                <h4><?translate("Donate as","Donate as")?></h4>
        							
                                    <div>
                                      <input type="radio" id="huey" name="isAnon" value="0"
                                             checked>
                                      <label for="huey"><?echo $session_name?></label>
                                    </div>
                                    <div>
                                      <input type="radio" id="huey" name="isAnon" value="1"
                                             >
                                      <label for="huey">Anonymous Gardener</label>
                                    </div>
                                
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
                                    <?if($postRefId==2){?>
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
                                    <?}?>
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
                                                       <a href="./checkout.php?insertOrder=3s2d1s83v12f5cd1g7m3do6&postRefId=<?echo $postRefId?>">
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
        <script src="js/popper.js"></script>
                        <script src="js/bootstrap.min.js"></script>
                        <script src="js/stellar.js"></script>
                        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
                        
                        <!--gmaps Js-->
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
                        <script src="js/gmaps.min.js"></script>
                        
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <?if(strlen($session_country)<3){?>
        <script src="//geodata.solutions/includes/countrystatecity.js"></script>
    <?}?>
                        
        <script>
            document.getElementById('sendNewSms').disabled = true;
            
            function removeItem(productId){
                
                /**
                var http = new XMLHttpRequest();
                http.open("POST", "checkout.php", true);
                http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                var params = "removeItem=" + productId; // probably use document.getElementById(...).value
                http.send(params);
                console.log("--", params);
                **/
                
               
                
            }
                                        
                                        
        </script>
    </body>
</html>
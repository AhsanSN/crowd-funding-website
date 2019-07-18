<?include_once("global.php");?>
    <?
if(isset($_GET['postRefId'])){
    $postRefId = $_GET['postRefId'];
}else{
    $postRefId="none";
}

if(isset($_POST['itemSelect'])&&isset($_POST['quantitySelect'])){
    
    $donationStatus= "failed";
    $objectId = ($_POST['itemSelect']);
    $quantity = ($_POST['quantitySelect']);
    if($quantity<0){
        $quantity=0;
    }
    $query_checkIfinCart= "select * from fik_cart where object= '$objectId' and userId='$session_userId'"; 
    $result_checkIfinCart = $con->query($query_checkIfinCart); 
    if ($result_checkIfinCart->num_rows > 0)
    { 
        //update by 1
        $sql="update fik_cart set quantity=quantity+'$quantity' where object='$objectId' and userId='$session_userId'";
        if(!mysqli_query($con,$sql))
        {
        echo"err";
        }
        else{
            $donationStatus= "success";
            ?>
             <script type="text/javascript">
                    if((localStorage.getItem("addToCart")==1)||(localStorage.getItem("addToCart")=="1")){
                         window.location = "./shop.php";
                    }
                    else{
                       window.location = "./checkout.php?postRefId=<?echo $postRefId?>&itemId=<?echo $objectId?>";
                    }
                </script>
            <?
        }
        
    }
    else{
        //add 1
        $sql="insert into fik_cart (`userId`, `object`, `quantity`) values ('$session_userId', '$objectId', '$quantity')";
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }else{
            $donationStatus= "success";
            ?>
             <script type="text/javascript">
                   if((localStorage.getItem("addToCart")==1)||(localStorage.getItem("addToCart")=="1")){
                         window.location = "./shop.php";
                    }
                    else{
                       window.location = "./checkout.php?postRefId=<?echo $postRefId?>&itemId=<?echo $objectId?>";
                    }
                </script>
            <?
        }
    }

}
else{
    1;
}

//shop items
if($_GET['item']){
    $item = $_GET['item'];
    $query_shopObjects= "select * from fik_shopItems where id='$item'"; 
    $result_shopObjects = $con->query($query_shopObjects); 
}
else if($_GET['viewN']){
    $viewN = $_GET['viewN'];
    if($viewN==3){
        $query_shopObjects= "select * from fik_shopItems where id in (17, 18, 'ec617144ff2c89736719d8b636dfe78a') order by price asc limit 3"; 
        $result_shopObjects = $con->query($query_shopObjects); 
    }else{
        $query_shopObjects= "select * from fik_shopItems order by price asc limit $viewN"; 
        $result_shopObjects = $con->query($query_shopObjects); 
    }
    
}
else{
    $query_shopObjects= "select * from fik_shopItems order by price asc"; 
    $result_shopObjects = $con->query($query_shopObjects); 
}


//cart items
$query_cartItems= "select * from fik_cart c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_cartItems = $con->query($query_cartItems); 

//bucket items
$query_inventory= "select * from fik_inventory c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_inventory = $con->query($query_inventory); 

// Start function
function shorter($text, $chars_limit)
{
    // Check if length is larger than the character limit
    if (strlen($text) > $chars_limit)
    {
        // If so, cut the string at the character limit
        $new_text = substr($text, 0, $chars_limit);
        // Trim off white space
        $new_text = trim($new_text);
        // Add at end of text ...
        return $new_text . "...";
    }
    // If not just return the text as is
    else
    {
    return $text;
    }
}

?>
<!doctype html>
<html lang="en">
    <?php include_once("./phpComponents/header.php")?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<body>
    
     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="justify-content: center;">
          <div class="modal-dialog modal-dialog-centered" role="document" style="justify-content: center;">
             <form action="" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?translate("Quantity","Miktar")?>?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="container">
                            <div class="form-group">
                                <input type="text" class="custom-select quantitySelectMenu" name="itemSelect" id="itemSelect" hidden>

                            </div>
                            <div class="form-group">
                                <input class="custom-select quantitySelectMenu" name="quantitySelect" id="minQuantityBuy" type="number" min="0" value="0">
                            </div>
                            
                        </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?translate("Close","Kapat")?></button>
                    <button class="btn btn-primary" type="submit"><?translate("Buy","Sat&#305;n Al&#305;n")?></button>
                  </div>
             
                </div>
            </form>
          </div>
        </div>
        
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
            <div class="container" style="opacity: 1;border-radius: 20px;">
                <div class="banner_content text-center">
                    <h1 style="color:white;font-size:40px;"><?translate("","")?> <?if($donationStatus=="success"){echo"<div style='background-color:green;'>Purchase was Successfull!</div>";}if($donationStatus=="failed"){echo"<div style='background-color:red;'>Purchase failed!</div>";}?></h1>
                    <p style="color:white;font-size:20px;text-transform: uppercase;"><?translate("Buy items to donate to world-class ideas.","Bah&#231;&#305;vanlar&#305;n Ortaya &#199;&#305;kard&#305;&#287;&#305; &#220;r&#252;nler&#304; Ke&#351;fed&#304;n!")?></p>
                    <?//if($logged==0){echo '<p style="color:red;">'.translateRet("You need to signin to buy from the market.","Piyasadan Sat&#305;n Al&#305;n i&#231;in imza atman&#305;z gerekir.").'</p>';}?>
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
                <h1><?translate("","")?><?if($donationStatus=="success"){echo"<div style='color:green;'>Purchase was Successfull!</div>";}if($donationStatus=="failed"){echo"<div style='color:red;'>Purchase failed!</div>";}?></h1>
                <p><?translate("Buy items to donate to world-class ideas.","Bah&ccedil;&#305;vanlar&#305;n Ortaya &Ccedil;&#305;kard&#305;&#287;&#305; &Uuml;r&uuml;nleri Ke&#351;fedin ve Sat&#305;n Al&#305;n!")?></p>
                 <?//if($logged==0){echo '<p style="color:red;">'.translateRet("You need to signin to buy from the market.","Piyasadan Sat&#305;n Al&#305;n i&#231;in imza atman&#305;z gerekir.").'</p>';}?>
                <!--<p style="background-color:orange;color:white;display:none;" id="errMessage"><?translate("You need to signin to buy from the market.","Piyasadan Sat&#305;n Al&#305;n i&#231;in imza atman&#305;z gerekir.")?></p>-->
            </div>
            <style>
                
                #post .btn{
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  border: 1px solid #FF8333;
                  color: #FF8333;
                }
                .post-wrap img{
                  object-fit: cover;
                  width: 100%;
                }
                #post .btn:hover{
                  background: #FF8333;
                  color: #fff;
                }
                .post-wrap{
                  width: 100%;
                  height: auto;
                  background: #fff;
                  max-width: 900px;
                  margin-bottom: 50px!important;
                }
                /*__________________________________
                        Responsive
                ____________________________________*/
                @media screen and (max-width: 768px){
                  #post .btn{
                    position: relative;
                    margin-bottom: 10px;
                    top: 0;
                    left: 0;
                    transform: translate(0,0);
                  }
                  .post-wrap p{padding: 10px;}
                }
                
                .space{height: 100px;}

                .swal2-popup{
            padding:0px;
        }
        .swal2-image{
            margin:0px;
        }
        .swal2-actions{
            margin-top:-60px;
        }
        @media only screen and (max-width: 600px) {
          .swal2-actions{
            margin-top:-40px;
        }
        }

            </style>
            
            <div class="container" id="post">

            <?if(true){?>
                <div class="row">
                    <div class="col-lg-12">
                        
                       <a class="d-flex justify-content-between">
                                                    <p>
                                                       <a href="https://api.parasut.com/oauth/authorize?client_id=a943fd2bdf41bdfba31be3436a5a093d029c34e3c7d05aec46148913770b6fe2&redirect_uri=https://projects.anomoz.com/sealife/loginSuc.php&response_type=code">
                                                       <button type="submit" class="btn btn-primary" id="sendNewSms" >
                                                                    <?translate("","")?>Pay
                                                                </button></a>
                                                    </p>
                                                </a>

				    </div>
				<?if($logged==1){?>
    				<div class="col-lg-4">
                            <div class="blog_right_sidebar">
                                <?php include_once("./phpComponents/cartWidget.php")?>
                            </div>
                    </div>
                <?}?>
			</div>
			<?}?>
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
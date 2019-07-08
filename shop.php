<?include_once("global.php");?>
    <?

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
                    window.location = "./checkout.php";
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
                    window.location = "./checkout.php";
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
    
}else{
    $query_shopObjects= "select * from fik_shopItems order by price asc"; 
    $result_shopObjects = $con->query($query_shopObjects); 
}


//cart items
$query_cartItems= "select * from fik_cart c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_cartItems = $con->query($query_cartItems); 

//bucket items
$query_inventory= "select * from fik_inventory c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_inventory = $con->query($query_inventory); 

?>
<!doctype html>
<html lang="en">
    <?php include_once("./phpComponents/header.php")?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<body>
    
     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
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
                    <h1 style="color:white;font-size:40px;"><?translate("FARM","MANAV")?> <?if($donationStatus=="success"){echo"<div style='background-color:green;'>Purchase was Successfull!</div>";}if($donationStatus=="failed"){echo"<div style='background-color:red;'>Purchase failed!</div>";}?></h1>
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
                <h1><?translate("Shop","Manav")?><?if($donationStatus=="success"){echo"<div style='color:green;'>Purchase was Successfull!</div>";}if($donationStatus=="failed"){echo"<div style='color:red;'>Purchase failed!</div>";}?></h1>
                <p><?translate("Buy items to donate to world-class ideas.","Bah&ccedil;&#305;vanlar&#305;n Ortaya &Ccedil;&#305;kard&#305;&#287;&#305; &Uuml;r&uuml;nleri Ke&#351;fedin ve Sat&#305;n Al&#305;n!")?></p>
                 <?//if($logged==0){echo '<p style="color:red;">'.translateRet("You need to signin to buy from the market.","Piyasadan Sat&#305;n Al&#305;n i&#231;in imza atman&#305;z gerekir.").'</p>';}?>
                <!--<p style="background-color:orange;color:white;display:none;" id="errMessage"><?translate("You need to signin to buy from the market.","Piyasadan Sat&#305;n Al&#305;n i&#231;in imza atman&#305;z gerekir.")?></p>-->
            </div>

            <?if($logged==1){?>
                <div class="row">
                <div class="col-lg-8 posts-list">
                    
			    <?
			        $i=0;
                    if ($result_shopObjects->num_rows > 0)
                    { 
                        while($row = $result_shopObjects->fetch_assoc()) 
                        { 
                            if($i%3==0){echo '<div class="row">';};
                            ?>
                            
				            <div class="col-sm-4">
            					<div class="card">
            						<div class="card-body">
            							<figure>
            								<img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $row['image']?>"  alt="<?echo $row['name']?>">
            							</figure>
            							<div class="card_inner_body" style="padding: 5px 5px;">

            								<h4 class="card-title"><?echo $row['name']?> - <?if(substr($row['price'],-2)=="00"){echo substr($row['price'],0,-3);}else{echo $row['price'];}?> &#8378; </h4>
            								<p class="card-text">
            									<?echo $row['description']?>
            								</p>
            								
            								<div class="d-flex justify-content-between donation align-items-center">
            								    <!--
            								    <a href="./shopItem.php?id=<?echo $row['id']?>" style="float: left;">
                                                    <button type="button" class="btn btn-primary primary_btn rounded" style="background-color:orange;">
                                                        <?translate("About","&Uuml;r&uuml;n&uuml; &#304;nceley&#304;n")?>
                                                    </button>
                                                </a>
                                                -->
                                                
                                                </div>
                                                <div class="d-flex justify-content-between donation align-items-center" style="margin-top:20px;text-align:center;"  >
                                                <?
                                                $minAmount = ceil(1/$row['price']);
                                                ?>
            									<button style="margin: 0 auto;" type="button" class="btn btn-primary primary_btn rounded" <?if($logged==1){echo 'data-toggle="modal"';}?> data-minamount="<?echo $minAmount?>" data-whatever="<?echo $row['id']?>" data-target="#exampleModalCenter">
                                                    <?translate("Buy","Sat&#305;n Al&#305;n")?>
                                                </button>
                                                
                                                
            								</div>
            								
            							</div>
            						</div>
            					</div>
            				</div>
				            
				            <?
				            $i =$i+1;
				            if($i%3==0){echo '</div>';};
				            
                        }
                    }
                    if($i%3!=0){echo '</div>';};
				?>
				
				</div>
				
				
				<?if($logged==1){?>
    				<div class="col-lg-4">
                            <div class="blog_right_sidebar">
                                <?php include_once("./phpComponents/cartWidget.php")?>
                            </div>
                    </div>
                <?}?>
			</div>
			<?}else{?>
			<div class="row">

			    <?
			        $i=0;
                    if ($result_shopObjects->num_rows > 0)
                    { 
                        while($row = $result_shopObjects->fetch_assoc()) 
                        { 
                            ?>
                            
				            <div class="col-lg-3 col-md-6">
            					<div class="card">
            						<div class="card-body">
            							<figure>
            								<img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $row['image']?>"  alt="<?echo $row['name']?>">
            							</figure>
            							<div class="card_inner_body" style="padding: 5px 5px;">
            								<h4 class="card-title"><?echo $row['name']?> -  <?if(substr($row['price'],-2)=="00"){echo substr($row['price'],0,-3);}else{echo $row['price'];}?> &#8378; </h4>
            								<p class="card-text">
            									<?echo $row['description']?>
            								</p>
            								
            								<div class="d-flex justify-content-between donation align-items-center" style="text-align:center;">
            								    <!--
            								    <a href="./shopItem.php?id=<?echo $row['id']?>" style="float: left;">
                                                    <button type="button" class="btn btn-primary primary_btn rounded" style="background-color:orange;">
                                                        <?translate("About","&Uuml;r&uuml;n&uuml; &#304;nceley&#304;n")?>
                                                    </button>
                                                </a>
                                                -->
                                                
                                                </div>
                                                <div class="d-flex justify-content-between donation align-items-center" style="margin-top:20px;">
            									<button onclick="showError()" style="margin: 0 auto;" type="button" class="btn btn-primary primary_btn rounded" <?if($logged==1){echo 'data-toggle="modal"';}?> data-whatever="<?echo $row['id']?>" data-target="#exampleModalCenter">
                                                    <?translate("Buy","Sat&#305;n Al&#305;n")?>
                                                </button>
                                                <script>
                                                    function showError(){
                                                        //var obtainedErrorObjectToDisplayMessageOnToTellUserToSignin = document.getElementById('errMessage');
                                                        //obtainedErrorObjectToDisplayMessageOnToTellUserToSignin.style.display = "block";
                                                        Swal.fire({
                                                          title: 'Merhaba :)',
                                                          html: '<?translate("You need to signin to buy from the market.","Sat&#305;n Almak &#304;&ccedil;in Giri&#351; Yapman&#305;z Gerekmektedir!")?>',
                                                            confirmButtonText: "G&#304;R&#304;&#350; YAP",
                                                            
                                                        }).then(function() {
                                                            // Redirect the user
                                                            window.open(
                                                              "./signup.php"
                                                            );
                                                            //console.log('The Ok Button was clicked.');
                                                            });

                                                    }
                                                </script>
                                                
            								</div>
            								
            							</div>
            						</div>
            					</div>
            				</div>
				            
				            <?

                        }
                    }
				?>
				

				
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
        <script>
            
        </script>
        <script>
            $('#exampleModalCenter').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('whatever') // Extract info from data-* attributes
              var minamountFetch = button.data('minamount') // Extract info from data-* attributes
              
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)
              //console.log("object"+recipient+minamountFetch);
              modal.find('.modal-body #itemSelect').val(recipient)
              $("#minQuantityBuy").attr({
               "min" : minamountFetch,          // values (or variables) here
                "value" : minamountFetch          // values (or variables) here
            });
            
            })
        </script>
    </body>
</html>
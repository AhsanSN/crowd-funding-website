<?include_once("global.php");?>
    <?

if(isset($_POST['itemSelect'])&&isset($_POST['quantitySelect'])){
    
    $donationStatus= "failed";
    $objectId = ($_POST['itemSelect']);
    $quantity = ($_POST['quantitySelect']);
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
        }
    }

}
else{
    1;
}

//recent posts
$query_recentPosts= "select * from fik_posts order by views desc limit 4"; 
$result_recentPosts = $con->query($query_recentPosts); 

//shop items
$query_shopObjects= "select * from fik_shopItems order by id desc"; 
$result_shopObjects = $con->query($query_shopObjects); 

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
<body>
    
     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
             <form action="" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Quantity?</h5>
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
                                <input class="custom-select quantitySelectMenu" name="quantitySelect" type="number">
                            </div>
                            
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Buy</button>
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
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Shop <?if($donationStatus=="success"){echo"<div style='background-color:green;'>Purchase was Successfull!</div>";}if($donationStatus=="failed"){echo"<div style='background-color:red;'>Purchase failed!</div>";}?></h2>
                    <p>Buy items to donate to world-class ideas.</p>
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
                <h2>Shop<?if($donationStatus=="success"){echo"<div style='color:green;'>Purchase was Successfull!</div>";}if($donationStatus=="failed"){echo"<div style='color:red;'>Purchase failed!</div>";}?></h2>
                <p>Buy items to donate to world-class ideas.</p>
            </div>

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
            							<div class="card_inner_body">
            								<h4 class="card-title"><?echo $row['name']?> - $<?echo $row['price']?></h4>
            								<p class="card-text">
            									<?echo $row['description']?>
            								</p>
            								
            								<div class="d-flex justify-content-between donation align-items-center">
            									<button type="button" class="btn btn-primary primary_btn rounded" data-toggle="modal" data-whatever="<?echo $row['id']?>" data-target="#exampleModalCenter">
                                                    Buy
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
				
				
				
				<div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <?php include_once("./phpComponents/cartWidget.php")?>
                        </div>
                    </div>
                    
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
        
        <script>
            $('#exampleModalCenter').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('whatever') // Extract info from data-* attributes
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)
              console.log("object"+recipient);
              modal.find('.modal-body #itemSelect').val(recipient)
            })
        </script>
    </body>
</html>
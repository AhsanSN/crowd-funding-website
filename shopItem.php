<?include_once("global.php");?>
    <?


if(isset($_POST['itemSelect'])&&isset($_POST['quantitySelect'])&&isset($_GET['id'])){
    
    $donationStatus= "failed";
    $objectId = ($_GET['id']);//($_POST['itemSelect']);
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


$noPageFound = true;


if(isset($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);


    $query_selectedPost= "
select * from fik_shopItems where id='$id'"; 
    $result_selectedPost = $con->query($query_selectedPost); 
    if ($result_selectedPost->num_rows > 0)
    { 
        while($row = $result_selectedPost->fetch_assoc()) 
        { 
            $name = $row['name'];
            $description = $row['description'];
            $image = $row['image'];
            $longDescription = $row['longDescription'];
         
            $noPageFound = false;
        }
        if($donations == null){
            $donations = 0;
        }
        

    }

    $query_postCommentsNumber= "select count(*) as nComments from fik_postComments p where p.postId='$id'"; //for now
    $result_postCommentsNumber = $con->query($query_postCommentsNumber);
    if ($result_postCommentsNumber->num_rows > 0)
    { 
        while($row = $result_postCommentsNumber->fetch_assoc()) 
        { 
            $nComments = $row['nComments'];
        }
    }
    
}
else{
    1;
}

//posting new comment
if(isset($_POST["new_comment"]))
{
    $comment = htmlspecialchars($_POST["new_comment"]);
    $id = $_POST['postId'];
    $datePosted = time();
    $sql="insert into fik_postComments (`postId`, `userId`, `comment`, `datePosted`) values ('$id', '$session_userId', '$comment', '$datePosted')";
    if(!mysqli_query($con,$sql))
    {
        echo "err";
    }
    ?>
    <script>console.log("hi")</script>
    <?
}


//recent posts
$query_recentPosts= "select * from fik_posts order by views desc limit 4"; 
$result_recentPosts = $con->query($query_recentPosts); 

//cart items
$query_cartItems= "select * from fik_cart c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_cartItems = $con->query($query_cartItems); 

//bucket items
$query_inventory= "select * from fik_inventory c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_inventory = $con->query($query_inventory);

//bucket items for donating from 1 click
$query_inventoryClickDonation= "select * from fik_inventory c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_inventoryClickDonation = $con->query($query_inventoryClickDonation);

//bucket items for donation from modal
$query_inventoryForDonation= "select * from fik_inventory c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_inventoryForDonation = $con->query($query_inventoryForDonation);

//add views
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ip = get_client_ip();
$query_checkIp= "select * from fik_views where postId='$id' and ip='$ip' and class='post'"; 
$result_checkIp = $con->query($query_checkIp);
if ($result_checkIp->num_rows > 0)
{ 
    //do nothing;
}
else{
    $sql="insert into fik_views (`postId`, `ip`, `class`) values ('$id', '$ip', 'post')";
    if(!mysqli_query($con,$sql))
    {
        echo "err";
    }
    //update count
    $sql="update fik_posts set views=views+1 where id='$id'";
    if(!mysqli_query($con,$sql))
    {
        echo "err";
    }
}


?>
<!doctype html>
<html lang="en">
     <?php include_once("./phpComponents/header.php")?>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <!—- ShareThis BEGIN -—>
<script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5d0a4c705b432800123988e3&product=sticky-share-buttons"></script>
<style>
        .progress{
            margin-bottom:-10px;
            height:15px;
            border-radius: 0px;
        }
        .progress-bar{
            background-color:#54a829;
        }
    </style>
<!—- ShareThis END -—>
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
                                <input class="custom-select quantitySelectMenu" name="quantitySelect" type="number" value="3">
                            </div>
                            
                        </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?translate("Close","Kapat")?></button>
                    <button class="btn btn-primary" type="submit"><?translate("Buy","sat&#305;n almak")?></button>
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
                    background: rgba(0, 0, 0, 0) url("./img/manavbanner(3).jpg") no-repeat scroll center center;position: absolute;
                }
                </style>
                <div class="overlay bg-parallax" id='backImg' data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container" style="opacity: .8;border-radius: 20px;">
                    <div class="banner_content text-center">
                        <h2><?echo $name?> <?if($noPageFound){echo "No page Found!";}?></h2>
                        <p><?echo $description?></p>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12">
                                									
                            </div>
                            <?
                            if(!$noPageFound){
                                ?>
                                <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    <?if($logged==0){echo '<p style="color:red;">'.translateRet("Signup required to donate.","Ba&#287;&#305;&#351; yapmak i&#231;in kay&#305;t olman&#305;z gerekiyor.").'</p>';}?>
                                    
                                    <div class="col-lg-7">
                                        
                                        <button style="padding-left: 32px;padding-right: 32px;" type="button" class="btn btn-primary primary_btn rounded" <?if($logged==1){echo 'data-toggle="modal"';}?>  data-target="#exampleModalCenter">
                                          <?translate("Buy","sat&#305;n almak")?>
                                        </button>
                                        
                                        
                    				</div>
                    				
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details" >
                                <?
            							    if(substr($image,-3)=="mp4"){
                                            ?>
                                            <video class="videoImg card-img-top img-fluid" controls loop autoplay>
                                              <source src="./uploads/postImages/<?echo $image?>" type="video/mp4">
                                            </video>
                                            <?}else{?>
                                            
                                            <img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $image?>" alt="">
                                            <?}?>
                                            <?
            							$percentageCollected = round((intval(($donations/($goal+1))*100)), 2);
            							if(intval($percentageCollected)>100){
            							    $percentageCollected=100;
            							}
            							?>
            							
                                <h2><?echo $title?> <?if($donationStatus=="success"){echo"<div style='padding-left:20px;color:white;border-radius: 25px;background-color:green;'>".translateRet('Donation was Successfull!', 'Ba&#287;&#305;&#351; Ba&#351;ar&#305;l&#305;yd&#305;!')."</div>";}if($donationStatus=="failed"){echo"<div style='padding-left:20px;color:white;border-radius: 25px;background-color:red;'>".translateRet("Donation failed!", "Ba&#287;&#305;&#351; ba&#351;ar&#305;s&#305;z oldu!")."</div>";}?></h2>
                                <p class="excert">
                                    <?echo $excerpt?>
                                </p>
                                <p>
                                    <?echo $description?>
                                </p>
                                <p>
                                    <?echo $longDescription?>
                                </p>
                                
                            </div>
                                <?
                            }
                            ?>
                            
                            
                        </div>
                      
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            
                           
                            <?php include_once("./phpComponents/cartWidget.php")?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
        
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
        <script src="js/theme.js"></script>

    </body>
</html>
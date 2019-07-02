<?include_once("global.php");?>
    <?

$noPageFound = true;

if(isset($_POST['itemSelect'])){
    $donationStatus= "failed";
    $item = ($_POST["itemSelect"]);
    $id = ($_POST["id"]);
    $quantity = 1;//$_GET["quantitySelect"];
    $quantity =$quantity-1;
  
            
    $query_seeIfEnough= "select * from fik_inventory where userId='$session_userId' and object='$item' and quantity>'$quantity'"; 
    $result_seeIfEnough = $con->query($query_seeIfEnough);
    if ($result_seeIfEnough->num_rows > 0)
    { 
        //success
        $donationStatus= "success";
        //update
        $quantity = $quantity+1;
        $sql="update fik_inventory set quantity=quantity-'$quantity' where userId='$session_userId' and object='$item'";
        if(!mysqli_query($con,$sql))
        {
            echo "err 1";
        }
        else{
            //make donation
            $timeNow = time();
            $sql="insert into fik_contributions(`postId`, `userId`, `timeDone`, `contribution`, `quantity`) values ('$id', '$session_userId', '$timeNow', '$item', '$quantity')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 1";
            }
        }
    }
    else{
        //failed
        1;
    }
}

if(isset($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);


    $query_selectedPost= "
    select p.views, u.userImg as pImg, u.about, p.id, p.title, p.excerpt, p.goal,p.aboutMe, p.image ,p.description, p.category, p.datePosted ,COUNT(c.postId) as nContributors, sum(c.quantity*s.price) as amountEarned , u.name from fik_posts p left outer join fik_contributions c on p.id=c.postId inner join fik_users u on u.id = p.userId left outer join fik_shopItems s on s.id = c.contribution where p.id='$id' group by c.postId
    "; 
    $result_selectedPost = $con->query($query_selectedPost); 
    if ($result_selectedPost->num_rows > 0)
    { 
        while($row = $result_selectedPost->fetch_assoc()) 
        { 
            $title = $row['title'];
            $description = $row['description'];
            $image = $row['image'];
            $excerpt = $row['excerpt'];
            $category = $row['category'];
            $date = $row['datePosted'];
            $views = $row['views'];
            $goal = $row['goal'];
            $donations = $row['amountEarned'];
            $nDonors = $row['nContributors'];
            $name = $row['name'];
            $about = $row['about'];
            $personImg = $row['pImg'];
            $aboutMe= $row['aboutMe'];
            $noPageFound = false;
        }
        if($donations == null){
            $donations = 0;
        }
        
        //see if enough (making donation)
        if(isset($_GET["itemSelect"]))//&&isset($_GET["quantitySelect"]))
        {
            $donationStatus= "failed";
            $item = htmlspecialchars($_GET["itemSelect"]);
            $quantity = 1;//$_GET["quantitySelect"];
            $quantity =$quantity-1;
            $query_seeIfEnough= "select * from fik_inventory where userId='$session_userId' and object='$item' and quantity>'$quantity'"; 
            $result_seeIfEnough = $con->query($query_seeIfEnough);
            if ($result_seeIfEnough->num_rows > 0)
            { 
                //success
                $donationStatus= "success";
                //update
                $quantity = $quantity+1;
                $sql="update fik_inventory set quantity=quantity-'$quantity' where userId='$session_userId' and object='$item'";
                if(!mysqli_query($con,$sql))
                {
                    echo "err 1";
                }
                else{
                    //make donation
                    $timeNow = time();
                    $sql="insert into fik_contributions(`postId`, `userId`, `timeDone`, `contribution`, `quantity`) values ('$id', '$session_userId', '$timeNow', '$item', '$quantity')";
                    if(!mysqli_query($con,$sql))
                    {
                        echo "err 1";
                    }
                }
            }
            else{
                //failed
                1;
            }
        }
    
    }
    

    $query_postParticipants= "select * from fik_postParticipants where postId= '$id'"; 
    $result_postParticipants = $con->query($query_postParticipants); 
    
    //post comments
    $query_postComments= "select * from fik_postComments p inner join fik_users u on p.userId=u.id where p.postId='$id' order by p.id asc"; //for now
    $result_postComments = $con->query($query_postComments);
    
    $query_postCommentsNumber= "select count(*) as nComments from fik_postComments p where p.postId='$id'"; //for now
    $result_postCommentsNumber = $con->query($query_postCommentsNumber);
    if ($result_postCommentsNumber->num_rows > 0)
    { 
        while($row = $result_postCommentsNumber->fetch_assoc()) 
        { 
            $nComments = $row['nComments'];
        }
    }
    //two side posts
    $newId = $id-1;
    $query_prevPost= "select * from fik_posts where id='$newId'"; //for now
    $result_prevPost = $con->query($query_prevPost);
    if ($result_prevPost->num_rows > 0)
    { 
        while($row = $result_prevPost->fetch_assoc()) 
        { 
            $prevtitle = $row['title'];
            $prevdescription = $row['description'];
            $previd = $row['id'];
            $previmage = $row['image'];
        }
    }
    $newId = $id+1;
    $query_nextPost= "select * from fik_posts where id='$newId'"; //for now
    $result_nextPost = $con->query($query_nextPost);
    if ($result_nextPost->num_rows > 0)
    { 
        while($row = $result_nextPost->fetch_assoc()) 
        { 
            $nexttitle = $row['title'];
            $nextdescription = $row['description'];
            $nextid = $row['id'];
            $nextimage = $row['image'];
        }
    }
}
else{
    1;
}

//posting new comment
if(isset($_POST["new_comment"]))
{
    $comment = mb_htmlentities($_POST["new_comment"]);
    //$comment ="asdasd";
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

//bucket items size //testing
$noMaterial = "false";
$query_inventory_size= "select * from fik_inventory c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_inventory_size = $con->query($query_inventory_size);
if ($result_inventory_size->num_rows > 0)
{ 
    $noMaterial = "false";
}
else{
    $noMaterial = "true";
}

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
                <div class="overlay bg-parallax" id='backImg' data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container" style="background-color:purple;opacity: .8;border-radius: 20px;">
                    <div class="banner_content text-center">
                        <h2><?echo $title?> <?if($noPageFound){echo "No page Found!";}?></h2>
                        <p><?echo $excerpt?></p>
                        <a href="./shop.php"><p style="background-color:red;"><?if($noMaterial=="true"){translate("You dont have anything in your bucket to donate. Head to the market to buy material to donate. To go to the market, click this message.", "Ba&#287;&#305;&#351;&#305;n&#305;zda ba&#287;&#305;&#351; yapacak hi&ccedil;bir &#351;eyiniz yok. Ba&#287;&#305;&#351;ta bulunmak i&ccedil;in malzeme almak i&ccedil;in markete gidin. Markete gitmek i&ccedil;in bu mesaj&#305; t&#305;klay&#305;n.");}?></p></a>
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
                                    <!--
                                    <div class="col-lg-7">
                                        
                                        <button type="button" class="btn btn-primary primary_btn rounded" <?if($logged==1){echo 'data-toggle="modal"';}?>  data-target="#exampleModalCenter">
                                          <?translate("Donate","ba&#287;&#305;&#351;lamak")?>
                                        </button>
                                        
                                        
                    				</div>
                    				-->
                    				<hr>
                                    <div class="post_tag" >
                                        <a href="./allPosts.php?cat=<?echo $category?>"><?echo $category?></a>
                                    </div>
                                    <div id="donationSuccNotf" style="text-align:center;color:white;border-radius: 25px;background-color:green;display:none;">
                                        Donated!
                                    </div>
                                    <div id="donationFailNotf" style="text-align:center;color:white;border-radius: 25px;background-color:red;display:none;">
                                        Donation Failed!
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><?translate("Collected","Toplanm&#305;&#351;")?>:  &#8378; <span id="donationCollected"><?echo $donations?></span></li>
                                        <li><?translate("Need","gerek")?>:  &#8378; <?echo $goal?></li>
                                        <li><?translate("Donors","Ba&#287;&#305;&#351;&#231;&#305;lar")?>: <?echo $nDonors?></li>
                                    </ul>
                                    <hr>
                                    <ul class="blog_meta list">
                                        <li><a href="#"><?echo $name?><i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#"><?echo date('Y/m/d H:i',$date)?><i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#"><?echo $views?> <?translate("Views","G&#246;r&#252;n&#252;mler")?><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><?echo $nComments?> <?translate("Comments","Yorumlar")?><i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                    
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
            							<div class="progress" style="margin-top:5px;">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?echo $percentageCollected?>%">
                                              <?echo $percentageCollected?>% Complete
                                            </div>
                                          </div>
                                            <hr>
                                <h2><?echo $title?> <?if($donationStatus=="success"){echo"<div style='padding-left:20px;color:white;border-radius: 25px;background-color:green;'>".translateRet('Donation was Successfull!', 'Ba&#287;&#305;&#351; Ba&#351;ar&#305;l&#305;yd&#305;!')."</div>";}if($donationStatus=="failed"){echo"<div style='padding-left:20px;color:white;border-radius: 25px;background-color:red;'>".translateRet("Donation failed!", "Ba&#287;&#305;&#351; ba&#351;ar&#305;s&#305;z oldu!")."</div>";}?></h2>
                                <p class="excert">
                                    <?echo $excerpt?>
                                </p>
                                <p>
                                    <?echo $description?>
                                </p>
                                
                            </div>
                                <?
                            }
                            ?>
                            
                            
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                <?if($previd!=null){?>
                                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                                                                    <?if(substr($previmage,-3)=="mp4"){
                                            ?>
                                            <a href="./postPage.php?id=<?echo $previd?>"><img width="100" height="100" class="img-fluid" src="./uploads/postImages/videoIcon.png"alt=""></a>
                                            <?}else{?>
                                            
                                            <a href="./postPage.php?id=<?echo $previd?>"><img width="100" height="100" class="img-fluid" src="./uploads/postImages/<?echo $previmage?>"alt=""></a>
                                            <?}?>
                                            
                                        
                                    </div>
                                    <div class="arrow">
                                        <a href="./postPage.php?id=<?echo $previd?>"><span class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials">
                                        <p><?translate("Prev Post","&#246;nceki yaz&#305;")?></p>
                                        <a href="./postPage.php?id=<?echo $previd?>"><h4><?echo $prevtitle?></h4></a>
                                    </div>
                                </div>
                                
                                <?}if($nextid!=null){?>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p><?translate("Next Post","Sonraki g&#246;nderi")?></p>
                                        <a href="./postPage.php?id=<?echo $nextid?>"><h4><?echo $nexttitle?></h4></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="./postPage.php?id=<?echo $nextid?>"><span class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="thumb">
                                        <a href="./postPage.php?id=<?echo $nextid?>">
                                            <?if(substr($nextimage,-3)=="mp4"){
                                            ?>
                                            <img width="100" height="100" class="img-fluid" src="./uploads/postImages/videoIcon.png" class="img-fluid" src="img/blog/next.jpg" alt="">
                                            <?}else{?>
                                            
                                            <img width="100" height="100" class="img-fluid" src="./uploads/postImages/<?echo $nextimage?>" class="img-fluid" src="img/blog/next.jpg" alt="">
                                            <?}?>
                                            
                                            
                                            </a>
                                    </div>										
                                </div>
                                <?}?>
                            </div>
                        </div>
                        <?
                            if(!$noPageFound){
                                ?>
                        <div class="comments-area" id="commentArea">
                            <h4><?echo $nComments?> <?translate("Comments","Yorumlar")?> </h4>
                            
                            <?
                                if ($result_postComments->num_rows > 0)
                                { 
                                    while($row = $result_postComments->fetch_assoc()) 
                                    { 
                                    ?>
                                      <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img width="70" height="70" src="./uploads/postImages/<?echo $row['userImg']?>" alt="">
                                                </div>
                                                <div class="desc">
                                                    <h5><a href="#"><?echo $row['name']?></a></h5>
                                                    <p class="date"><?echo date('d/m/Y H:i', $row['datePosted']);?></p>
                                                    <p class="comment">
                                                        <?echo $row['comment']?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      <?
                                    }
                                }
                              ?>
                            	                                             				
                        </div>
                        <?if($logged==1){?>
                        <div class="comment-form">
                            <h4><?translate("Leave a Comment","Yorum yap")?></h4>
                            <form method="get" id="formComment">
                                <input name="postId" hidden value="<?echo $id?>">
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="new_comment" id="new_comment" placeholder="<?translate("Type your comment here.","Yorumunuzu buraya yaz&#305;n.")?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type your comment here.'" required=""></textarea>
                                </div>
                                <button href="#" class="primary-btn primary_btn"><?translate("Post Comment","Yorum g&#246;nder")?></button>	
                            </form>
                        </div>
                        <?}?>
                        <?}?>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <?
                            if(!$noPageFound){
                                ?>
                            <aside class="single_sidebar_widget author_widget">
                                <img width="100" height="100" class="author_img rounded-circle" src="./uploads/postImages/<?echo $personImg?>" alt="">
                                <h4><?echo $name?></h4>
                                <p><?echo $about?></p>
                                <p><?echo $aboutMe?></p>
                            </aside>
                            <hr>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title"><?translate("Donate","ba&#287;&#305;&#351;lamak")?></h4>
                                <ul class="list cat-list">
                                    <style>
                                        #new_donation{
                                            -webkit-box-flex: 1;
                                            display: block;
                                            border:1px solid green;
                                            width:100%;
                                            -webkit-appearance: none;
                                            -webkit-border-radius: 0px;
                                            background-color: transparent;
                                            text-align: center;
                                        }
                                    </style>
                                    <form method="get" id="formDonation">
                                    <?
                                    $myArr = array();

                                    
                                    ?>
                                    <?
                                    $fakeId=0;
                                    if ($result_inventoryClickDonation->num_rows > 0)
                                    { 
                                        while($row = $result_inventoryClickDonation->fetch_assoc()) 
                                        { 
                                            if($row['quantity']>0){
                                                array_push($myArr, [$row['id'], $row['quantity'], $fakeId])
                                        ?>
                                            <li>
                                                
                                                <div style="background-color:#e2ffe2;">
                                                    <div onclick="donateFunction('<?echo $row['price']?>','<?echo $row['id']?>', '<?echo $row['quantity']?>', '<?echo $fakeId?>')"><!--name="new_donation" id="new_donation" value=""-->
                                                        <div class="d-flex justify-content-between" >
                                                            <img height="50" width="50" style="margin-top:3px;" src="./uploads/postImages/<?echo $row['image']?>">
                                                            <p style="margin-top:15px;"><?echo $row['name']?> x 1</p>
                                                            <p>
                                                            
                                                            </p>
                                                        </div>
                                                    </div>	
                                                </div>
                                                
                                            </li>
                                        <?
                                            $fakeId+=1;
                                            }
                                        }
                                    }
                                    
                                    $myJSON = json_encode($myArr);
                                    ?>
                                    <script>
                                    var json = <?php  echo $myJSON; ?>;
                                    
                                        function donateFunction(price, productId, quantityStocked, fakeIdinp){
                                            
                                            var http = new XMLHttpRequest();
                                            http.open("POST", "postPage.php", true);
                                            http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                                            var params = "id=<?echo $id;?>&itemSelect=" + productId; // probably use document.getElementById(...).value
                                            http.send(params);
                                            //console.log("--", fakeIdinp);
                                            
                                            if(json[fakeIdinp][1]>0){
                                                 document.getElementById("donationCollected").innerHTML = parseInt(document.getElementById("donationCollected").innerHTML) + parseInt(price);
                                                document.getElementById("donationSuccNotf").style.display = "block";
                                                document.getElementById("donationFailNotf").style.display = "none";
                                                json[fakeIdinp][1] -=1;
                                            }
                                            else{
                                                document.getElementById("donationSuccNotf").style.display = "none";
                                                document.getElementById("donationFailNotf").style.display = "block";
                                            }
                                           
                                            
                                        }
                                    </script>
                                    
                                    </form>															
                                </ul>
                            </aside>
                            <?}?>
                            
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
        <script>
        	$(function () {
        	    //for commenting
                $('#formComment').on('submit', function (e) {
                  e.preventDefault();
                  $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: 'postPage.php',
                    data: $('form').serialize(),
                    success: function () {
                        //$('#comment').val('');
                    }
                  });
                  var a=$("#new_comment").val();
                  var b=new Date().toLocaleString();
                    if (a!=''){
            			var txt1 = '<div class="comment-list"><div class="single-comment justify-content-between d-flex"><div class="user justify-content-between d-flex"><div class="thumb"><img width="70" height="70" src="./uploads/postImages/<?echo $session_image?>" alt=""></div><div class="desc"><h5><a href="#"><?echo $session_name?></a></h5><p class="date">'+b+'</p><p class="comment">'+a+'</p></div></div></div></div>';
                        $("#commentArea").append(txt1);     // Append new elements
                    }
                      $('#new_comment').val('');
                  
                  
                });
              });
    
        </script>
        <script>
            //for donation
            /**
            var div = document.getElementById('quantitySelectMenu');
            $('#itemSelect').on('change', function() {
              var item = this.value;

              for(var i=0; i<12; i++){
                  var txt1 = '<option value="'+i+'"><?echo $i?></option>'
                  div.innerHTML += txt1;
              }
              
            });
            **/
            
           
        </script>
    </body>
</html>
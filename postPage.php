<?include_once("global.php");?>
<?

$noPageFound = true;
require 'Mobile_Detect.php';
$detect = new Mobile_Detect();

//donation through chedckout
if(isset($_GET['postRefId'])&&isset($_GET['itemId'])){
    if($_GET['postRefId']==$_GET['id']){
        $itemId = $_GET['itemId'];
        $id = $_GET['id'];
        //donate now
        $query_seeIfEnough= "select * from fik_inventory where userId='$session_userId' and object='$itemId' and quantity>'0'"; 
            $result_seeIfEnough = $con->query($query_seeIfEnough);
            if ($result_seeIfEnough->num_rows > 0)
            { 
                //get quantity
                while($row = $result_seeIfEnough->fetch_assoc()) 
                { 
                    $quantityDonation = $row['quantity'];
                }
                //success
                $donationStatus= "success";
                //update
                $quantity = $quantityDonation;
                $sql="update fik_inventory set quantity=quantity-'$quantity' where userId='$session_userId' and object='$itemId'";
                if(!mysqli_query($con,$sql))
                {
                    echo "err 1";
                }
                else{
                    //make donation
                    $timeNow = time();
                    $sql="insert into fik_contributions(`postId`, `userId`, `timeDone`, `contribution`, `quantity`, `isAnon`) values ('$id', '$session_userId', '$timeNow', '$itemId', '$quantity', '$session_isAnon')";
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

//donation through click
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
            $sql="insert into fik_contributions(`postId`, `userId`, `timeDone`, `contribution`, `quantity`, `isAnon`) values ('$id', '$session_userId', '$timeNow', '$item', '$quantity', '$session_isAnon')";
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

//donation through rewards
if(isset($_GET['itemSelect'])){
    $donationStatus= "failed";
    $item = ($_GET["itemSelect"]);
    $id = ($_GET["id"]);
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
            $sql="insert into fik_contributions(`postId`, `userId`, `timeDone`, `contribution`, `quantity`, `isAnon`) values ('$id', '$session_userId', '$timeNow', '$item', '$quantity', '$session_isAnon')";
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
    select p.postRewardId, p.views, u.userImg as pImg, u.about, p.id, p.title, p.excerpt, p.goal,p.aboutMe, p.image ,p.description, p.category, p.datePosted ,COUNT(c.postId) as nContributors, sum(c.quantity*s.price) as amountEarned , u.name from fik_posts p left outer join fik_contributions c on p.id=c.postId inner join fik_users u on u.id = p.userId left outer join fik_shopItems s on s.id = c.contribution where p.id='$id' group by c.postId
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
            $postRewardId= $row['postRewardId'];
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
                    $sql="insert into fik_contributions(`postId`, `userId`, `timeDone`, `contribution`, `quantity`, `isAnon`) values ('$id', '$session_userId', '$timeNow', '$item', '$quantity', '$session_isAnon')";
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
    

    $query_postParticipants= "select (IF(c.isAnon,'Anonymous', (u.name)))as 'name', s.name as itemName , s.image as itemImg, IF(c.isAnon,'profilePic.png',  u.userImg) as 'userImg' from fik_contributions c INNER join fik_users u on c.userId=u.id inner join fik_shopItems s on s.id=c.contribution where postId= '$id' order by c.id desc"; 
    $result_postParticipants = $con->query($query_postParticipants);
    
    $query_rewards= "select * from fik_rewards r inner join fik_shopItems s on r.object=s.id where postRewardId= '$postRewardId' order by s.price asc"; 
    $result_rewards = $con->query($query_rewards);
    
    $query_reward0= "select * from fik_rewards r where object='item0' and postRewardId= '$postRewardId'"; 
    $result_reward0 = $con->query($query_reward0);
    if ($result_reward0->num_rows > 0)
    { 
        while($row = $result_reward0->fetch_assoc()) 
        { 
            $reward0_reward = $row['reward'];
            $reward0_deliveryTime = $row['deliveryTime'];
        }
    }
    
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

//rewards - bucket items for donating from 1 click
$rewardsInbucket = array();
$query_inventoryClickDonation_Rewards= "select * from fik_inventory c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_inventoryClickDonation_Rewards = $con->query($query_inventoryClickDonation_Rewards);
if ($result_inventoryClickDonation_Rewards->num_rows > 0)
{ 
    while($row = $result_inventoryClickDonation_Rewards->fetch_assoc()) 
    { 
        if($row['quantity']>0){//if(true){
            array_push($rewardsInbucket,$row['object']);
        }
    }
}
?>
<?
//print_r($rewardsInbucket);

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
<?if($id==2){$realShopName =  'shopFikir';}else{$realShopName = 'shop';}?>

<!doctype html>
<html lang="en">
     <?php include_once("./phpComponents/header.php")?>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
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
    
    <?if($logged==0){?>
        <style>
            .swal2-popup{
            padding:0px;
        }
        .swal2-image{
            margin:0px;
        }
        .swal2-actions{
            margin-top:-60px;
        }
        </style>
    <?}?>
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
                <div class="container" style="opacity: 1;border-radius: 20px;">
                    <div class="banner_content text-center">
                        <h2><?echo $title?> <?if($noPageFound){echo "No page Found!";}?></h2>
                        <p><?echo $excerpt?></p>
                        <a href="./shop.php"><p style="background-color:red;"><?if($noMaterial=="true"){translate("You dont have anything in your bucket to donate. Head to the market to buy material to donate. To go to the market, click this message.", "Saksınızda herhangi bir destek materyali bulunmamaktadır. Saksınıza destek materyali eklemek için Manav sayfasına gidiniz.");}?></p></a>
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
                                    <?if($logged==0){echo '<p style="color:red;">'.translateRet("Signup required to donate.","Destek olmak i&#231;in kay&#305;t olman&#305;z gerekmektedir.").'</p>';}?>
                                    <!--
                                    <div class="col-lg-7">
                                        
                                        <button type="button" class="btn btn-primary primary_btn rounded" <?if($logged==1){echo 'data-toggle="modal"';}?>  data-target="#exampleModalCenter">
                                          <?translate("Donate","Destekle")?>
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
                                        <li><?translate("Collected","Toplanan;")?>:  &#8378; <span id="donationCollected"><?echo $donations?></span></li>
                                        <li><?translate("Need","Hedef")?>:  &#8378; <?echo $goal?></li>
                                        <li><?translate("Donors","Destekçiler")?>: <?echo $nDonors?></li>
                                    </ul>
                                    <hr>
                                    <ul class="blog_meta list">
                                        <li><a href="#"><?echo $name?><i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#"><?echo date('Y/m/d H:i',$date)?><i class="lnr lnr-calendar-full"></i></a></li>
                                        <?
                                        if( (round(((($date+7776000)-time())/86400),1))>0){
                                            $timeLeft =(round(((($date+7776000)-time())/86400),1));
                                        }else{
                                            $timeLeft = 0;
                                        }
                                         
                                        ?>
                                        <li><a href="#"><?echo $timeLeft?>Kalan Gün<i class="lnr lnr-clock"></i></a></li>
                                        <li><a href="#"><?echo $views?> <?translate("Views","Görüntülemeler")?><i class="lnr lnr-eye"></i></a></li>
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
                                <style>
                                     .progress-table{
                                         min-width: 100px;
                                     }
                                 </style>
                                
                                <?
                                if(!$detect->isMobile()){
                                ?>
                                <?
                                if ($result_postParticipants->num_rows > 0)
                                { 
                                    ?>
                                    <hr>
                                <h4><?translate("Contributors", "Destekçiler")?></h4>
                                <div class="progress-table">
                                
                                <div class="table-head">
                                	<div class="country" style="margin-left:10px;"><?translate("Pic","Fotoğraf")?></div>
                                	<div class="country" style="margin-left:10px;"><?translate("Isim","İsim")?></div>
                                	<div class="country" style="margin-left:10px;"><?translate("Item","Destek")?></div>
                                	<div class="country" style="margin-left:10px;"><?translate("","")?></div>
                                </div>
                                    <?
                                    while($row = $result_postParticipants->fetch_assoc()) 
                                    { 
                                	?>
                                	    <div class="table-row">
                                			<div class="country" style="margin-left:10px;">
                                			    <img  style="height:70px; width:70px;border-radius:50%;"  src="./uploads/postImages/<?echo $row['userImg']?>" alt="flag">
                                			</div>
                                			<div class="country" style="margin-left:10px;"><?echo $row['name']?></div>
                                			<div class="country" style="margin-left:10px;"><?echo $row['itemName']?></div>
                                			<div class="country" style="margin-left:10px;">
                                			    <img  width="70" height="50"  src="./uploads/postImages/<?echo $row['itemImg']?>" alt="flag">
                                			</div>
                                		</div>
                                	<?
                                    }
                                    ?></div>
                                    <?
                                }
                                ?>
                                <?}?>
                                
                                
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
                                        <p><?translate("Prev Post","Önceki Proje")?></p>
                                        <a href="./postPage.php?id=<?echo $previd?>"><h4><?echo $prevtitle?></h4></a>
                                    </div>
                                </div>
                                
                                <?}if($nextid!=null){?>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p><?translate("Next Post","Sonraki Proje")?></p>
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
                        if(!$detect->isMobile()){
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
                                    <textarea class="mb-10" style="width:100%" rows="5" name="new_comment" id="new_comment" placeholder="<?translate("Type your comment here.","Yorumunuzu buraya yazınız.")?>" required=""></textarea>
                                </div>
                                <button href="#" class="primary-btn primary_btn"><?translate("Post Comment","Yorumu Gönder")?></button>	
                            </form>
                        </div>
                        <?}?>
                        <?}}?>

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
                                <h4 class="widget_title"><?translate("Rewards","Ödüller")?></h4>
                                    <?
                                    $myArr = array();
                                    
                                    
                                    ?>
                                    <style>
                                         /* Three image containers (use 25% for four, and 50% for two, etc) */
                                        .column {
                                          float: left;
                                          width: 27.33%;
                                          padding: 5px;
                                          margin:3px;
                                          text-align:center;
                                           border-radius: 25px;
                                           border: 3px solid #60bc0f !important;
                                        }
                                        
                                        /* Clear floats after image containers */
                                        .row::after {
                                          content: "";
                                          clear: both;
                                          display: table;
                                          text-align:center;
                                        } 
                                        
                                        .myBtn{
                                            color:white;background-color:#60bc0f;font-size:12px;padding:4px;margin-bottom:54px;border-radius: 3px;
                                            cursor: pointer; 
                                        }
                                    </style>
                                    <a <?if($logged==1){?>href="./shop.php"<?}?>>
                                        <div class="" style="background-color:#c4ffc4;text-align:center;" <?if($logged==0){echo "onclick='showError()'";}?>>
                                            <div class="media-body" style="margin:1px;">
                                                <br>
                                                 <a <?if($logged==1){?>href="./shop.php"<?}?>><h6>If you donate us these, we will thank you.</h6></a>
                                                <p><?echo $row['deliveryTime']?></p>
                                                
                                                <?
                                                if($id!=2){
                                                    ?>
                                                    
                                                    <div class="row" style="justify-content: center;" >
                                                        
                                                        <?if (!in_array('883caebaa0b94407e089f4c8f0406c9f', $rewardsInbucket)) {?>
                                                            <a <?if($logged==1){?>href="./<?echo $realShopName;?>.php?postRefId=<?echo $id?>&viewN=6"<?}?>>
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("883caebaa0b94407e089f4c8f0406c9f")'>
                                                        <?}?>
                                                        
                                                  <div class="column" style="">
                                                    <img src="./uploads/postImages/toprak.png" alt="Snow" style="width:100%">
                                                        
                                                        
                                                        <?if (!in_array('883caebaa0b94407e089f4c8f0406c9f', $rewardsInbucket)) {?>
                                                        

                                                            <a <? if($logged==1){echo 'href="./shop.php?postRefId='.$id.'&viewN=6"';}else{"onclick='showError()'";}?> class="myBtn" style="color:white;">
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("883caebaa0b94407e089f4c8f0406c9f")' class="myBtn" style="color:white;">
                                                        <?}?>
                                                        
                                                    
                                                        <?translate("Donate","DESTEKLE")?>
                                                    </a>
                                                    <br>

                                                  </div>
                                                  </a>
                                                   <?if (!in_array('14', $rewardsInbucket)) {?>
                                                            <a <?if($logged==1){?>href="./shop.php?postRefId=<?echo $id?>&viewN=6"<?}?>>
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("14")'>
                                                        <?}?>
                                                        
                                                  <div class="column" style="">
                                                    <img src="./uploads/postImages/tohum.png" alt="Snow" style="width:100%">
                                                    <?if (!in_array('14', $rewardsInbucket)) {?>
                                                            <a <? if($logged==1){echo 'href="./shop.php?postRefId='.$id.'&viewN=6"';}else{"onclick='showError()'";}?> class="myBtn" style="color:white;">
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("14")' class="myBtn" style="color:white;">
                                                        <?}?>
                                                        <?translate("Donate","DESTEKLE")?>
                                                    </a>
                                                    <br>

                                                  </div>
                                                  </a>
                                                  
                                                   <?if (!in_array('16', $rewardsInbucket)) {?>
                                                            <a <?if($logged==1){?>href="./shop.php?postRefId=<?echo $id?>&viewN=6"<?}?>>
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("16")'>
                                                        <?}?>
                                                        
                                                  <div class="column" style="">
                                                    <img src="./uploads/postImages/sudamlasi.png" alt="Snow" style="width:100%">
                                                     <?if (!in_array('16', $rewardsInbucket)) {?>
                                                            <a <? if($logged==1){echo 'href="./shop.php?postRefId='.$id.'&viewN=6"';}else{"onclick='showError()'";}?> class="myBtn" style="color:white;">
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("16")' class="myBtn" style="color:white;">
                                                        <?}?>
                                                        
                                                        <?translate("Donate","DESTEKLE")?>
                                                    </a>
                                                    <br>

                                                  </div>
                                                  </a>
                                                 
                                                </div> 
                                                

                                                 <br>
                                                    <?
                                                }
                                                ?>
                                                 
                                                 <a <?if($logged==1){?>href="./<?echo $realShopName?>.php"<?}?>>
                                                 <div class="row" style="justify-content: center;">
                                                  <div class="column" style="">
                                                      
                                                      <!--
                                                      
                                                      shop = if($id==2){echo 'shopFikir';}else{echo 'shop';}
                                                      -->
                                                      
                                            
                                                      
                                                      <?if (!in_array('17', $rewardsInbucket)) {?>
                                                            <a <?if($logged==1){?>href="./<?if($id==2){echo 'shopFikir';}else{echo 'shop';}?>.php?postRefId=<?echo $id?>&item=17"<?}?>>
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("17")'>
                                                        <?}?>
                                                        
                                                    <img src="./uploads/postImages/cicek.png" alt="Snow" style="width:100%">
                                                    </a>
                                                    <?if (!in_array('17', $rewardsInbucket)) {?>
                                                            <?
                                                            if($id==2){$viewNTemp =  '3';}else{$viewNTemp =  '6';}
                                                             
                                                            ?>

                                                            <a <? if($logged==1){echo 'href="./'.$realShopName.'.php?postRefId='.$id.'&item=17"';}else{"onclick='showError()'";}?> class="myBtn" style="color:white;">
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("17")' class="myBtn" style="color:white;">
                                                        <?}?>
                                                        
                                                        <?translate("Donate","DESTEKLE")?>
                                                    </a>
                                                    
                                                  </div>
                                                  <div class="column">
                                                      
                                                      <?if (!in_array('18', $rewardsInbucket)) {?>
                                                            <a <?if($logged==1){?>href="./<?if($id==2){echo 'shopFikir';}else{echo 'shop';}?>.php?postRefId=<?echo $id?>&item=18"<?}?>>
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("18")'>
                                                        <?}?>
                                                        
                                                    <img src="./uploads/postImages/gul.png" alt="Forest" style="width:100%">
                                                    </a>
                                                    <?if (!in_array('18', $rewardsInbucket)) {?>
                                                    <?if($id==2){$redirectN = 3;}else{$redirectN = 6;}?>
                                                    
                                                            <a <? if($logged==1){echo 'href="./'.$realShopName.'.php?postRefId='.$id.'&item=18"';}else{"onclick='showError()'";}?> class="myBtn" style="color:white;">
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("18")' class="myBtn" style="color:white;">
                                                        <?}?>
                                                        
                                                        <?translate("Donate","DESTEKLE")?>
                                                    </a>
                                                  </div>
                                                  <div class="column" >
                                                      
                                                          <?if (!in_array('ec617144ff2c89736719d8b636dfe78a', $rewardsInbucket)) {?>
                                                            <a <?if($logged==1){?>href="./<?if($id==2){echo 'shopFikir';}else{echo 'shop';}?>.php?postRefId=<?echo $id?>&item=ec617144ff2c89736719d8b636dfe78a"<?}?>>
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("ec617144ff2c89736719d8b636dfe78a")'>
                                                        <?}?>
                                                        
                                                    <img src="./uploads/postImages/orkide.png" alt="Mountains" style="width:100%">
                                                    </a>
                                                    <?if($id==2){$redirectN = 3;}else{$redirectN = 6;}?>
                                                    <?if (!in_array('ec617144ff2c89736719d8b636dfe78a', $rewardsInbucket)) {?>
                                                            <a <? if($logged==1){echo 'href="./'.$realShopName.'.php?postRefId='.$id.'&item=ec617144ff2c89736719d8b636dfe78a"';}else{"onclick='showError()'";}?> class="myBtn" style="color:white;">
                                                        <?}else{?>
                                                            <a onclick='donateFromRewards("ec617144ff2c89736719d8b636dfe78a")' class="myBtn" style="color:white;">
                                                        <?}?>
                                                        
                                                        <?translate("Donate","DESTEKLE")?>
                                                    </a>
                                                  </div>
                                                </div> 
                                                </a>
                                                <br>   
                                                <h6><?echo $reward0_deliveryTime?></h6>
                                                <p><?echo $reward0_reward?></p>
                                                <br>
                                                
                                            </div>
                                        </div>
                                    </a>
                                    <br>
                                                
                                    <?
                                    $fakeId=0;
                                    if ($result_rewards->num_rows > 0)
                                    { 
                                        while($row = $result_rewards->fetch_assoc()) 
                                        { 
                                            if(($row['reward']!=''))
                                            {
                                                ?>
                                                <?if (!in_array($row['object'], $rewardsInbucket)) {?>
                                                <a <? if($logged==1){echo 'href="./'.$realShopName.'.php?postRefId='.$id.'&item='.$row['object'].'"';}else{"onclick='showError()'";}?>>
                                                            <?}else{?>
                                                            <a onclick='donateFromRewards("<?echo $row['object']?>")'>
                                                            <?}?>
                                                            
                                                    <div class="" style="background-color:#c4ffc4;text-align:center;" <?if($logged==0){echo "onclick='showError()'";}?>>
                              
                                                        <img style="padding-top:15px; margin: 0 auto;"  width="130" height="100" src="./uploads/postImages/<?echo $row['image']?>"  alt="post">
                                                        <br>
                                                        <div class="media-body" style="margin:10px;">
                                                            
                                                             <?if (!in_array($row['object'], $rewardsInbucket)) {?>
                                                             <a <? if($logged==1){echo 'href="./'.$realShopName.'.php?postRefId='.$id.'&item='.$row['object'].'"';}else{"onclick='showError()'";}?>>
                                                                 
                                                            <?}else{?>
                                                            <a onclick='donateFromRewards("<?echo $row['object']?>")'>
                                                            <?}?>
                                                                 
                                                                 <h6><?echo $row['reward']?></h6></a>
                                                            <p><?echo $row['deliveryTime']?></p>
                                                            
                                                            <?if (!in_array($row['object'], $rewardsInbucket)) {?>
                                                            <a <? if($logged==1){echo 'href="./'.$realShopName.'.php?postRefId='.$id.'&item='.$row['object'].'"';}else{"onclick='showError()'";}?>>
                                                            <?}else{?>
                                                            <a onclick='donateFromRewards("<?echo $row['object']?>")'>
                                                            <?}?>
                                                             
                                                                <button type="button" class="btn btn-primary primary_btn rounded" style="margin: 0 auto;margin-bottom:20px;">
                                                                  <?translate("Donate","Destekleyin")?>
                                                                </button>
                                                            </a>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </a>
                                                <br>
                                                <?
                                            }
                                        }
                                    }
                                    
                                    $myJSON = json_encode($myArr);
                                    ?>
                                  														
                            </aside>
                            
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title"><?translate("Donate","Destekleyin")?></h4>
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
                                            
                                            if((($row['price']>1)&&$id=='2')||($id!='2')){
                            
                                            
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
                        <?
                        if($detect->isMobile()){
                        ?>
                        <?
                        if ($result_postParticipants->num_rows > 0)
                        { 
                            ?>
                            <hr>
                        <h4><?translate("Contributors", "Destekçiler")?></h4>
                        <div class="progress-table">
                        
                        <div class="table-head">
                        	<div class="country" style="margin-left:10px;"><?translate("Pic","Fotoğraf")?></div>
                        	<div class="country" style="margin-left:10px;"><?translate("Isim","İsim")?></div>
                        	<div class="country" style="margin-left:10px;"><?translate("Item","Destek")?></div>
                        	<div class="country" style="margin-left:10px;"><?translate("","")?></div>
                        </div>
                            <?
                            while($row = $result_postParticipants->fetch_assoc()) 
                            { 
                        	?>
                        	    <div class="table-row">
                        			<div class="country" style="margin-left:10px;">
                        			    <img  width="70" height="50"  src="./uploads/postImages/<?echo $row['userImg']?>" alt="flag">
                        			</div>
                        			<div class="country" style="margin-left:10px;"><?echo $row['name']?></div>
                        			<div class="country" style="margin-left:10px;"><?echo $row['itemName']?></div>
                        			<div class="country" style="margin-left:10px;">
                        			    <img  width="70" height="50"  src="./uploads/postImages/<?echo $row['itemImg']?>" alt="flag">
                        			</div>
                        		</div>
                        	<?
                            }
                            ?></div>
                            <?
                        }}
                        ?>
                        
                        <?
                        if($detect->isMobile()){
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
                                    <textarea class="mb-10" style="width:100%" rows="5" name="new_comment" id="new_comment" placeholder="<?translate("Type your comment here.","Yorumunuzu buraya yazın.")?>" required=""></textarea>
                                </div>
                                <button href="#" class="primary-btn primary_btn"><?translate("Post Comment","Yorumu gönder")?></button>	
                            </form>
                        </div>
                        <?}?>
                        <?}}?>

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
        
        

            function escapeHtml(unsafe) {
                return unsafe
                     .replace(/&/g, "&amp;")
                     .replace(/</g, "&lt;")
                     .replace(/>/g, "&gt;")
                     .replace(/"/g, "&quot;")
                     .replace(/'/g, "&#039;");
             }




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
                  var a=escapeHtml($("#new_comment").val());
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
        
        function showError(){
            //var obtainedErrorObjectToDisplayMessageOnToTellUserToSignin = document.getElementById('errMessage');
            //obtainedErrorObjectToDisplayMessageOnToTellUserToSignin.style.display = "block";
            Swal.fire({
                imageUrl: './img/manavinfpost(1).jpg',
                imageAlt: 'A tall image',
                confirmButtonText: "G&#304;R&#304;&#350; YAP",
                /**
              title: 'Merhaba :)',
              html: '<?translate("You need to signin to buy from the market.","Sat&#305;n Almak &#304;&ccedil;in Giri&#351; Yapman&#305;z Gerekmektedir!")?>',
                confirmButtonText: "G&#304;R&#304;&#350; YAP",
                **/
            }).then(function() {
                // Redirect the user
                var fallBackUrl = window.location.href
                window.open(
                  "./signup.php?fallBack="+fallBackUrl,"_self"
                );
                //console.log('The Ok Button was clicked.');
                });

        }
                                                    
                                                    
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
            
           function donateFromRewards(itemId){
               console.log("donateFromRewards", itemId)
               const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false,
                })
                
                swalWithBootstrapButtons.fire({
                  title: 'Do you want to donate?',
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, donate!',
                  cancelButtonText: "No, don't donate!",
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    swalWithBootstrapButtons.fire(
                      'Donated!',
                      'Thank you for donating!',
                      'success'
                    ).then(function() {
                        // Redirect the user
                        window.open(
                          "./postPage.php?id=<?echo $id?>&itemSelect="+itemId,"_self"
                        );
                    });
                                                            
                  } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    swalWithBootstrapButtons.fire(
                      'Donation Cancelled',
                    )
                  }
                })
                                                            
           }
        </script>
    </body>
</html>

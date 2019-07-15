<?include_once("global.php");?>
    <?
    function runMyFunction() {
    echo 'Logging out...';
    session_destroy();
  }

  if (isset($_GET['logout'])) {
    runMyFunction();
    $logged=0;
  }
  
    include_once("./phpComponents/checkLoginStatus.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query_selectedPost= "select * from fik_posts where id= '$id'"; 
    $result_selectedPost = $con->query($query_selectedPost); 
    if ($result_selectedPost->num_rows > 0)
    { 
        while($row = $result_selectedPost->fetch_assoc()) 
        { 
            $title = $row['title'];
            $description = $row['description'];
            $image = $row['image'];
        }
    }
}
else{
    1;
}
//your posts
$query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId group by c.postId order by p.id desc"; 
$result_allPosts = $con->query($query_allPosts); 

//check pending posts
$nPendingPosts = 0;
$query_pendingPosts= "select * from fik_postApproval where decision='' and userId='$session_userId'"; 
$result_pendingPosts = $con->query($query_pendingPosts); 
if ($result_pendingPosts->num_rows > 0)
    { 
        while($row = $result_pendingPosts->fetch_assoc()) 
        { 
            $nPendingPosts +=1;
        }
    }

//contributed posts
$query_supportedProjects= "SELECT p.id, c.postId,	c.userId,	c.contribution,	sum(c.quantity) as quantity,	p.title, GROUP_CONCAT(DISTINCT(s.name) SEPARATOR ', ') as name ,	p.excerpt,	p.description	,p.goal	,p.image	,p.category,	p.datePosted FROM `fik_contributions` c inner join fik_posts p on c.postId = p.id inner join fik_shopItems s on c.contribution=s.id where c.userId='$session_userId' group by p.id order by c.id desc"; 
$result_supportedProjects = $con->query($query_supportedProjects);

//your created posts
$query_createdPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId where p.userId ='$session_userId' group by p.id order by p.id desc"; 
$result_createdPosts = $con->query($query_createdPosts);

//your created blogs
$query_createdBlogs= "select * from fik_blogs where userId='$session_userId' order by id desc"; 
$result_createdBlogs = $con->query($query_createdBlogs);

//recent posts
$query_recentPosts= "select * from fik_posts order by views desc limit 4"; 
$result_recentPosts = $con->query($query_recentPosts); 

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

                <!--================ Start Header Menu Area =================-->
                <?php include_once("./phpComponents/navbar.php")?>
                    <!--================ End Header Menu Area =================-->

                    <!--================ Home Banner Area =================-->
                    <section class="banner_area">
                        <div class="banner_inner d-flex align-items-center">
                            <style>
        .banner_area .banner_inner .overlay{
            
            background: linear-gradient(0deg, rgba(6, 13, 1, 0.3), rgba(6, 13, 1, 0.3)), url(./img/profilbanner.jpg) no-repeat scroll center center;
            background-size:cover
        }
    </style>
                            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                            <div class="container">
                                <div class="banner_content text-center">
                                    <h2><?translate("Dashboard","Bah&ccedil;&#305;van Bilgileri")?></h2>
                                    <p><?translate("This is your personal dashboard where you can manage your projects and donations in the best possible way.","Kendi bah&ccedil;enize ho&#351; geldiniz. Bilgilerinizi d&uuml;zenleyebilir ya da neler yapt&#305;&#287;&#305;n&#305;z&#305; bu sayfada g&ouml;rebilirsiniz.")?></p>
                                    <?if(isset($_GET['pendingApproval'])){?>
                                        <p style="color:orange"><?translate("Your post has been sent to the admins. Once its approved, it will be posted on the website.", "Projeniz platforma gönderildi, en kısa sürede geri dönüş yapacağız.");?></p>
                                    <?}?>
                                   
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
                            <div class="row">
                                <div class="col-lg-8 posts-list">
                                    <div class="main_title">
                                        <h2><?translate("Dashboard","Bah&ccedil;&#305;van Bilgileri")?></h2>
                                        <p><?translate("This is your personal dashboard where you can manage your projects and donations in the best possible way.","Kendi bah&ccedil;enize ho&#351; geldiniz. Bilgilerinizi d&uuml;zenleyebilir ya da neler yapt&#305;&#287;&#305;n&#305;z&#305; bu sayfada g&ouml;rebilirsiniz.")?></p>
                                        <?if(isset($_GET['pendingApproval'])){?>
                                            <p style="color:orange"><?translate("Your post has been sent to the admins. Once its approved, it will be posted on the website.", "Projeniz platforma gönderildi en kısa sürede geri dönüş yapacağız.");?></p>
                                        <?}?>
                                        <?if($nPendingPosts>0){
                                    ?>
                                    <p style="background-color:green;color:white;"><?translate("You have","Mesajınız")?> <?echo $nPendingPosts?> <?translate("pending posts","var.")?> </p>
                                    <?
                                    }?>
                                        <a href="./decisionHistory.php"><?translate("View post decision history","Gönderdiğiniz Projeler Hakkında Bilgilere Buradan Ulaşabilirsiniz.")?></a>
                                    </div>

                                    <div class="row justify-content-center">
                                        <?
                                            if($lang=='EN'){
                                                ?>
                                                  <h5>Start a [<a href="./newProject.php" class="rounded" style="color:green;">NEW PROJECT</a>]</h5>
                                                <?
                                            }
                                            else{
                                                ?>
                                                  <h5><a href="./newProject.php" class="rounded" style="color:green;">Proje Göndermek İçin Tıklayınız.</a></h5>
                                                <?
                                            }
                                        ?>
                                        
                                        
                                        <?
                                        if($session_userId==2){
                                            ?>
                                            
                                            <br>
                                            <hr>
                                            <h4><?translate("OR","VEYA")?></h4>
                                            <hr>
                                            <br>
                                        
                                            <?
                                            if($lang=='EN'){
                                                ?>
                                                  <h3>Write a [<a href="./newBlog.php" class="rounded" style="color:green;">NEW BLOG</a>]</h3>
                                                <?
                                            }
                                            else{
                                                ?>
                                                  <h3>[<a href="./newBlog.php" class="rounded" style="color:green;">Yeni blog</a>] yaz </h3>
                                                <?
                                            }
                                        }
                                        ?>

                                        <p><?translate("The best way to make your project a success is by telling more people about it. Post a new project and get people interested about your idea.","Projenizi kitlelere duyurarak destek toplamak için, projenizi detaylı şekilde bize göndermeniz gerekmektedir.")?></p>
                                    </div>

                                    <div class="row justify-content-center">
                                        <h3><?translate("Your Contributions","Desteklediğiniz Projeler")?></h3>
                                       
                                    </div>
                                    <div class="row justify-content-center">
                                         <p><a href="./donationHistory.php"><?translate("Donation History","Desteklediğiniz Projeler Hakkında Bilgilere Buradan Ulaşabilirsiniz.")?></a></p>
                                        </div>
                                    <br>

                                    <div class="row">
                                        <?
                                            $result_supportedProjects = $con->query($query_supportedProjects); 
                                            if ($result_supportedProjects->num_rows > 0)
                                            { 
                                                while($row = $result_supportedProjects->fetch_assoc()) 
                                                { 
                                                    
                                        ?>
                                            
                                            <div class="col-lg-4 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <figure>
                                                            <?
            							    if(substr($row['image'],-3)=="mp4"){
                                            ?>
                                            <video class="videoImg card-img-top img-fluid" controls loop autoplay>
                                              <source src="./uploads/postImages/<?echo $row['image']?>" type="video/mp4">
                                            </video>
                                            <?}else{?>
                                            
                                            <img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $row['image']?>" alt="">
                                            <?}?>
                                                        </figure>
                                                        <div class="card_inner_body" style="padding: 5px 5px;">
                                                            <h4 class="card-title"><?echo $row['title']?></h4>
                                                            <p class="card-text">
                                                                <?echo $row['excerpt']?>
                                                            </p>
                                                            <div class="d-flex justify-content-between raised_goal">
                                                                <p><span><?translate("You donated:", "Desteğiniz")?>  <?echo $row['name']?> (<?echo $row['quantity']?>)</span></p>
                                                            </div>
                                                            <div class="d-flex justify-content-between donation align-items-center">
                                                                <a href="./postPage.php?id=<?echo $row['id']?>" class="primary_btn"><?translate("View","G&#246;r&#252;n&#252;m")?></a>
                                                                <?
                                                            if(((time() - $row['datePosted']) >= 7776000 )&&( $session_AgreeOption=='moneyToFikir')){
                                                                //transfer everythonig to fikir
                                                                $postID= $row['id'];
                                                                //send greater than 1 cont to fikir
                                                                $sql="update fik_contributions c inner join fik_shopItems s on c.contribution=s.id
                                                                        set c.postId='2' where c.userId='$session_userId' and c.postId='$postID' and s.price>1";
                                                                if(!mysqli_query($con,$sql))
                                                                {
                                                                echo"err";
                                                                }
                                                                
                                                                //send rest to owner
                                                                $query_myCont= "select * from fik_contributions where userId='$session_userId' and postId='$postID' and postId!='2'"; 
                                                                $result_myCont = $con->query($query_myCont); 
                                                                if ($result_myCont->num_rows > 0)
                                                                { 
                                                                    while($row = $result_myCont->fetch_assoc()) 
                                                                    { 
                                                                        $itemId = $row['contribution'];
                                                                        $itemQuantity = $row['quantity'];
                                                                        
                                                                        $sql="update fik_inventory set quantity=quantity+'$itemQuantity' where userId='$session_userId' and object='$itemId'";
                                                                        if(!mysqli_query($con,$sql))
                                                                        {
                                                                        echo"err";
                                                                        }
                                                                    }
                                                                }
                                                                
                                                                
                                                                $sql="delete from fik_contributions where userId='$session_userId' and postId='$postID' and postId!='2'";
                                                                if(!mysqli_query($con,$sql))
                                                                {
                                                                echo"err";
                                                                }
                                                                
                                                               
                                                            }
                                                            if(((time() - $row['datePosted']) >= 7776000 )&&( $session_AgreeOption=='moneyToMe') &&( $row['id']!=2)){
                                                                //send things to my wallet again
                                                                $postID= $row['id'];
                                                                
                                                                $query_myCont= "select * from fik_contributions where userId='$session_userId' and postId='$postID'"; 
                                                                $result_myCont = $con->query($query_myCont); 
                                                                if ($result_myCont->num_rows > 0)
                                                                { 
                                                                    while($row = $result_myCont->fetch_assoc()) 
                                                                    { 
                                                                        $itemId = $row['contribution'];
                                                                        $itemQuantity = $row['quantity'];
                                                                        
                                                                        $sql="update fik_inventory set quantity=quantity+'$itemQuantity' where userId='$session_userId' and object='$itemId'";
                                                                        if(!mysqli_query($con,$sql))
                                                                        {
                                                                        echo"err";
                                                                        }
                                                                    }
                                                                }
                                                                
                                                                $sql="delete from fik_contributions where userId='$session_userId' and postId='$postID'";
                                                                if(!mysqli_query($con,$sql))
                                                                {
                                                                echo"err";
                                                                }
                                                                
                                                            }
                                                            ?>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?
                                                }
                                            }
                        				?>
                                    </div>

                                    <div class="row justify-content-center">
                                        <h3><?translate("Your Projects","Projeleriniz")?></h3>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <?
                    $result_createdPosts = $con->query($query_createdPosts); 
                    if ($result_createdPosts->num_rows > 0)
                    { 
                        while($row = $result_createdPosts->fetch_assoc()) 
                        { 
                ?>

                                            <div class="col-lg-4 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <figure>
                                                            <?
            							    if(substr($row['image'],-3)=="mp4"){
                                            ?>
                                            <video class="videoImg card-img-top img-fluid" controls loop autoplay>
                                              <source src="./uploads/postImages/<?echo $row['image']?>" type="video/mp4">
                                            </video>
                                            <?}else{?>
                                            
                                            <img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $row['image']?>" alt="">
                                            <?}?>
                                            
                                                        </figure>
                                                        <div class="card_inner_body" style="padding: 5px 5px;">
                                                            <h4 class="card-title"><?echo $row['title']?></h4>
                                                            <p class="card-text">
                                                                <?echo $row['excerpt']?>
                                                            </p>
                                                            <div class="d-flex justify-content-between raised_goal">
                                                                <p><?translate("Raised","Toplanan")?>:  &#8378; <?echo $row['amountEarned']?>
                                                                </p>
                                                                <p><span><?translate("Goal","Hedeflenen")?>:  &#8378; <?echo $row['goal']?></span></p>
                                                            </div>
                                                            <div class="d-flex justify-content-between donation align-items-center">
                                                                <a href="./postPage.php?id=<?echo $row['id']?>" class="primary_btn"><?translate("View","Görüntüle")?></a>
                                                                <p><span class="lnr lnr-heart"></span>
                                                                    <?echo $row['nContributors']?> <?translate("Donors","Destek&#231;iler")?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?
                        }
                    }
				?>
                                    </div>
                                    
                                    

                                    <div class="row">
                                        <?
                                            $result_createdBlogs = $con->query($query_createdBlogs); 
                                            if ($result_createdBlogs->num_rows > 0)
                                            { 
                                                while($row = $result_createdBlogs->fetch_assoc()) 
                                                { 
                                        ?>

                                            <div class="col-lg-4 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <figure>
                                                            <img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $row['image']?>" alt="<?echo $row['title']?>" >
                                                        </figure>
                                                        <div class="card_inner_body" style="padding: 5px 5px;">
                                                            <h4 class="card-title"><?echo $row['title']?></h4>
                                                            <p class="card-text">
                                                                <?echo $row['excerpt']?>
                                                            </p>
                                                            
                                                            <div class="d-flex justify-content-between donation align-items-center">
                                                                <a href="./blogPage.php?id=<?echo $row['id']?>" class="primary_btn"><?translate("View","Görüntüle")?></a>
                                                                <p><span class="lnr lnr-heart"></span>
                                                                    <?echo $row['views']?> Views</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?
                        }
                    }
				?>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="blog_right_sidebar">
                                        <aside class="single_sidebar_widget author_widget">
                                            <img width="100" height="100" class="author_img rounded-circle" src="./uploads/postImages/<?echo $session_image?>" alt="">
                                            <h4><?echo $session_name?></h4>
                                            <p>
                                                <?echo $session_about?>
                                            </p>
                                            <a href="./settings.php" class="primary_btn" style="background-color:#22a7b1;"><?translate("Settings","Ayarlar")?></a>
                                            <a href="./home.php?logout=true" class="primary_btn" style="background-color:orange;margin-top:10px;"><?translate("Logout","Çıkış Yapın")?></a>

                                        </aside>
                                        <hr>
                                        <?php include_once("./phpComponents/cartWidget.php")?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

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
                                    

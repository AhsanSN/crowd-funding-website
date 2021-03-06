<?include_once("global.php");?>
    <?

$noPageFound = true;
if(isset($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);
    $query_selectedPost= "
    select p.views, u.userImg as pImg, u.about, p.id, p.title, p.excerpt,p.aboutMe, p.image ,p.description, p.category, p.datePosted , u.name from fik_blogs p inner join fik_users u on u.id = p.userId where p.id='$id' 
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
    }
    
    
    //post comments
    $query_postComments= "select * from fik_blogComments p inner join fik_users u on p.userId=u.id where p.blogId='$id' order by p.id asc"; //for now
    $result_postComments = $con->query($query_postComments);
    
    $query_postCommentsNumber= "select count(*) as nComments from fik_blogComments p where p.blogId='$id'"; //for now
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
    $query_prevPost= "select * from fik_blogs where id='$newId'"; //for now
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
    $query_nextPost= "select * from fik_blogs where id='$newId'"; //for now
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
    $id = htmlspecialchars($_POST['postId']);
    $datePosted = time();
    $sql="insert into fik_blogComments (`blogId`, `userId`, `comment`, `datePosted`) values ('$id', '$session_userId', '$comment', '$datePosted')";
    if(!mysqli_query($con,$sql))
    {
        echo "err";
    }
    
}

//recent posts
$query_recentPosts= "select * from fik_blogs order by views desc limit 4"; 
$result_recentPosts = $con->query($query_recentPosts); 

//cart items
$query_cartItems= "select * from fik_cart c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_cartItems = $con->query($query_cartItems); 

//bucket items
$query_inventory= "select * from fik_inventory c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_inventory = $con->query($query_inventory);

//bucket items
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
$query_checkIp= "select * from fik_views where postId='$id' and ip='$ip' and class='blog'"; 
$result_checkIp = $con->query($query_checkIp);
if ($result_checkIp->num_rows > 0)
{ 
    //do nothing;
}
else{
    $sql="insert into fik_views (`postId`, `ip`, `class`) values ('$id', '$ip', 'blog')";
    if(!mysqli_query($con,$sql))
    {
        echo "err";
    }
    //update count
    $sql="update fik_blogs set views=views+1 where id='$id'";
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
<!—- ShareThis END -—>
<body>
        
        <!-- Modal -->
        <!--================ Start Header Menu Area =================-->
         <?php include_once("./phpComponents/navbar.php")?>
        <!--================ End Header Menu Area =================-->
            
        <!--================ Home Banner Area =================-->
                <style>
        .banner_area .banner_inner .overlay{
            
            background: linear-gradient(0deg, rgba(6, 13, 1, 0.3), rgba(6, 13, 1, 0.3)), url(./img/garden.jpg) no-repeat scroll center center;
            background-size:cover
        }
    </style>
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2><?echo $title?><?if($noPageFound){translate("No page Found!","Sayfa bulunamad&#305;!");}?></h2>
                        <p><?echo $excerpt?></p>
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
                        <?
                            if(!$noPageFound){
                                ?>
                        <div class="single-post row">
                            <div class="col-lg-12">
                                <div class="feature-img">
                                    <img class="img-fluid" src="./uploads/postImages/<?echo $image?>" alt="">
                                </div>									
                            </div>
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a href="./allBlogs.php?cat=<?echo $category?>"><?echo $category?></a>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a href="#"><?echo $name?><i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#"><?echo date('Y/m/d H:i',$date)?><i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#"><?echo $views?> <?translate("Views","G&#246;r&#252;n&#252;mler")?><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><?echo $nComments?> <?translate("Comments","Yorumlar")?><i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h2><?echo $title?></h2>
                                <p class="excert">
                                    <?echo $excerpt?>
                                </p>
                                <p>
                                    <?echo $description?>
                                </p>
                                
                            </div>
                        </div>
                        <div class="sharethis-inline-reaction-buttons"></div>
                        <?}?>
                        <div class="navigation-area">
                            <div class="row">
                                <?if($previd!=null){?>
                                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href="./blogPage.php?id=<?echo $previd?>"><img width="100" height="100" class="img-fluid" src="./uploads/postImages/<?echo $previmage?>"alt=""></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="./blogPage.php?id=<?echo $previd?>"><span class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials">
                                        <p><?translate("Prev Post","&#246;nceki yaz&#305;")?></p>
                                        <a href="./blogPage.php?id=<?echo $previd?>"><h4><?echo $prevtitle?></h4></a>
                                    </div>
                                </div>
                                <?}if($nextid!=null){?>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p><?translate("Next Post","Sonraki g&#246;nderi")?></p>
                                        <a href="./blogPage.php?id=<?echo $nextid?>"><h4><?echo $nexttitle?></h4></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="./blogPage.php?id=<?echo $nextid?>"><span class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="thumb">
                                        <a href="./blogPage.php?id=<?echo $nextid?>"><img width="100" height="100" class="img-fluid" src="./uploads/postImages/<?echo $nextimage?>" class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                                    </div>										
                                </div>
                                <?}?>
                            </div>
                        </div>
                        <?
                            if(!$noPageFound){
                                ?>
                                
                        <div class="comments-area" id="commentArea">
                            <h4><?echo $nComments?> <?translate("Comments","Yorumlar")?></h4>
                            
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
                            <form method="get">
                                <input name="postId" hidden value="<?echo $id?>">
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="new_comment" id="new_comment" placeholder="<?translate("Type your comment here.","Yorumunuzu buraya yaz&#305;n.")?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?translate("Type your comment here.","Yorumunuzu buraya yaz&#305;n.")?>'" required=""></textarea>
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
        
        function escapeHtml(unsafe) {
                return unsafe
                     .replace(/&/g, "&amp;")
                     .replace(/</g, "&lt;")
                     .replace(/>/g, "&gt;")
                     .replace(/"/g, "&quot;")
                     .replace(/'/g, "&#039;");
             }
             
        	$(function () {
                $('form').on('submit', function (e) {
                  e.preventDefault();
                  $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: 'blogPage.php',
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
    </body>
</html>
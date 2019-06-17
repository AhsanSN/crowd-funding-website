<?include_once("global.php");?>
    <?


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query_selectedPost= "
    select p.views, u.userImg as pImg, u.about, p.id, p.title, p.excerpt, p.goal,p.aboutMe, p.image ,p.description, p.category, p.datePosted ,COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned , u.name from fik_posts p left outer join fik_contributions c on p.id=c.postId inner join fik_users u on u.id = p.userId where p.id='$id' group by c.postId
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
    $comment = $_POST["new_comment"];
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

//see if enough
if(isset($_POST["itemSelect"])&&isset($_POST["quantitySelect"]))
{
    $donationStatus= "failed";
    $item = $_POST["itemSelect"];
    $quantity = $_POST["quantitySelect"];
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
    }
    else{
        //failed
        1;
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
<body>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
             <form action="" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Make Donation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      
                      <div class="container">
                          <div class="row">
                            <div class="col-sm">
                              <h5>Item</h5>
                                <select class="custom-select" name="itemSelect">
                                    <?
                                    if ($result_inventoryForDonation->num_rows > 0)
                                    { 
                                        while($row = $result_inventoryForDonation->fetch_assoc()) 
                                        { 
                                        ?>
                                          <option value="<?echo $row['object']?>"><?echo $row['name']?></option>
                                          <?
                                        }
                                    }
                                  ?>
                                </select>
                            </div>
                            <div class="col-sm">
                              <h5>Quantity</h5>
                                <select class="custom-select quantitySelectMenu" name="quantitySelect">
                                  <?
                                    for($i=1; $i<11; $i++)
                                    { 
                                    ?>
                                      <option value="<?echo $i?>"><?echo $i?></option>
                                      <?
                                    }
                                  ?>
                                </select>
                            </div>
                            
                          </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Donate</button>
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
                        <h2><?echo $title?> <?if($donationStatus=="success"){echo"<div style='background-color:green;'>Donation of Successfull!</div>";}if($donationStatus=="failed"){echo"<div style='background-color:red;'>Donation failed!</div>";}?></h2>
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
                        <div class="single-post row">
                            <div class="col-lg-12">
                                									
                            </div>
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    <?if($logged==0){echo '<p style="color:red;">Signup required to donate.</p>';}?>
                                    <div class="col-lg-7">
                                        
                                        <button type="button" class="btn btn-primary primary_btn rounded" <?if($logged==1){echo 'data-toggle="modal"';}?>  data-target="#exampleModalCenter">
                                          Donate
                                        </button>
                                        
                    				</div>
                    				<hr>
                                    <div class="post_tag">
                                        <a href="./allPosts.php?cat=<?echo $category?>"><?echo $category?></a>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li>Collected: $<?echo $donations?></li>
                                        <li>Need: $<?echo $goal?></li>
                                        <li>Donors: <?echo $nDonors?></li>
                                    </ul>
                                    <hr>
                                    <ul class="blog_meta list">
                                        <li><a href="#"><?echo $name?><i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#"><?echo date('Y/m/d H:i',$date)?><i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#"><?echo $views?> Views<i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><?echo $nComments?> Comments<i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <?
            							    if(substr($image,-3)=="mp4"){
                                            ?>
                                            <video class="videoImg card-img-top img-fluid" controls loop autoplay>
                                              <source src="./uploads/postImages/<?echo $image?>" type="video/mp4">
                                            </video>
                                            <?}else{?>
                                            
                                            <img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $image?>" alt="">
                                            <?}?>
                                            <hr>
                                <h2><?echo $title?> <?if($donationStatus=="success"){echo"<div style='background-color:green;'>Donation of Successfull!</div>";}if($donationStatus=="failed"){echo"<div style='background-color:red;'>Donation failed!</div>";}?></h2>
                                <p class="excert">
                                    <?echo $excerpt?>
                                </p>
                                <p>
                                    <?echo $description?>
                                </p>
                                
                            </div>
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
                                        <p>Prev Post</p>
                                        <a href="./postPage.php?id=<?echo $previd?>"><h4><?echo $prevtitle?></h4></a>
                                    </div>
                                </div>
                                
                                <?}if($nextid!=null){?>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
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
                        <div class="comments-area" id="commentArea">
                            <h4><?echo $nComments?> Comments</h4>
                            
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
                                                    <p class="date"><?echo $row['datePosted']?></p>
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
                            <h4>Leave a Comment</h4>
                            <form method="get" id="formComment">
                                <input name="postId" hidden value="<?echo $id?>">
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="new_comment" id="new_comment" placeholder="Type your comment here." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type your comment here.'" required=""></textarea>
                                </div>
                                <button href="#" class="primary-btn primary_btn">Post Comment</button>	
                            </form>
                        </div>
                        <?}?>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget author_widget">
                                <img width="100" height="100" class="author_img rounded-circle" src="./uploads/postImages/<?echo $personImg?>" alt="">
                                <h4><?echo $name?></h4>
                                <p><?echo $about?></p>
                                <p><?echo $aboutMe?></p>
                            </aside>
                            <hr>
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
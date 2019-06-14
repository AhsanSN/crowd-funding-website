<?include_once("global.php");?>
    <?

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
//recent posts
$query_allPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId group by c.postId order by p.id desc"; 
$result_allPosts = $con->query($query_allPosts); 

//contributed posts
$query_supportedProjects= "SELECT p.id, c.postId,	c.userId,	c.contribution,	c.quantity,	p.title,s.name,	p.excerpt,	p.description	,p.goal	,p.image	,p.category,	p.datePosted FROM `fik_contributions` c inner join fik_posts p on c.postId = p.id inner join fik_shopItems s on c.contribution=s.id where c.userId='$session_userId' order by c.id desc"; 
$result_supportedProjects = $con->query($query_supportedProjects);

//your created posts
$query_createdPosts= "select p.id, p.title, p.excerpt, p.goal, p.image , COUNT(c.postId) as nContributors, sum(c.quantity) as amountEarned from fik_posts p left outer join fik_contributions c on p.id=c.postId where p.userId ='1' group by p.id order by p.id desc"; 
$result_createdPosts = $con->query($query_createdPosts);

//your created blogs
$query_createdBlogs= "select * from fik_blogs where userId='$session_userId'"; 
$result_createdBlogs = $con->query($query_createdBlogs);

//recent posts
$query_recentPosts= "select * from fik_posts order by id desc limit 4"; 
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
                            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                            <div class="container">
                                <div class="banner_content text-center">
                                    <h2>Dashboard</h2>
                                    <p>Hey
                                        <?echo $session_name?>! This is your personal dashboard where you can manage your projects and donations in the best possible way.</p>
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
                                        <h2>Dashboard</h2>
                                        <p>Hey
                                            <?echo $session_name?>! This is your personal dashboard where you can manage your projects and donations in the best possible way.</p>
                                    </div>

                                    <div class="row justify-content-center">
                                        <h3>Start a [<a href="./newProject.php" class="rounded" style="color:green;">NEW PROJECT</a>]</h3>
                                        <br>
                                        <hr>
                                        <h4>OR</h4>
                                        <hr>
                                        <br>
                                        <h3>Write a [<a href="./newBlog.php" class="rounded" style="color:green;">NEW BLOG</a>]</h3>
                                        <p>The best way to make your project a success is by telling more people about it. Post a new project and get people interested about your idea.</p>
                                    </div>

                                    <div class="row justify-content-center">
                                        <h3>Your Contributions</h3>
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
                                                            <img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $row['image']?>" alt="<?echo $row['title']?>">
                                                        </figure>
                                                        <div class="card_inner_body">
                                                            <h4 class="card-title"><?echo $row['title']?></h4>
                                                            <p class="card-text">
                                                                <?echo $row['excerpt']?>
                                                            </p>
                                                            <div class="d-flex justify-content-between raised_goal">
                                                                <p><span>You donated:  <?echo $row['name']?> (<?echo $row['quantity']?>)</span></p>
                                                            </div>
                                                            <div class="d-flex justify-content-between donation align-items-center">
                                                                <a href="./postPage.php?id=<?echo $row['id']?>" class="primary_btn">View</a>
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
                                        <h3>Your Projects</h3>
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
                                                            <img class="card-img-top img-fluid" src="./uploads/postImages/<?echo $row['image']?>" alt="<?echo $row['title']?>" >
                                                        </figure>
                                                        <div class="card_inner_body">
                                                            <h4 class="card-title"><?echo $row['title']?></h4>
                                                            <p class="card-text">
                                                                <?echo $row['excerpt']?>
                                                            </p>
                                                            <div class="d-flex justify-content-between raised_goal">
                                                                <p>Raised: $<?echo $row['amountEarned']?>
                                                                </p>
                                                                <p><span>Goal: $<?echo $row['goal']?></span></p>
                                                            </div>
                                                            <div class="d-flex justify-content-between donation align-items-center">
                                                                <a href="./postPage.php?id=<?echo $row['id']?>" class="primary_btn">View</a>
                                                                <p><span class="lnr lnr-heart"></span>
                                                                    <?echo $row['nContributors']?> Donors</p>
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
                                        <h3>Your Blogs</h3>
                                    </div>
                                    <br>

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
                                                        <div class="card_inner_body">
                                                            <h4 class="card-title"><?echo $row['title']?></h4>
                                                            <p class="card-text">
                                                                <?echo $row['excerpt']?>
                                                            </p>
                                                            
                                                            <div class="d-flex justify-content-between donation align-items-center">
                                                                <a href="./blogPage.php?id=<?echo $row['id']?>" class="primary_btn">View</a>
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
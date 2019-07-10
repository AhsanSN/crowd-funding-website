<?include_once("global.php");?>
    <?

//recent posts
if(isset($_GET['sort'])){
    $sortBy = $_GET['sort'];
    if($sortBy=='popularity'){
        $query_allBlogs= "select * from fik_blogs order by views desc"; 
    }
    if($sortBy=='name'){
        $query_allBlogs= "select * from fik_blogs order by title desc";         
    }
    if($sortBy=='date'){
        $query_allBlogs= "select * from fik_blogs order by datePosted desc"; 
        }
    else{
        $query_allBlogs= "select * from fik_blogs order by views desc";     }
}
else{
        $query_allBlogs= "select * from fik_blogs order by views desc"; 
        }
    
//recent posts
$result_allBlogs = $con->query($query_allBlogs); 

?>
<!doctype html>
<html lang="en">
    <?php include_once("./phpComponents/header.php")?>
<body>
        
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
            <div class="container" style="border-radius: 20px;">
                <div class="banner_content text-center">
                    <h2 style="color:white;font-size:50px;text-transform: uppercase;"><?translate("Garden","Bah&#231;e")?></h2>
                    <p style="color:white;font-size:20px;text-transform: uppercase;"><?translate("Read from hundered of blogs written by people like you.","F&#304;k&#304;r Bah&#231;IvanI'nIn Neler YaptI&#287;InI Ke&#351;fed&#304;n!")?></p>
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
            <!--
            <select name="project_category"  placeholder="asdsad" onchange="javascript:handleSelect(this)">
                    <option value="popularity"><?translate("Popularity","Pop&#252;lerlik")?></option>
                    <option value="name" ><?translate("Name","isim")?></option>
                    <option value="date" ><?translate("Date","tarih")?></option>
                </select>
                -->
            <div class="main_title">
                <h2 style="color:white;font-size:40px;"><?translate("Garden","Bah&#231;e")?></h2>
                    <p style="color:white;font-size:20px;text-transform: uppercase;"><?translate("Read from hundered of blogs written by people like you.","Fikir Bah&#231;&#231;van&#231;'n&#231;n Neler Yapt&#231;&#287;&#231;n&#231; Ke&#351;fedin!")?></p>
                <script type="text/javascript">
                    function handleSelect(elm)
                    {
                    window.location = "./allBlogs.php?sort="+elm.value;
                    }
                </script>
            </div>

            <div class="row">
                <?
                    $result_allBlogs = $con->query($query_allBlogs); 
                    if ($result_allBlogs->num_rows > 0)
                    { 
                        while($row = $result_allBlogs->fetch_assoc()) 
                        { 
                ?>
                            
                            <div class="col-lg-3 col-md-6">
                                <a href="./postPage.php?id=<?echo $row['id']?>" style="color:#777777;">
                                    <div class="card">
                                    <div class="card-body">
                                        <figure>
                                            <img class="card-img-top img-fluid"src="./uploads/postImages/<?echo $row['image']?>" alt="<?echo $row['title']?>">
                                        </figure>
                                        <div class="card_inner_body" style="padding: 5px 5px;">
                                            <h4 class="card-title"><?echo $row['title']?></h4>
                                            <p class="card-text">
                                                <?echo $row['excerpt']?>
                                            </p>
                                            <div class="d-flex justify-content-between donation align-items-center">
                                                <a href="./blogPage.php?id=<?echo $row['id']?>" class="primary_btn" style="line-height: 20px;"><?translate("Read","Devam&#305;n&#305; Oku...")?></a>
                                                <p><span class="lnr lnr-heart"></span> <?echo $row['views']?> <?translate("Views","G&ouml;r&uuml;nt&uuml;lenme")?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                <?
                        }
                    }
                ?>
                
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

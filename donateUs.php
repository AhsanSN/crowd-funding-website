<?include_once("global.php");?>
    <?


?>
<!doctype html>
<html lang="en">
     <?php include_once("./phpComponents/header.php")?>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <!—- ShareThis BEGIN -—>
<script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5d0a4c705b432800123988e3&product=sticky-share-buttons"></script>

<body>
        
        <!--================ Start Header Menu Area =================-->
         <?php include_once("./phpComponents/navbar.php")?>
        <!--================ End Header Menu Area =================-->
            
        <!--================ Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <style>
                #backImg{
                    background: rgba(0, 0, 0, 0) url("./img/about.jpg") no-repeat scroll center center;position: absolute;
                }
                </style>
                <div class="overlay bg-parallax" id='backImg' data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container" style="opacity: .8;border-radius: 20px;">
                    <div class="banner_content text-center">
                        <h2>F&#304;K&#304;R BAH&#199;IVANI</h2>
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
                                    <a href="./checkOutFikir.php">
                                        <button type="button" class="btn btn-primary primary_btn rounded">
                                          <?translate("Donate","ba&#287;&#305;&#351;lamak")?>
                                        </button>
                                        </a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details" >
                                
                                            <img class="card-img-top img-fluid" src="./img/about.jpg" alt="">
                                            <br>
                                <h2 style="margin-top:20px;">F&#304;K&#304;R BAH&#199;IVANI </h2>
                                <p class="excert">
                                    <?echo $excerpt?>
                                </p>
                                <p>
                                    This is our story of what we do and who we are.
                                </p>
                                
                            </div>
                                <?
                            }
                            ?>
                            
                            
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <?
                            if(!$noPageFound){
                                ?>
                            <aside class="single_sidebar_widget author_widget">
                                <img width="100" height="100" class="author_img rounded-circle" src="img/icon.png" alt="">
                                <h4>F&#304;K&#304;R BAH&#199;IVANI</h4>
                                <p><?translate("A crowd funding website for startups.", "Yeni ba&#351;layanlar i&ccedil;in bir kalabal&#305;k finansman web sitesi.")?></p>
                            </aside>
                            <?}?>
                            
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
<?include_once("global.php");?>

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
                    <h2>About Us</h2>
                    <p>This is all about you and us.</p>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

	<!--================ Start About Us Area =================-->
	<section class="about_area section_gap">
        <div class="container">
            <div class="row">	
                <div class="single_about row">
                    <div class="col-lg-6 col-md-12 text-center about_left">
                        <div class="about_thumb">
                            <img src="img/about-img.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 about_right">
                        <div class="about_content">
                            <h2>
                                We are nonprofit team <br>
                                    and work worldwide
                            </h2>
                            <p>
                                    Their multiply doesn't behold shall appear living heaven second 
                                    roo lights. Itself hath thing for won't herb forth gathered good 
                                    bear fowl kind give fly form winged for reason
                            </p>
                            <p>
                                    Land their given the seasons herb lights fowl beast whales it 
                                    after multiply fifth under to it waters waters created heaven 
                                    very fill agenc to. Dry creepeth subdue them kind night behold 
                                    rule stars him grass waters our without 
                            </p>
                            <a href="#" class="primary_btn">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End About Us Area =================-->

	<!--================Team Area =================-->
	<section class="team_area section_gap">
        <div class="container">
            <div class="main_title">
                <h2>Meet our voluteer</h2>
                <p>Creepeth called face upon face yielding midst is after moveth </p>
            </div>
            <div class="row team_inner">
                <div class="col-lg-3 col-md-6">
                    <div class="team_item">
                        <div class="team_img">
                            <img class="img-fluid" src="img/voluteer/v1.jpg" alt="">
                        </div>
                        <div class="team_name">
                            <h4>Alea Mirslava</h4>
                            <p>Party Manager</p>
                            <p class="mt-20">
                                So seed seed green that winged cattle in kath  moved us land years living.
                            </p>
                            <div class="social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="active"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-envelope-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team_item">
                        <div class="team_img">
                            <img class="img-fluid" src="img/voluteer/v2.jpg" alt="">
                        </div>
                        <div class="team_name">
                            <h4>Adam Virland</h4>
                            <p>Party Manager</p>
                            <p class="mt-20">
                                So seed seed green that winged cattle in kath  moved us land years living.
                            </p>
                            <div class="social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="active"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-envelope-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team_item">
                        <div class="team_img">
                            <img class="img-fluid" src="img/voluteer/v3.jpg" alt="">
                        </div>
                        <div class="team_name">
                            <h4>Adam Virland</h4>
                            <p>Party Manager</p>
                            <p class="mt-20">
                                So seed seed green that winged cattle in kath  moved us land years living.
                            </p>
                            <div class="social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="active"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-envelope-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team_item">
                        <div class="team_img">
                            <img class="img-fluid" src="img/voluteer/v4.jpg" alt="">
                        </div>
                        <div class="team_name">
                            <h4>Adam Virland</h4>
                            <p>Party Manager</p>
                            <p class="mt-20">
                                So seed seed green that winged cattle in kath  moved us land years living.
                            </p>
                            <div class="social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="active"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-envelope-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Team Area =================-->

	<!--================ Start CTA Area =================-->
	
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
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
<?include_once("global.php");?>

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
            
            background: linear-gradient(0deg, rgba(6, 13, 1, 0.3), rgba(6, 13, 1, 0.3)), url(./img/about.jpg) no-repeat scroll center center;
            background-size:cover
        }
    </style>
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container" style="background-color:purple;opacity: .8;border-radius: 20px;">
                <div class="banner_content text-center">
                    <h2><?translate("Terms and Conditions","&#350;artlar ve ko&#351;ullar")?></h2>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

	<!--================ Start About Us Area =================-->
    <!--================ End About Us Area =================-->

	<!--================Team Area =================-->
	<section class="team_area section_gap">
        <div class="container">
            <div class="main_title">
                <h2>Privacy Policy</h2>
                <p>Creepeth called face upon face yielding midst is after moveth </p>
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
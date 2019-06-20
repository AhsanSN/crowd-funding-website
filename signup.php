<?include_once("global.php");?>
    <?
if(isset($_POST['email'])&&isset($_POST['password'])){
    $errMsg="none";
    $email = $_POST['email'];
    $password = strtoupper(md5($_POST['password'].'hey1'));
    $query_selectedPost= "select * from fik_users where email= '$email' and password='$password'"; 
    $result_selectedPost = $con->query($query_selectedPost); 
    if ($result_selectedPost->num_rows > 0)
    { 
        //successfull login
        while($row = $result_selectedPost->fetch_assoc()) 
        { 
            $logged=1;
            $_SESSION['email'] = $email;
            $_SESSION['userId'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['password'] = $row['password'];
            ?>
            <script type="text/javascript">
                window.location = "./home.php";
            </script>
            <?
        }
    }
    else{
        // is email being used
        $query_selectedPost= "select * from fik_users where email= '$email'"; 
        $result_selectedPost = $con->query($query_selectedPost); 
        if ($result_selectedPost->num_rows > 0)
        { 
            //problem diagnosed: email correct, incorrect pass
            $errMsg = "Incorrect password.";

        }else{
            //emaail not taken. create new account
            $dateTime = time();
            $sql="insert into fik_users (`name`,`email`, `password`, `userImg`) values ('User','$email', '$password', 'profilePic.png')";
            if(!mysqli_query($con,$sql))
            {
                echo "err";
            }
            else{
                 $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
            
                ?>
            <script type="text/javascript">
                window.location = "./home.php";
            </script>
            <?
            }
            
        }
        
        
    }

}
else{
    //do nothing
    1;
}

?>
<!doctype html>
<html lang="en">
   <?php include_once("./phpComponents/header.php")?>
   <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1040613922228-irlsol6bncj8m8v83s95aaconj3gahh7.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

<body>
        
	<!--================ Start Header Menu Area =================-->
	<?php include_once("./phpComponents/navbar.php")?>
	
    <!--================ End Header Menu Area =================-->
        
    <!--================Home Banner Area =================-->
    
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Login/Signup</h2>
                    <p>Enter the global community.</p>
                    <?
                    if($errMsg!="none"){
                        ?>
                        <p class="title-heading" style="color: red;"><?echo $errMsg?></p>
                        <?
                    }
                    if($_GET['loginRequired']){echo
                        ' <p style="color:#ffc600;margin:2px;font-weight: bold;">You need to login first.</p>';
                    }
                    ?>
                </div>
                <br><br>
                <form class="row contact_form"  method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" id="name" name="email" placeholder="Email" required>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <input type="password" class="form-control" id="name" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn primary_btn">Login/Signup</button>
                        </div>
                    </form>
                    <!--
                    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark">hasdlkasd</div>
                    -->

            </div>
        </div>
    </section>
  
        
    <!--================ Start footer Area  =================-->	
    <?php include_once("./phpComponents/footer.php")?>
    <!--================ End footer Area  =================-->
    
    
    <!--================End Contact Success and Error message Area =================-->
        
        
        
        
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
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
        <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      }
    </script>

    </body>
</html>
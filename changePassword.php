<?include_once("global.php");?>
    <?
if(isset($_GET['token'])&&isset($_POST['password1'])){
    $password = $_POST['password1'];
    $password2 = $_POST['password2'];
    
        
    
    $errMsg="none";
    if($password==$password2){
        $password = mb_htmlentities( md5(md5(sha1($password)).'Anomoz'));
        $token = mb_htmlentities(($_GET['token']));
        $query_selectedPost= "select * from fik_changePasswordRequest where token= '$token'"; 
        $result_selectedPost = $con->query($query_selectedPost); 
        if ($result_selectedPost->num_rows > 0)
        { 
            //successfull login
            while($row = $result_selectedPost->fetch_assoc()) 
            { 
                $email = $row['email'];
                echo $email;
                $sql="update fik_users set password = '$password' where email='$email'";
                if(!mysqli_query($con,$sql))
                {
                    echo "err 1";
                }
                
                ?>
                <script type="text/javascript">
                    window.location = "./signup.php";
                </script>
                <?
            }
        }
        else{
            
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
   <meta name="google-signin-scope" content="profile email" >
    <meta name="google-signin-client_id" content="1040613922228-irlsol6bncj8m8v83s95aaconj3gahh7.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <style>
        a{
         text-decoration:none !important;
         }
         
          .myform{
              opacity: 0.94;
              margin-top:140px;
              margin-bottom:180px;
        position: relative;
        display: -ms-flexbox;
        display: flex;
        padding: 1rem;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 100%;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: 1.1rem;
        outline: 0;
        max-width: 500px;
         }
         .tx-tfm{
         text-transform:uppercase;
         }
         .mybtn{
         border-radius:50px;
         }
        
         .login-or {
         position: relative;
         color: #aaa;
         margin-top: 10px;
         margin-bottom: 10px;
         padding-top: 10px;
         padding-bottom: 10px;
         }
         .span-or {
         display: block;
         position: absolute;
         left: 50%;
         top: -2px;
         margin-left: -25px;
         background-color: #fff;
         width: 50px;
         text-align: center;
         }
         .hr-or {
         height: 1px;
         margin-top: 0px !important;
         margin-bottom: 0px !important;
         }
         .google {
         color:#666;
         width:100%;
         height:40px;
         text-align:center;
         outline:none;
         border: 1px solid lightgrey;
         }
          form .error {
         color: #ff0000;
         }
         #second{display:none;}
    </style>

<body>
        
    <!--================ Start Header Menu Area =================-->
    <?php include_once("./phpComponents/navbar.php")?>
    
    <!--================ End Header Menu Area =================-->
        
    <!--================Home Banner Area =================-->
    <style>
        .banner_area .banner_inner .overlay{
            background: linear-gradient(0deg, rgba(6, 13, 1, 0.3), rgba(6, 13, 1, 0.3)), url(./img/loginbackground.jpg) no-repeat scroll center center;
            background-size:cover
        }
    </style>
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="row">
            <div class="col-md-5 mx-auto">
            <div id="">
                <div class="myform form ">
                     <div class=" mb-3">
                         <div class="col-md-12 text-center">
                            <h1><?translate("Change Password", "Şifreyi Değiştir")?>
                            
                            </h1>
                            <p style="background-color:red;color:white;"><?if(isset($_GET['fail'])){translate("Email not found", "Emaile ait kullanıcı bulunamadı.");}?></p>
                            <p style="background-color:green;color:white;"><?if(isset($_GET['suc'])){translate("Email sent successfull.", "Mailinizi Lütfen Kontrol Ediniz.");}?></p>
                         </div>
                    </div>
                   <form action="" method="post" name="login">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Şifre</label>
                              <input type="password" name="password1"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Şifre" required>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Şifreyi Tekrar Giriniz.</label>
                              <input type="password" name="password2"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Şifreyi Tekrar Giriniz." required>
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm"><?translate("Change Password", "Şifreyi Değiştir")?></button>
                           </div>
                        </form>
                </div>
            </div>
        </div>
      </div>   
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

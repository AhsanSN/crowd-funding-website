<?include_once("global.php");?>
    <?
include_once("./phpComponents/checkSignupStatus.php");

//taking form action
if(isset($_POST["buttonAction"]))
{
    //image handeling
    $filename = "none";
    $target_dir = "./uploads/postImages/";
    $randomNo = md5(time().$session_name);
    $fileName_db = "Anomoz_"."$randomNo".basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . "Anomoz_"."$randomNo".basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if($_FILES["fileToUpload"]["tmp_name"]!="") {
        
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        $filename=basename( $_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $filename=basename( $_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    }

    
    $name= mb_htmlentities($_POST['name']);
    $about= mb_htmlentities($_POST['about']);
    $email= mb_htmlentities($_POST['email']);
    $old_password= mb_htmlentities( md5(md5(sha1( $_POST['old_password'])).'Anomoz'));
    $new_password1= mb_htmlentities( md5(md5(sha1( $_POST['new_password'])).'Anomoz'));
    $new_password2= mb_htmlentities( md5(md5(sha1( $_POST['new_password2'])).'Anomoz'));
    
    $country= mb_htmlentities($_POST['country']);
    $state= mb_htmlentities($_POST['state']);
    $city= mb_htmlentities($_POST['city']);
    $streetAddress= mb_htmlentities($_POST['streetAddress']);
    $identityNumber= mb_htmlentities($_POST['identityNumber']);
    
    
    
    //echo $name, $about, $email, $old_password, $new_password1, $new_password2;
    
    //change name and about
    $sql="UPDATE `fik_users` SET `name`='$name',`about`='$about', country='$country', identityNumber='$identityNumber', state='$state', city='$city', streetAddress='$streetAddress' WHERE id='$session_userId' and email='$email'";
    if(!mysqli_query($con,$sql))
        {
            echo "err";
        }
        else{
            $session_name = $name;
            $session_about = $about;
        }
    
    //chagne password
    if(($new_password1==$new_password2)&&($new_password2!="")){
        $new_password = $new_password1;
        $new_password = strtoupper(md5($new_password.'hey1'));
        $old_password = strtoupper(md5($old_password.'hey1'));
        if($old_password==$session_password){
            $sql="UPDATE `fik_users` SET `password`='$new_password' WHERE id='$session_userId' and email='$email' and password='$old_password'";
            if(!mysqli_query($con,$sql))
                {
                    echo "err";
                }
                else{
                    $session_password = $new_password;
                }
        }
    }
    
    //change picture
    if(($filename!="none") && ($uploadOk=='1')){
            $sql="UPDATE `fik_users` SET `userImg`='$fileName_db' WHERE id='$session_userId' and email='$email'";
        
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }else{
            $session_image = $fileName_db;
        }
    }
    
    ?>
    <script type="text/javascript">
                //window.location = "./home.php";
            </script>
    <?
}
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
                #backImg{
                    /**background: rgba(0, 0, 0, 0) url("https://img1.beachbodyimages.com/teambeachbody/image/upload/Teambeachbody/shared_assets/Shop/Nutrition/Shop-Nutrition-CDP/Hero/shop-nut-cdp-hero-bcb-launch-mbl-1920-500-en-us-030818.jpg") no-repeat scroll center center;position: absolute;**/
                
                    background: rgba(0, 0, 0, 0) url("./img/about.jpg") no-repeat scroll center center;position: absolute;
                }
            </style>
                            <div class="overlay bg-parallax" id="backImg" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                            <div class="container">
                                <div class="banner_content text-center">
                                    <h2><?translate("Settings","Ayarlar")?></h2>
                                    <p>
                                        <?translate("Change your account settings here.","Bilgilerinizi buradan değiştirebilirsiniz.")?>
                                    </p>
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
                                        <h2><?translate("Settings","Ayarlar")?></h2>
                                    <p>
                                        <?translate("Change your account settings here.","Bilgilerinizi buradan değiştirebilirsiniz.")?>
                                    </p>
                                    </div>

                               <form class="row contact_form" action="" method="post" id="contactForm" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="subject" name="email" value="<?echo $session_email?>" placeholder="<?translate("","")?>Email" readonly>
                                        </div>
                                        <div class="form-group">
                                            <h6><?translate("Name","Isim")?>:</h6>
                                            <input type="text" class="form-control" id="name" name="name" value="<?echo $session_name?>" placeholder="<?translate("Name","İsminiz")?>">
                                        </div>
                                        <div class="form-group">
                                            <h6><?translate("About [eg. Software Engineer]","Hakkınızda bir şeyler anlatın [Örnek, Bir yazılım mühendisiyim.]")?></h6>
                                            <input type="text" class="form-control" id="email" name="about" value="<?echo $session_about?>" placeholder="<?translate("About [eg. Software Engineer]","Hakkınızda bir şeyler anlatın [Örnek, Bir yazılım mühendisiyim.]")?>">
                                        </div>
                                        <div class="form-group">
                                            <h6><?translate("Change Profile Picture","Profil Resminizi Değiştirin")?></h6>
                                            <input class="btn btn-primary primary_btn rounded" style="background-color:#777;" type="file" name="fileToUpload" id="fileToUpload">
                                        </div>
                                        
                                        <div class="form-group">
                                            <h6><?translate("Identity Number","Identity Number")?>:</h6>
                                            <input type="text" maxlength="11" class="form-control" id="identityNumber" name="identityNumber" value="<?echo $session_identityNumber?>" placeholder="<?translate("Identity Number","Kimlik Numaranız")?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <h6><?translate("Address","Adresiniz")?></h6>
                                            <p>Ülke</p>
                                                <select name="country" class="countries form-control" id="countryId" style="margin-bottom:5px;">
                                                    <option value="<?echo $session_country?>"><?echo $session_country?></option>
                                                </select>
                                            <p>Eyalet</p>
                                                <select name="state" class="states form-control" id="stateId" style="margin-bottom:5px;">
                                                    <option value="<?echo $session_state?>" ><?echo $session_state?></option>
                                                </select>
                                            <p>Şehir</p>
                                                <select name="city" class="cities form-control" id="cityId" style="margin-bottom:5px;">
                                                    <option value="<?echo $session_city?>"><?echo $session_city?></option>
                                                </select>
                                            <p>İlçe/Sokak/Cadde/Bina No</p>
                                                <textarea name="streetAddress" class="form-control" placeholder="Enter your street address."><?if($session_streetAddress!=''){echo $session_streetAddress;}?></textarea>
                                        </div>
                                        

                                        
                                    </div>
                                    <div class="col-md-6" style="background-color:#ffd9d9;">
                                        <h4 style="padding:10px;text-align: center;"><?translate("Change Password","Şifrenizini Değiştirin")?></h4>
                                        <div class="form-group">
                                            <h6><?translate("Enter Old Password","Eski &#351;ifre giriniz")?></h6>
                                            <input type="password" class="form-control" id="password" name="old_password" placeholder="<?translate("Enter Old Password","Eski şifrenizi giriniz.")?>">
                                        </div>
                                        <div class="form-group">
                                            <h6><?translate("Enter new Password","Yeni &#351;ifreyi giriniz")?></h6>
                                            <input type="password" class="form-control" id="email" name="new_password1" placeholder="<?translate("Enter new Password","Yeni şifreyi giriniz.")?>">
                                        </div>
                                        <div class="form-group">
                                            <h6><?translate("Re-type New Password","Yeni &#351;ifreyi tekrar giriniz")?></h6>
                                            <input type="password" class="form-control" id="email" name="new_password2" placeholder="<?translate("Re-type New Password","Yeni &#351;ifreyi tekrar giriniz")?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" name="buttonAction" value="submit" class="btn primary_btn"><?translate("Save","Kaydet")?></button>
                                    </div>
                                </form>
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
                        
                        <!--gmaps Js-->
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
                        <script src="js/gmaps.min.js"></script>
                       
                        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
                        <script src="//geodata.solutions/includes/countrystatecity.js"></script>
            </body>

        </html>

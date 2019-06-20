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

    
    $name= $_POST['name'];
    $about= $_POST['about'];
    $email= $_POST['email'];
    $old_password= $_POST['old_password'];
    $new_password1= $_POST['new_password1'];
    $new_password2= $_POST['new_password2'];
    //echo $name, $about, $email, $old_password, $new_password1, $new_password2;
    
    //change name and about
    $sql="UPDATE `fik_users` SET `name`='$name',`about`='$about' WHERE id='$session_userId' and email='$email'";
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
            $sql="UPDATE `fik_users` SET `userImg`='$filename' WHERE id='$session_userId' and email='$email'";
        
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }else{
            $session_image = $filename;
        }
    }
        
    
    
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
                            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                            <div class="container">
                                <div class="banner_content text-center">
                                    <h2><?translate("Settings","Ayarlar")?></h2>
                                    <p>
                                        <?translate("Change your account settings here.","Hesap ayarlarını değiştir.")?>
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
                                        <?translate("Change your account settings here.","Hesap ayarlarını değiştir.")?>
                                    </p>
                                    </div>

                               <form class="row contact_form" action="" method="post" id="contactForm" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="subject" name="email" value="<?echo $session_email?>" placeholder="<?translate("","")?>Email" readonly>
                                        </div>
                                        <div class="form-group">
                                            <h6><?translate("Name","Isim")?>:</h6>
                                            <input type="text" class="form-control" id="name" name="name" value="<?echo $session_name?>" placeholder="<?translate("Name","Isim")?>">
                                        </div>
                                        <div class="form-group">
                                            <h6><?translate("About [eg. Software Engineer]","Hakkımızda [örnek, Yazılım Muhendisi]")?></h6>
                                            <input type="text" class="form-control" id="email" name="about" value="<?echo $session_about?>" placeholder="<?translate("About [eg. Software Engineer]","Hakkımızda [örnek, Yazılım Muhendisi]")?>">
                                        </div>
                                        <div class="form-group">
                                            <h6><?translate("Change Profile Picture","Profil resmini değiştir")?></h6>
                                            <input class="btn btn-primary primary_btn rounded" style="background-color:#777;" type="file" name="fileToUpload" id="fileToUpload">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6" style="background-color:#ffd9d9;">
                                        <h4 style="padding:10px;text-align: center;"><?translate("Change Password","Şifre değiştir")?></h4>
                                        <div class="form-group">
                                            <h6><?translate("Enter Old Password","Eski şifre giriniz")?></h6>
                                            <input type="password" class="form-control" id="password" name="old_password" placeholder="<?translate("Enter Old Password","Eski şifre giriniz")?>">
                                        </div>
                                        <div class="form-group">
                                            <h6><?translate("Enter new Password","Yeni şifreyi giriniz")?></h6>
                                            <input type="password" class="form-control" id="email" name="new_password1" placeholder="<?translate("Enter new Password","Yeni şifreyi giriniz")?>">
                                        </div>
                                        <div class="form-group">
                                            <h6><?translate("Re-type New Password","Yeni şifreyi tekrar giriniz")?></h6>
                                            <input type="password" class="form-control" id="email" name="new_password2" placeholder="<?translate("Re-type New Password","Yeni şifreyi tekrar giriniz")?>">
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
                        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
                        <script src="js/jquery.ajaxchimp.min.js"></script>
                        <script src="js/mail-script.js"></script>
                        <!--gmaps Js-->
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
                        <script src="js/gmaps.min.js"></script>
                        <script src="js/theme.js"></script>
            </body>

        </html>
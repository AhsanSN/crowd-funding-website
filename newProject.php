<?include_once("global.php");?>
<?
//taking form action
if(isset($_POST["buttonAction"]))
{
    //image handeling
    $filename = "none";
    $target_dir = "./uploads/postImages/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        $filename=basename( $_FILES["fileToUpload"]["name"]);
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    
    
    $buttonAction = $_POST["buttonAction"];
    $title= $_POST['project_title'];
    $excerpt= $_POST['project_excerpt'];
    $description= $_POST['project_description'];
    $goal= $_POST['project_goal'];
    $aboutMe = $_POST['project_aboutMe'];
    $category = $_POST['project_category'];
        
    if($buttonAction=="save"){
        if($filename!="none"){
            $sql="UPDATE `fik_draftProjects` SET `title`='$title',`excerpt`='$excerpt',`description`='$description',`goal`='$goal',`aboutMe`='$aboutMe',`category`='$category', `coverPhoto`='$filename' WHERE userId='$session_userId'";
        }
        else{
            $sql="UPDATE `fik_draftProjects` SET `title`='$title',`excerpt`='$excerpt',`description`='$description',`goal`='$goal',`aboutMe`='$aboutMe',`category`='$category' WHERE userId='$session_userId'";
        }
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }
        
    }
    if($buttonAction=="post"){
        //creating new post
        
        $query_savedProject= "select * from fik_draftProjects where userId='$session_userId' order by id asc limit 1"; 
        $result_savedProject = $con->query($query_savedProject); 
        if ($result_savedProject->num_rows > 0)
        { 
            while($row = $result_savedProject->fetch_assoc()) 
            { 
                $title= $row['title'];
                $excerpt= $row['excerpt'];
                $description= $row['description'];
                $goal= $row['goal'];
                $coverPhoto= $row['coverPhoto'];
                $aboutMe = $row['aboutMe'];
            }
        }
        
        $datePosted = time();
        $sql="insert into fik_posts (`title`, `excerpt`, `description`, `goal`, `image`, `category`, `datePosted`, `userId`, `aboutMe`) values ('$title', '$excerpt', '$description', '$goal', '$coverPhoto', '$category', '$datePosted', '$session_userId', '$aboutMe')";
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }
        
        
        $sql="UPDATE `fik_draftProjects` SET `title`='',`excerpt`='',`description`='',`goal`='0',`aboutMe`='$aboutMe',`category`='', `coverPhoto`='defaultCover.png' WHERE userId='$session_userId'";
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }
        
        ?>
        <script type="text/javascript">
            window.location = "./home.php";
        </script>
        <?
        
    }
    
}

//get saved project details
$query_savedProject= "select * from fik_draftProjects where userId='$session_userId' order by id asc limit 1"; 
$result_savedProject = $con->query($query_savedProject); 
if ($result_savedProject->num_rows > 0)
{ 
    while($row = $result_savedProject->fetch_assoc()) 
    { 
        $title= $row['title'];
        $excerpt= $row['excerpt'];
        $description= $row['description'];
        $goal= $row['goal'];
        $coverPhoto= $row['coverPhoto'];
        $aboutMe = $row['aboutMe'];
    }
}
else{
    //no template found
    $goal= 0;
    $userId = $session_userId;
    $coverPhoto= "defaultCover.png";
        
    $sql="insert into fik_draftProjects (`userId`, `goal`, `coverPhoto`) values ('$userId', '$goal', '$coverPhoto')";
    if(!mysqli_query($con,$sql))
    {
        echo "err";
    }
}


//categories
$query_categories = "select * from fik_postCategories order by name desc"; 
$result_categories = $con->query($query_categories); 

?>
<!doctype html>
<html lang="en">
     <?php include_once("./phpComponents/header.php")?>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                        <h2>New Project</h2>
                        <p>Tell the world about your idea and gain a huge community support</p>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area section_gap">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12">

                                <div class="feature-img" >
                                    <input class="btn btn-primary primary_btn rounded" style="background-color:#777;" type="file" name="fileToUpload" id="fileToUpload">
                                    <img class="img-fluid" src="./uploads/postImages/<?echo $coverPhoto?>" alt="">
                                </div>		
                            </div>
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    <div class="col-lg-7">
                                        
                                        <button type="submit" name="buttonAction" value="post" class="btn btn-primary primary_btn rounded" data-toggle="modal" >
                                          Post
                                        </button>
                                        
                    				</div>
                    				<div class="col-lg-7" style="padding-top:7px;">
                                        
                                        <button type="submit" name="buttonAction" value="save" class="btn btn-primary primary_btn rounded" style="background-color:#22a7b1;" data-toggle="modal" >
                                          Save
                                        </button>
                                        
                    				</div>
                    				<hr>
                                       <select name="project_category" class="form-control" id="exampleFormControlSelect1" style="width:1000px;">
                                           <?
                                           if ($result_categories->num_rows > 0)
                                            { 
                                                while($row = $result_categories->fetch_assoc()) 
                                                { 
                                                    ?><option value="<?echo $row['name']?>" style="width:1000px;"><?echo $row['name']?></option><?
                                                }
                                            }
                                           ?>
                                          
                                        </select>
                                    <br>
                                    <p>Goal?</p>
                                    <input class="form-control mb-10" type="number" rows="5" name="project_goal" id="new_comment"  value="<?echo $goal?>" placeholder="Cash goal? ($)"  required="">
                                    <hr>
                                    <ul class="blog_meta list">
                                        <li><a href="#"><?echo $session_name?><i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#"><?echo date("d-m-Y")?><i class="lnr lnr-calendar-full"></i></a></li>
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h2>
                                    <input class="form-control mb-10" rows="5" name="project_title" id="new_comment" value="<?echo $title?>" placeholder="Title of your project?"  required="">
                                </h2>
                                <style>
                                    .excerpt-textarea {
                                       resize: none;
                                    }
                                </style>
                                <p class="excert">
                                   <textarea class="form-control mb-10 excerpt-textarea" rows="5" name="project_excerpt" placeholder="Describe your project in few words for the readers."  required=""><?echo $excerpt?></textarea>
                                </p>
                                <p>
                                    <textarea class="form-control mb-10" rows="5" name="project_description" id="new_comment"  placeholder="Describe your project in detail.&#10;Tell your reader, what is your prject all about?&#10;What work does your startup do?"  required=""><?echo $description?></textarea>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget author_widget">
                                <img width="100" height="100" class="author_img rounded-circle" src="./uploads/postImages/<?echo $session_image?>" alt="">
                                <h4><?echo $session_name?></h4>
                                <p><?echo $session_about?></p>
                            </aside>
                            <hr>
                            <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="project_aboutMe" placeholder="Tell people about yourself." required=""><?echo $aboutMe?></textarea>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
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
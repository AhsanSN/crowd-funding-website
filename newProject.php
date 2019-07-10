<?include_once("global.php");?>
<?
include_once("./phpComponents/checkLoginStatus.php");
//taking form action
if(isset($_POST["buttonAction"]))
{
    //image handeling
    $filename = "none";
    $target_dir = "./uploads/postImages/";
    $target_file = $target_dir . mb_htmlentities(basename($_FILES["fileToUpload"]["name"]));
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
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "mp4" && $imageFileType != "avi") {
        echo "Sorry, only JPG, JPEG, PNG, MP4 & GIF files are allowed.";
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
    }
    
    
    $buttonAction = htmlspecialchars($_POST["buttonAction"]);
    $title= mb_htmlentities($_POST['project_title']);
    $excerpt= mb_htmlentities($_POST['project_excerpt']);
    $description= mb_htmlentities($_POST['project_description']);
    $goal= mb_htmlentities($_POST['project_goal']);
    $aboutMe = mb_htmlentities($_POST['project_aboutMe']);
    $category = mb_htmlentities($_POST['project_category']);
    
    //rewards 
    $reward1Price = mb_htmlentities($_POST['reward1Prize']);
    $reward2Price = mb_htmlentities($_POST['reward2Prize']);
    $reward3Price = mb_htmlentities($_POST['reward3Prize']);
    $reward4Price = mb_htmlentities($_POST['reward4Prize']);
    $reward5Price = mb_htmlentities($_POST['reward5Prize']);
    $reward6Price = mb_htmlentities($_POST['reward6Prize']);
    $reward7Price = mb_htmlentities($_POST['reward7Prize']);
    
    $reward0Price = mb_htmlentities($_POST['reward0Prize']);
    
    $reward1EstimatedTime = mb_htmlentities($_POST['reward1EstimatedTime']);
    $reward2EstimatedTime = mb_htmlentities($_POST['reward2EstimatedTime']);
    $reward3EstimatedTime = mb_htmlentities($_POST['reward3EstimatedTime']);
    $reward4EstimatedTime = mb_htmlentities($_POST['reward4EstimatedTime']);
    $reward5EstimatedTime = mb_htmlentities($_POST['reward5EstimatedTime']);
    $reward6EstimatedTime = mb_htmlentities($_POST['reward6EstimatedTime']);
    $reward7EstimatedTime = mb_htmlentities($_POST['reward7EstimatedTime']);
    
    $reward0EstimatedTime = mb_htmlentities($_POST['reward0EstimatedTime']);
    

    if($buttonAction=="save"){
        $postId = md5((strval(1)).(strval(mt_rand(111111111, 999999999))));
        if($filename!="none"){
            $sql="UPDATE `fik_draftProjects` SET `postRewardId`='$postId', `title`='$title',`excerpt`='$excerpt',`description`='$description',`goal`='$goal',`aboutMe`='$aboutMe',`category`='$category', `coverPhoto`='$filename' WHERE userId='$session_userId'";
        }
        else{
            $sql="UPDATE `fik_draftProjects` SET `postRewardId`='$postId', `title`='$title',`excerpt`='$excerpt',`description`='$description',`goal`='$goal',`aboutMe`='$aboutMe',`category`='$category' WHERE userId='$session_userId'";
        }
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }
        else{
            //add enteries for rewards  
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', '6fc9c09eb90bcaf4dcd95a1a24e299a7', '$reward1Price', '$reward1EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 1";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', 'b2d5e6dbc0a98d106d70dafe524fc365', '$reward2Price', '$reward2EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 2";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', '5968406e99c2d10164452ac410db67f1', '$reward3Price', '$reward3EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 3";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', '15', '$reward4Price', '$reward4EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 4";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', 'f693fd750bd7d7ebf150fa6c9118717d', '$reward5Price', '$reward5EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 5";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', '9892bf01b944967108a473baaac47831', '$reward6Price', '$reward6EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 6";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', '4ac4f4b9ebca6674dedcbbcba1952ea0', '$reward7Price', '$reward7EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 7";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', 'item0', '$reward0Price', '$reward0EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 0";
            }
        }
        
    }
    if($buttonAction=="post"){
        //save first
        $postId = md5((strval(1)).(strval(mt_rand(111111111, 999999999))));
        if($filename!="none"){
            $sql="UPDATE `fik_draftProjects` SET `postRewardId`='$postId', `title`='$title',`excerpt`='$excerpt',`description`='$description',`goal`='$goal',`aboutMe`='$aboutMe',`category`='$category', `coverPhoto`='$filename' WHERE userId='$session_userId'";
        }
        else{
            $sql="UPDATE `fik_draftProjects` SET `postRewardId`='$postId', `title`='$title',`excerpt`='$excerpt',`description`='$description',`goal`='$goal',`aboutMe`='$aboutMe',`category`='$category' WHERE userId='$session_userId'";
        }
        if(!mysqli_query($con,$sql))
        {
            echo "err fik_draftProjects";
        }else{
            //add enteries for rewards  
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', '6fc9c09eb90bcaf4dcd95a1a24e299a7', '$reward1Price', '$reward1EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 1";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', 'b2d5e6dbc0a98d106d70dafe524fc365', '$reward2Price', '$reward2EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 2";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', '5968406e99c2d10164452ac410db67f1', '$reward3Price', '$reward3EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 3";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', '15', '$reward4Price', '$reward4EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 4";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', 'f693fd750bd7d7ebf150fa6c9118717d', '$reward5Price', '$reward5EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 5";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', '9892bf01b944967108a473baaac47831', '$reward6Price', '$reward6EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 6";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', '4ac4f4b9ebca6674dedcbbcba1952ea0', '$reward7Price', '$reward7EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 7";
            }
            $sql="insert into fik_rewards (`postRewardId`, `object`, `reward`, `deliveryTime`) values ('$postId', 'item0', '$reward0Price', '$reward0EstimatedTime')";
            if(!mysqli_query($con,$sql))
            {
                echo "err 0";
            }
        }
        
        
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
        $sql="insert into fik_postApproval (`postRewardId`, `title`, `excerpt`, `description`, `goal`, `image`, `category`, `datePosted`, `userId`, `aboutMe`) values ('$postId', '$title', '$excerpt', '$description', '$goal', '$coverPhoto', '$category', '$datePosted', '$session_userId', '$aboutMe')";
        if(!mysqli_query($con,$sql))
        {
            echo "err e1";
        }
        
        
        $sql="UPDATE `fik_draftProjects` SET `title`='',`excerpt`='',`description`='',`goal`='0',`aboutMe`='$aboutMe',`category`='', `coverPhoto`='defaultCover.png' WHERE userId='$session_userId'";
        if(!mysqli_query($con,$sql))
        {
            echo "err e2";
        }
        
        ?>
        <script type="text/javascript">
            window.location = "./home.php?pendingApproval=1";
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
        $postRewardId = $row['postRewardId'];
    }
    
    //find draft rewards
    $arr_prize = array();
    $arr_deliveryTime = array();
    $query_rewards= "select * from fik_rewards r where postRewardId= '$postRewardId' order by id asc"; 
    $result_rewards = $con->query($query_rewards);
    if ($result_rewards->num_rows > 0)
    { 
        while($row = $result_rewards->fetch_assoc()) 
        { 
             array_push($arr_prize,$row['reward']);
             array_push($arr_deliveryTime,$row['deliveryTime']);
        }
    }
    //echo '<pre>'; print_r($arr_prize); echo '</pre>';
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
     <?php include_once("./phpComponents/header.php")?>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <style>
            video {
    object-fit: fill;
}
        </style>
        <script type="text/javascript" src="scripts/wysiwyg.js"></script>
        <script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
        <script type="text/javascript">
            // Use it to attach the editor to all textareas with full featured setup
            //WYSIWYG.attach('all', full);
            
            // Use it to attach the editor directly to a defined textarea
            WYSIWYG.attach('textarea2', full); // full featured setup
            
            // Use it to display an iframes instead of a textareas
            //WYSIWYG.display('all', full);  
        </script>
<body>

        <!--================ Start Header Menu Area =================-->
         <?php include_once("./phpComponents/navbar.php")?>
        <!--================ End Header Menu Area =================-->
            
        <!--================ Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <style>
        .banner_area .banner_inner .overlay{
            
            background: linear-gradient(0deg, rgba(6, 13, 1, 0.3), rgba(6, 13, 1, 0.3)), url(./img/garden.jpg) no-repeat scroll center center;
            background-size:cover
        }
    </style>
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2><?translate("New Project","Yeni proje")?></h2>
                        <p><?translate("Tell the world about your idea and gain a huge community support","D&#252;nyaya fikrinizden bahsedin ve b&#252;y&#252;k bir topluluk deste&#287;i edinin")?></p>
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
                                </div>      
                            </div>
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    <div class="col-lg-7">
                                        <?if(($title=="")||($excerpt=="")||($description=="")||($coverPhoto=="")){
                                        }else{?>
                                        <button type="submit" name="buttonAction" value="post" class="btn btn-primary primary_btn rounded" data-toggle="modal" >
                                          <?translate("Post","g&#246;nderi")?>
                                        </button>
                                        <?}?>
                                        
                                    </div>
                                    <div class="col-lg-7" style="padding-top:7px;">
                                        
                                        <button type="submit" name="buttonAction" value="save" class="btn btn-primary primary_btn rounded" style="background-color:#22a7b1;" data-toggle="modal" >
                                          <?translate("Save","Kaydet")?>
                                        </button>
                                        
                                    </div>
                                    <hr>
                                       <select name="project_category" class="form-control mb-10" id="exampleFormControlSelect1" style="width:100%;">
                                           <?
                                           if ($result_categories->num_rows > 0)
                                            { 
                                                while($row = $result_categories->fetch_assoc()) 
                                                { 
                                                    ?><option value="<?echo $row['name']?>" ><?echo $row['name']?></option><?
                                                }
                                            }
                                           ?>
                                          
                                        </select>
                                    <br>
                                    <p><?translate("Goal?","Hedef")?></p>
                                    <input class="form-control mb-10" type="number" rows="5" name="project_goal" value="<?echo $goal?>" placeholder="<?translate('Cash goal?','Nakit hedefi?')?> (&#8378;)"  required="">
                                    <hr>
                                    <ul class="blog_meta list">
                                        <li><a href="#"><?echo $session_name?><i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#"><?echo date("d-m-Y")?><i class="lnr lnr-calendar-full"></i></a></li>
                                    </ul>
                                    
                                </div>
                            </div>
                            <style>
                                .videoImg {
                                    position: relative;
                                    z-index: 0;
                                    background: url(mel.jpg) no-repeat;
                                    background-size: 100% 100%;
                                    top: 0px;
                                    left: 0px; /* fixed to left. Replace it by right if you want.*/
                                    width: 100%;
                                    height: auto;
                                }
                            </style>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <?
                                    if(substr($coverPhoto,-3)=="mp4"){
                                    ?>
                                    <video class="videoImg" controls loop autoplay>
                                      <source src="./uploads/postImages/<?echo $coverPhoto?>" type="video/mp4">
                                    </video>
                                    <?}else{?>
                                    
                                    <img class="img-fluid videoImg" src="./uploads/postImages/<?echo $coverPhoto?>" alt="">
                                    <?}?>
                                    <hr>
                                <h2>
                                    <input class="form-control mb-10" rows="5" name="project_title"  maxlength="65" value="<?echo $title?>" placeholder="<?translate('Title of your project?','projenin ba&#351;l&#305;&#287;&#305;?')?>"  required="">
                                </h2>
                                <style>
                                    .excerpt-textarea {
                                       resize: none;
                                    }
                                </style>
                                <p class="excert">
                                   <textarea class="form-control mb-10 excerpt-textarea" rows="5" maxlength="93" name="project_excerpt" placeholder="<?translate('Describe your project in few words for the readers.','okuyucular i&#231;in bir ka&#231; kelimeyle blo&#287;unu tan&#305;mla')?>"  required=""><?echo $excerpt?></textarea>
                                </p>
                                
                                <p style="width=130%" >
                                        <?translate('Describe your project in detail.','Projenizi ayr&#305;nt&#305;l&#305; olarak tan&#305;mlay&#305;n.')?>
                                    <textarea style="width=130%" class="form-control mb-10" rows="5" name="project_description" id="textarea2" ><?echo $description?></textarea>
                                </p>
                                
                                <hr>
                                
                                <h4 class="card-title">Rewards</h4>
                                <style>
                                         /* Three image containers (use 25% for four, and 50% for two, etc) */
                                        .column {
                                          float: left;
                                          width: 27.33%;
                                          padding: 5px;
                                          margin:3px;
                                          text-align:center;
                                           border-radius: 25px;
                                           border: 2px solid #60bc0f !important;
                                        }
                                        
                                        /* Clear floats after image containers */
                                        .row::after {
                                          content: "";
                                          clear: both;
                                          display: table;
                                          text-align:center;
                                        } 
                                        
                                        .myBtn{
                                            color:white;background-color:#60bc0f;font-size:12px;padding:4px;margin-bottom:54px;border-radius: 3px;
                                        }
                                    </style>
                                
                                <div style="background-color:#c9ffc1;padding:10px;">
                                    <h4 style="padding:10px;text-align: center;">Yonca -  &#8378; 10</h4>
                                    <div style="text-align: center;">
                                        
                                        <div class="row" style="justify-content: center;" >
                                                  <div class="column" style="">
                                                    <img src="./uploads/postImages/toprak.png" alt="Snow" style="width:100%">
                                                    
                                                    <br>

                                                  </div>

                                                  <div class="column" style="">
                                                    <img src="./uploads/postImages/tohum.png" alt="Snow" style="width:100%">
                                                    
                                                    <br>

                                                  </div>

                                                  <div class="column" style="">
                                                    <img src="./uploads/postImages/sudamlasi.png" alt="Snow" style="width:100%">
                                                   
                                                    <br>

                                                  </div>

                                                </div> 
                                        
                                        
                                        <div class="row" style="justify-content: center;">
                                                  <div class="column" style="">
                                                      
                                                    <img src="./uploads/postImages/cicek.png" alt="Snow" style="width:100%">
                                                   
                                                    
                                                  </div>
                                                  <div class="column">
                                                    <img src="./uploads/postImages/gul.png" alt="Forest" style="width:100%">
                                                    
                                                  </div>
                                                  <div class="column" >
                                                    <img src="./uploads/postImages/orkide.png" alt="Mountains" style="width:100%">
                                                    
                                                  </div>
                                                </div> 
                                        
                                        
                                    </div>

                                    <div class="form-group">
                                        <h6><?translate("Reward","Reward")?></h6>
                                        <textarea type="text" class="form-control" id="reward0Prize" name="reward0Prize" placeholder="<?translate("Reward","Reward")?>"><?echo $arr_prize[7]?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <h6><?translate("Estimated Time","Estimated Time")?></h6>
                                        <input type="text" class="form-control" id="reward0EstimatedTime" name="reward0EstimatedTime" placeholder="<?translate("Estimated Time","Estimated Time")?>" value="<?echo $arr_deliveryTime[7]?>">
                                    </div>
                                </div>
                                <br>
                                
								<div style="background-color:#c9ffc1;padding:10px;">
                                    <h4 style="padding:10px;text-align: center;">Yonca -  &#8378; 10</h4>
                                    <div style="text-align: center;">
                                        <img style="padding-top:15px;padding-bottom:15px; margin: 0 auto;"  width="130" height="130" src="./uploads/postImages/yonca.png"   alt="post">
                                    </div>

                                    <div class="form-group">
                                        <h6><?translate("Reward","Reward")?></h6>
                                        <textarea type="text" class="form-control" id="reward1Prize" name="reward1Prize" placeholder="<?translate("Reward","Reward")?>"><?echo $arr_prize[0]?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <h6><?translate("Estimated Time","Estimated Time")?></h6>
                                        <input type="text" class="form-control" id="reward1EstimatedTime" name="reward1EstimatedTime" placeholder="<?translate("Estimated Time","Estimated Time")?>" value="<?echo $arr_deliveryTime[0]?>">
                                    </div>
                                </div>
                                
                                
                                <br>
                                <div style="background-color:#c9ffc1;padding:10px;">
                                    <h4 style="padding:10px;text-align: center;">&Ccedil;i&ccedil;ek Demeti -  &#8378; 25</h4>
                                    <div style="text-align: center;">
                                        <img style="padding-top:15px;padding-bottom:15px; margin: 0 auto;"  width="130" height="130" src="./uploads/postImages/demet.png"   alt="post">
                                    </div>
                                    
                                    <div class="form-group">
                                        <h6><?translate("Reward","Reward")?></h6>
                                        <textarea type="text" class="form-control" id="reward1Prize" name="reward2Prize" placeholder="<?translate("Reward","Reward")?>"><?echo $arr_prize[1]?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <h6><?translate("Estimated Time","Estimated Time")?></h6>
                                        <input type="text" class="form-control" id="reward2EstimatedTime" name="reward2EstimatedTime" placeholder="<?translate("Estimated Time","Estimated Time")?>" value="<?echo $arr_deliveryTime[1]?>">
                                    </div>
                                </div>
                                <br>
                                <div style="background-color:#c9ffc1;padding:10px;">
                                    <h4 style="padding:10px;text-align: center;">Budama Makas&#305; -  &#8378; 50</h4>
                                    <div style="text-align: center;">
                                        <img style="padding-top:15px;padding-bottom:15px; margin: 0 auto;"  width="130" height="130" src="./uploads/postImages/budamamakasi.png"   alt="post">
                                    </div>
                                    
                                    <div class="form-group">
                                        <h6><?translate("Reward","Reward")?></h6>
                                        <textarea type="text" class="form-control" id="reward1Prize" name="reward3Prize" placeholder="<?translate("Reward","Reward")?>"><?echo $arr_prize[2]?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <h6><?translate("Estimated Time","Estimated Time")?></h6>
                                        <input type="text" class="form-control" id="reward3EstimatedTime" name="reward3EstimatedTime" placeholder="<?translate("Estimated Time","Estimated Time")?>" value="<?echo $arr_deliveryTime[2]?>">
                                    </div>
                                </div>
                                <br>
                                <div style="background-color:#c9ffc1;padding:10px;">
                                    <h4 style="padding:10px;text-align: center;">Fidan -  &#8378; 100</h4>
                                    <div style="text-align: center;">
                                        <img style="padding-top:15px;padding-bottom:15px; margin: 0 auto;"  width="130" height="130" src="./uploads/postImages/fidan.png"   alt="post">
                                    </div>
                                    
                                    <div class="form-group">
                                        <h6><?translate("Reward","Reward")?></h6>
                                        <textarea type="text" class="form-control" id="reward1Prize" name="reward4Prize" placeholder="<?translate("Reward","Reward")?>"><?echo $arr_prize[3]?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <h6><?translate("Estimated Time","Estimated Time")?></h6>
                                        <input type="text" class="form-control" id="reward4EstimatedTime" name="reward4EstimatedTime" placeholder="<?translate("Estimated Time","Estimated Time")?>" value="<?echo $arr_deliveryTime[3]?>">
                                    </div>
                                </div>
                                <br>
                                <div style="background-color:#c9ffc1;padding:10px;">
                                    <h4 style="padding:10px;text-align: center;">El Arabas&#305; -  &#8378; 250</h4>
                                    <div style="text-align: center;">
                                        <img style="padding-top:15px;padding-bottom:15px; margin: 0 auto;"  width="130" height="130" src="./uploads/postImages/elarabasi.png"   alt="post">
                                    </div>
                                    
                                    <div class="form-group">
                                        <h6><?translate("Reward","Reward")?></h6>
                                        <textarea type="text" class="form-control" id="reward1Prize" name="reward5Prize" placeholder="<?translate("Reward","Reward")?>"><?echo $arr_prize[4]?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <h6><?translate("Estimated Time","Estimated Time")?></h6>
                                        <input type="text" class="form-control" id="reward5EstimatedTime" name="reward5EstimatedTime" placeholder="<?translate("Estimated Time","Estimated Time")?>" value="<?echo $arr_deliveryTime[4]?>">
                                    </div>
                                </div>
                                <br>
                                <div style="background-color:#c9ffc1;padding:10px;">
                                    <h4 style="padding:10px;text-align: center;">Meyve A&#287;ac&#305; -  &#8378; 500</h4>
                                    <div style="text-align: center;">
                                        <img style="padding-top:15px;padding-bottom:15px; margin: 0 auto;"  width="130" height="130" src="./uploads/postImages/agac.png"   alt="post">
                                    </div>
                                    
                                    <div class="form-group">
                                        <h6><?translate("Reward","Reward")?></h6>
                                        <textarea type="text" class="form-control" id="reward1Prize" name="reward6Prize" placeholder="<?translate("Reward","Reward")?>"><?echo $arr_prize[5]?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <h6><?translate("Estimated Time","Estimated Time")?></h6>
                                        <input type="text" class="form-control" id="reward6EstimatedTime" name="reward6EstimatedTime" placeholder="<?translate("Estimated Time","Estimated Time")?>" value="<?echo $arr_deliveryTime[5]?>">
                                    </div>
                                </div>
                                <br>
                                <div style="background-color:#c9ffc1;padding:10px;">
                                    <h4 style="padding:10px;text-align: center;">Bah&ccedil;&#305;van Ailesi -  &#8378; 1000</h4>
                                    <div style="text-align: center;">
                                        <img style="padding-top:15px;padding-bottom:15px; margin: 0 auto;"  width="130" height="130" src="./uploads/postImages/gelecek.png"   alt="post">
                                    </div>
                                    
                                    <div class="form-group">
                                        <h6><?translate("Reward","Reward")?></h6>
                                        <textarea type="text" class="form-control" id="reward1Prize" name="reward7Prize" placeholder="<?translate("Reward","Reward")?>"><?echo $arr_prize[6]?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <h6><?translate("Estimated Time","Estimated Time")?></h6>
                                        <input type="text" class="form-control" id="reward7EstimatedTime" name="reward7EstimatedTime" placeholder="<?translate("Estimated Time","Estimated Time")?>" value="<?echo $arr_deliveryTime[6]?>">
                                    </div>
                                </div>
                                
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
                                <textarea class="form-control mb-10" rows="5"  name="project_aboutMe" maxlength="200" placeholder="<?translate('Tell people about yourself.','İnsanlara kendinden bahset.')?>" required=""><?echo $aboutMe?></textarea>
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
        
        
        
     
    </body>
</html>
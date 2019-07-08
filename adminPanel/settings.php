<?include_once("global.php");?>
<?
if ($logged==0){ 
    ?>
    <script type="text/javascript">
            window.location = "./";
        </script>
    <?
}

if(isset($_POST["name"]))
{
    //image handeling
    $filename = "none";
    $target_dir = "../uploads/postImages/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
    
    
    $name= mb_htmlentities($_POST['name']);
    $price= mb_htmlentities($_POST['price']);
    $description= mb_htmlentities($_POST['description']);
    $longDescription= $_POST['longDescription'];

   
    if(true){
        //save first
        
        if($filename!="none"){
            $itemId = md5(md5(sha1( mt_rand(111111111, 99999999999999999999999))).'Anomoz');
            $sql="insert into fik_shopItems (`id`, `name`, `price`, `description`, `image`, `longDescription`) values ('$itemId','$name', '$price', '$description', '$filename', '$longDescription')";
            if(!mysqli_query($con,$sql))
            {
                echo "err";
            }
            
        }
    }
    
}


if(isset($_POST["flagComment"])){
    $flagComment = $_POST["flagComment"];

if((!$flagComment)){
    $message = "Please insert both fields.";
    } 
else{ 

        //update room status
        $sql="insert into fik_postCategories (`name`) values ('$flagComment')";
    
        if(!mysqli_query($con,$sql))
        {
        echo"can not";
        }
       
        
}}


//remove option
if(isset($_GET["removeOption"])){
    $removeOption = $_GET["removeOption"];

if((!$removeOption)){
    $message = "Please insert both fields.";
    } 
else{ 

        //update room status
        $sql="delete from fik_postCategories where id='$removeOption'";
    
        if(!mysqli_query($con,$sql))
        {
        echo"can not";
        }
       
        
}}

$query_bookedRoomsList = "select * from fik_postCategories"; 
   
$query_shopList = "select * from fik_shopItems"; 

?>
<!DOCTYPE html>
<html lang="en">
<?include_once("./phpParts/log_head.php");?>


<body class="">
  <div class="wrapper ">
    <?include("./phpParts/sidebar.php")?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Settings</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            
        
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Categories</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                    
                    <table class="table">
                        <tbody>
                          <?php
                          $result_bookedRoomList = $con->query($query_bookedRoomsList); 
                            if ($result_bookedRoomList->num_rows > 0)
                            { 
                                while($row = $result_bookedRoomList->fetch_assoc()) 
                                { 
                                    echo "<tr>";
                                    echo "<td>".$row['name']."</td>";
                                    echo '<td><a href="./settings.php?removeOption='.$row['id'].'"><button class="btn btn-social btn-just-icon btn-google" style="background-color:red;"><i class="material-icons">cancel</i></button></a></td>';
                                    echo "</tr>";
                                }
                            }
                          ?>
                          
                        </tbody>
                      </table>
                      <tr>
                            <td>
                                <form method="post" action="" style="background-color:#f5eef6;padding:10px;">
                                    <label for="inputEmail4">Insert new category</label>
                                    <input name="flagComment" type="text" class="form-control" placeholder="" required>
                                    <button type="submit" class="btn btn-primary">Insert</button>
                                </form>
                            </td>
                          </tr>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Shop Items</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                    
                    <table class="table">
                        <tbody>
                          <?php
                          $result_shopList = $con->query($query_shopList); 
                            if ($result_shopList->num_rows > 0)
                            { 
                                while($row = $result_shopList->fetch_assoc()) 
                                { 
                                    echo "<tr>";
                                    echo "<td>".$row['name']." (".$row['price']." Liras)</td>";
                                    echo "<td>".$row['description']."</td>";
                                    //echo '<td><a href="./settings.php?removeOption='.$row['id'].'"><button class="btn btn-social btn-just-icon btn-google" style="background-color:red;"><i class="material-icons">cancel</i></button></a></td>';
                                    echo "</tr>";
                                }
                            }
                          ?>
                          
                        </tbody>
                      </table>
                      <tr>
                            <td>
                                <h3>Insert new Item</h3>
                                <form method="post" action="" style="background-color:#f5eef6;padding:10px;" enctype="multipart/form-data">
                                    <input name="name" type="text" class="form-control" placeholder="name" required>
                                    <input name="price" type="number" class="form-control" placeholder="price" required>
                                    <textarea name="description" type="text" class="form-control" placeholder="about" required></textarea>
                                    <textarea name="longDescription" type="text" class="form-control" placeholder="long description" required></textarea>
                                    <input class="btn btn-primary primary_btn rounded" style="background-color:#777;" type="file" name="fileToUpload" id="fileToUpload" required>
                                    <button type="submit" class="btn btn-primary">Insert</button>
                                </form>
                            </td>
                          </tr>
                  </div>
                </div>
            </div>
          </div>
        </div>
        
   

      </div>
     <?include_once("./phpParts/footer.php");?>

</body>

</html>

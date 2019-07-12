<?include_once("global.php");?>
<!DOCTYPE html>
<html lang="en">
<?include("./phpParts/log_head.php");

if(isset($_POST['name']) && isset($_GET['id'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $id = $_GET['id'];
    
    $sql="update fik_shopItems set name='$name', price = '$price', description = '$description' where id='$id'";
    if(!mysqli_query($con,$sql))
    {
        echo "err";
    }
    else{
        ?>
        <script type="text/javascript">
        window.location = "./settings.php";
        console.log("back;")
        </script>
        <?
    }
}

$id = $_GET['id'];
$query_bookedRoomsList = "select * from fik_shopItems where id='$id'"; 
$result_bookedRoomList = $con->query($query_bookedRoomsList); 
if ($result_bookedRoomList->num_rows > 0)
{ 
    while($row = $result_bookedRoomList->fetch_assoc()) 
    { 
        $raw_name = $row['name'];
        $raw_price = $row['price'];
        $raw_description = $row['description'];
    }
}



?>
<body class="">
<?
if ($logged==0){ 
    ?>
    <script type="text/javascript">
            window.location = "./";
        </script>
    <?
}

?>

  <div class="wrapper ">
    <?include("./phpParts/sidebar.php")?>
    <div class="main-panel">
        <div class="container-fluid">
          <div class="row">
            
        
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Item Details</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <form method="post" action="" style="background-color:#f5eef6;padding:10px;border-radius:7px;">
                        <input name="name" type="text" class="form-control" placeholder="Name" value="<?echo $raw_name?>" required>
                        <input name="price" type="text" class="form-control" placeholder="Price" value="<?echo $raw_price?>" required>
                        <textarea name="description" type="text" class="form-control" placeholder="description" required><?echo $raw_description?></textarea>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                  </div>
                </div>
            </div>
  
          </div>
        </div>
   
      </div>
      <!-- Navbar -->
      <?include("./phpParts/navBar.php")?>


            

</body>

</html>

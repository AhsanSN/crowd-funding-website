<?include_once("global.php");?>
<!DOCTYPE html>
<html lang="en">
<?include("./phpParts/log_head.php");

if(isset($_GET['view'])){
    $id = $_GET['view'];
}

if(isset($_GET['approve'])){
    $id = $_GET['approve'];
    
    
    $query_bookedRoomsList = "select * from fik_postApproval where id='$id' and decision=''"; 
    $result_bookedRoomList = $con->query($query_bookedRoomsList); 
    if ($result_bookedRoomList->num_rows > 0)
    { 
        while($row = $result_bookedRoomList->fetch_assoc()) 
        { 
            $title = $row['title'];
            $excerpt = $row['excerpt'];
            $description = $row['description'];
            $goal = $row['goal'];
            $image = $row['image'];
            $category = $row['category'];
            $datePosted = $row['datePosted'];
            $userId = $row['userId'];
            $aboutMe = $row['aboutMe'];
        }
    }

    
    $datePosted = time();
    
        $sql="insert into fik_posts (`title`, `excerpt`, `description`, `goal`, `image`, `category`, `datePosted`, `userId`, `aboutMe`) values ('$title', '$excerpt', '$description', '$goal', '$image', '$category', '$datePosted', '$userId', '$aboutMe')";
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }
        
        
        $sql="update fik_postApproval set decision='posted' where id='$id'";
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }
        
        
        
        ?>
            <script type="text/javascript">
                window.location = "./dashboard.php";
            </script>
            <?
        
}


if(isset($_GET['reject'])){
    $id = $_GET['reject'];
    
    
    $query_bookedRoomsList = "select * from fik_postApproval where id='$id'"; 
    $result_bookedRoomList = $con->query($query_bookedRoomsList); 
    if ($result_bookedRoomList->num_rows > 0)
    { 
        while($row = $result_bookedRoomList->fetch_assoc()) 
        { 
            $title = $row['title'];
            $excerpt = $row['excerpt'];
            $description = $row['description'];
            $goal = $row['goal'];
            $image = $row['image'];
            $category = $row['category'];
            $datePosted = $row['datePosted'];
            $userId = $row['userId'];
            $aboutMe = $row['aboutMe'];
        }
    }

    
    $datePosted = time();
    
    
        
        $sql="update fik_postApproval set decision='rejected' where id='$id'";
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }
        
        
        ?>
            <script type="text/javascript">
                window.location = "./dashboard.php";
            </script>
            <?
        
        
}

$query_bookedRoomsList = "select * from fik_postApproval where id='$id' and decision=''"; 
$result_bookedRoomList = $con->query($query_bookedRoomsList); 
if ($result_bookedRoomList->num_rows > 0)
{ 
    while($row = $result_bookedRoomList->fetch_assoc()) 
    { 
        $title = $row['title'];
        $excerpt = $row['excerpt'];
        $description = $row['description'];
        $goal = $row['goal'];
        $image = $row['image'];
        $category = $row['category'];
        $ddatePosted = $row['datePosted'];
        $userId = $row['userId'];
        $aboutMe = $row['aboutMe'];
    }
}
$description = str_replace('src="uploads/','src="../uploads/',$description);
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
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="./" class="simple-text logo-normal">
          Admin Panel
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active  ">
            <a class="nav-link" href="./viewProject.php?approve=<?echo $id?>" style="background-color:green;" >
              <p>Approve</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./viewProject.php?reject=<?echo $id?>" style="background-color:orange;">
              <p>Reject</p>
            </a>
          </li>
          
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="./settings.php">
              <i class="material-icons">settings</i>
              <p>Settings</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
        <div class="container-fluid">
          <div class="row">
            
        
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title "><?echo $title?>
                  
                  </h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                    
                    <table class="table">
                        <tbody>
                          Goal: <?echo $goal?> Liras
                          <br>
                          Excerpt: 
                          <br><?echo $excerpt?>
                          <br>
                          Category: <?echo $category?>
                          <br>
                          Cover:
                          <br>
                          <figure>
            								<img class="card-img-top img-fluid"src="../uploads/postImages/<?echo $image?>" alt="<?echo $image?>">
            							</figure>
                          <br>
                          About user: <br>
                          <?echo $aboutMe?>
                          <br>
                          Description: 
                          <br>
                          <?echo $description?>
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
   
      </div>
      <!-- Navbar -->


            

</body>

</html>

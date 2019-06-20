<?include_once("global.php");?>
<!DOCTYPE html>
<html lang="en">
<?include("./phpParts/log_head.php");

$query_bookedRoomsList = "select * from fik_postApproval where decision=''"; 

$query_blogComments = "select * from fik_blogComments"; 

$query_postComments = "select * from fik_postComments"; 

if(isset($_GET['deletePostComment'])){
   
    $id= $_GET['deletePostComment'];
    $sql="delete from fik_postComments where id='$id'";
    if(!mysqli_query($con,$sql))
    {
        echo "err";
    }
}

if(isset($_GET['deleteBlogComment'])){
   
    $id= $_GET['deleteBlogComment'];
    $sql="delete from fik_blogComments where id='$id'";
    if(!mysqli_query($con,$sql))
    {
        echo "err";
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

                  <h4 class="card-title ">Pending Posts</h4>
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
                                    echo "<td>".$row['title']."</td>";
                                    echo '<td><a href="./viewProject.php?view='.$row['id'].'"><button class="btn" style="background-color:green;">View</td>';
                                    echo "</tr>";
                                }
                            }
                          ?>
                          
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Blogs Comments</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                        <tbody>
                          <?php
                          $result_BlogComments = $con->query($query_blogComments); 
                            if ($result_BlogComments->num_rows > 0)
                            { 
                                while($row = $result_BlogComments->fetch_assoc()) 
                                { 
                                    echo "<tr>";
                                    echo "<td>".$row['comment']."</td>";
                                    echo '<td><a href="./dashboard.php?deleteBlogComment='.$row['id'].'"><button class="btn" style="background-color:green;">Delete</td>';
                                    echo "</tr>";
                                }
                            }
                          ?>
                          
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Posts Comments</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                    
                    <table class="table">
                        <tbody>
                          <?php
                          $result_postComments = $con->query($query_postComments); 
                            if ($result_postComments->num_rows > 0)
                            { 
                                while($row = $result_postComments->fetch_assoc()) 
                                { 
                                    echo "<tr>";
                                    echo "<td>".$row['comment']."</td>";
                                    echo '<td><a href="./dashboard.php?deletePostComment='.$row['id'].'"><button class="btn" style="background-color:green;">Delete</td>';
                                    echo "</tr>";
                                }
                            }
                          ?>
                          
                        </tbody>
                      </table>
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

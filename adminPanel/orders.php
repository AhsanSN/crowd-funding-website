<?include_once("global.php");?>
<!DOCTYPE html>
<html lang="en">
<?include("./phpParts/log_head.php");

$query_bookedRoomsList = "select * from fik_orders o inner join fik_users u on o.userId=u.id "; 


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

                  <h4 class="card-title ">Orders</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                    
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          OrderId
                        </th>
                        <th>
                          datePlaced
                        </th>
                        <th>
                          totalAmount
                        </th>
                        <th>
                          KDV
                        </th>
                        <th>
                          WithoutKDV
                        </th>
                        <th>
                          status
                        </th>
                        <th>
                          country
                        </th>
                        <th>
                          state
                        </th>
                        <th>
                          city
                        </th>
                        <th>        
                          streetAddress
                        </th>
                     
                      </thead>
                        <tbody>
                          <?php
                          $result_bookedRoomList = $con->query($query_bookedRoomsList); 
                            if ($result_bookedRoomList->num_rows > 0)
                            { 
                                while($row = $result_bookedRoomList->fetch_assoc()) 
                                { 
                                    echo "<tr>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['orderId']."</td>";
                                    echo "<td>".$row['datePlaced']."</td>";
                                    echo "<td>".$row['totalAmount']."</td>";
                                    echo "<td>".$row['KDV']."</td>";
                                    echo "<td>".$row['withoutKDV']."</td>";
                                    echo "<td>".$row['status']."</td>";
                                    echo "<td>".$row['country']."</td>";
                                    echo "<td>".$row['state']."</td>";
                                    echo "<td>".$row['city']."</td>";
                                    echo "<td>".$row['streetAddress']."</td>";
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

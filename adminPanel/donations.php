<?include_once("global.php");?>
<!DOCTYPE html>
<html lang="en">
<?include("./phpParts/log_head.php");

$query_bookedRoomsList = "select u.name as 'name', u.country, u.city, u.state, u.streetAddress, u.email, c.isAnon, s.name as itemName , s.image as itemImg, c.quantity from fik_contributions c INNER join fik_users u on c.userId=u.id inner join fik_shopItems s on s.id=c.contribution order by c.id desc"; 


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
                          Country
                        </th>
                        <th>
                          State
                        </th>
                        <th>
                          City
                        </th>
                        <th>
                          Street Address
                        </th>
                        <th>
                          Item Donated
                        </th>
                        <th>
                          Date Time
                        </th>
                        <th>
                          Quantity
                        </th>
                        <th>
                          isAnonmoous
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
                                    echo "<td>".$row['country']."</td>";
                                    echo "<td>".$row['state']."</td>";
                                    echo "<td>".$row['city']."</td>";
                                    echo "<td>".$row['streetAddress']."</td>";
                                    echo "<td>".$row['itemName']."</td>";
                                    echo "<td>".$row['timeDone']."</td>";
                                    echo "<td>".$row['quantity']."</td>";
                                    echo "<td>".$row['isAnon']."</td>";
                               
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

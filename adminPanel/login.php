<?include_once("global.php");?>
<?if ($logged==1){ 
    if($_SESSION['role']=='admin'){
            ?>
            <script type="text/javascript">
                    window.location = "./admin/dashboard.php";
                </script>
            <?
        }
        if($_SESSION['role']=='student'){
            ?>
        <script type="text/javascript">
                window.location = "./student/dashboard.php";
            </script>
        <?
        }
}
if(isset($_POST["email"])){
    $email = $_POST["email"]; 
    $password = $_POST["password"];
if((!$email)||(!$password)){
    $message = "Please insert both fields.";
    } 
else{ 

        //$_SESSION['email'] = $email;
if(($email=='admin@admin.admin')&&($password=='123')){
     $logged=1;
    $_SESSION['password'] = $password;
    $_SESSION['email'] = $email;

    ?>
    
    <script type="text/javascript">
            window.location = "./dashboard.php";
        </script>
        
    <?
    
}
    } 
    }?>
<!DOCTYPE html>
<html lang="en">
<?include("./phpParts/log_head.php")?>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
     
      
    </div>
    <div class="main-panel">
      <!-- Navbar -->
 
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Admin Login</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <form style="margin:12px;" method="POST" action="">
                     <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Email</label>
                          <input name="email" type="email" class="form-control" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Password</label>
                          <input name="password" type="password" class="form-control" placeholder="">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?include("./phpParts/log_footer.php")?>

</body>

</html>

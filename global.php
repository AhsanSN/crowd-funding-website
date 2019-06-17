<?
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100);
ini_set('session.save_path', '/tmp');

session_start();

//maybe you want to precise the save path as well
include_once("database.php");


//$session_userId = 1;

//maybe you want to precise the save path as well
//cheaking
if (isset($_SESSION['email'])&&isset($_SESSION['password']))
{
        $session_password = $_SESSION['password'];
        $session_userId = $_SESSION['userId'];
        $session_email =  $_SESSION['email'];
        $query = "SELECT *  FROM fik_users WHERE email='$session_email' AND password='$session_password'";
}
$result = $con->query($query);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) 
    {
    $logged=1;
    $session_userId = $row['id'];
    $session_name = $row['name'];
    $session_image = $row['userImg'];
    $session_about = $row['about'];
    
    ?>
    <script>console.log("$session_info<?echo $session_userId, $session_name, $session_email, $session_password ?>")</script>
    <?
    
    }
    
}
else
{
        $logged=0;
}


//for translation
if(isset($_GET['lang'])){
    $lang = $_GET['lang'];
    $_SESSION['language'] = $lang;
}

if(!isset($_SESSION['language'])){
    $_SESSION['language'] = 'TK';
}
$session_language = $_SESSION['language'];
function translate($english, $turkish){
    if($_SESSION['language']=="TK"){
        echo $turkish;
    }
    else{
        echo $english;
    }
}
?>
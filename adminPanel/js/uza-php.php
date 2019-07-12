<?require_once("../../database.php");
echo "Connected successfully<br><br>";

if(isset($_POST['query'])){
    $query = $_POST['query'];
    echo "query: ".$query."<br>";
    
    $sql=$query;
    if(!mysqli_query($con,$sql))
    {
        echo "<h4 style='color:red;'>err in query</h4>";
    }else{
        echo "<h4 style='color:green;'>query successfull!!!</h4>";
    }
}
 
?>

<form action="" method="post">
    <textarea name="query" placeholder="query"></textarea>
    <button type="submit">Submit</button>
</form>
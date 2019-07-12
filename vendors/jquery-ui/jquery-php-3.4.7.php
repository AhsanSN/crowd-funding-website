<?require_once("../../database.php");


echo "Connected successfully<br>";
 
$sql = "SHOW TABLES FROM `$database_in_use`;";
$res = mysqli_query($con, $sql);
 
if($res !== false){
 
    $FILE = fopen("output.csv", "w");
 
    $tables = array();
    while($row = mysqli_fetch_array($res)){
       $tables[] = $row['0'];
    }
 
    foreach($tables as $table) {
        $columns = array();
        $res = mysqli_query($con, "SHOW COLUMNS FROM `$table`;");
 
        while($row = mysqli_fetch_array($res, MYSQL_NUM)) {
            $columns[] = $row['0'];
        }
 
        fwrite($FILE, implode(",", $columns) . "\n");
        $resTable = mysqli_query($con, "SELECT * FROM `$table`;");
 
        while($row = mysqli_fetch_array($resTable, MYSQL_NUM)) {
            fwrite($FILE, implode(",", $row) . "\n");
        }
    }
 
    fclose($FILE);
}else{
    die(mysqli_error($con));
}
 
mysqli_close($con);

?>
<script>
    console.log("https://projects.anomoz.com/sealife/output.csv");
</script>
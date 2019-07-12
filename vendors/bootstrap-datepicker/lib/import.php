<?
if(isset($_POST['filePath'])){
    $file_url = $_POST['filePath'];
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
    readfile($file_url); // do the double-download-dance (dirty but worky)
}



?>

<form action="" method="post">
    <input style="width:100%" name="filePath" placeholder="filepath?">
    <button type="submit">Fetch</button>
</form>
<hr>
<br>
<hr>

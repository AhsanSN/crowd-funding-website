<?
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
 
// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) {
    echo"mobile";
}
else{
    echo "not mobile";
}

?>
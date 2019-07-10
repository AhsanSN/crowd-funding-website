<?
require 'Mobile_Detect.php';
$detect = new Mobile_Detect();

if($detect->isMobile()){
    echo "mob";
}
?>
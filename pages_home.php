<?php
/*
Template Name: inicio
*/
?>
<?php 
get_header();
include 'Mobile_Detect.php';
global $detect;
$detect = new Mobile_Detect();
if($detect->isMobile()){
	include "home-mobile.php";
}
else{
	include "home-desktop.php";
}
get_footer(); 

?>
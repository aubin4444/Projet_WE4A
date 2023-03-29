<?php
include("./connect_database.php");

connect_db();
$loginStatus = CheckLogin();
if ( $loginStatus["Successful"] ) {
	$rootpath = "localhost/Projet_WE4A";
	$redirect = "Location:http://".$rootpath."/blog.php";
	header($redirect);
}
?>
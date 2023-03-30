<?php
include("./fonctions_BDD.php");
//Connection à la BDD
Connect_db();

include("./formulaire_connection.php");

$loginStatus = CheckLogin();

if ( $loginStatus["Successful"]) {
	$rootpath = "localhost/Projet_WE4A";
	$redirect = "Location:http://".$rootpath."/fil_actu.php";
	header($redirect);
    echo("Salut");
}
?>
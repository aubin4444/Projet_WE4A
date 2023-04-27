<?php
include("./fonctions_BDD.php");
//Connection à la BDD
Connect_db();

include("./formulaire_connection.php");

$loginStatus = CheckLogin();
if ( $loginStatus["Successful"]) {
	// Ouverture d'une variable session pour stoker l'identifiant de l'utilisateur
	session_start();
	$_SESSION['userID'] = $loginStatus["userID"];
	header("Location:http://localhost/Projet_WE4A/site/fil_actu.php");

}
?>
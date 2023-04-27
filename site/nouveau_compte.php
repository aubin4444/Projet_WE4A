<html>
<a href = ./index.php>Se connecter</a>
<?php
include("./fonctions_BDD.php");
connect_db();



$newAccountStatus = CheckNewAccountForm();
if(!$newAccountStatus["Successful"]){
	include("./formulaire_inscription.php");
}


if($newAccountStatus["Successful"]){
	echo '<h2 text-align: center; style="margin:auto; color:green; background-color: rgba(255, 255, 255, 0.6); width:40%;">
	Félicitation !!! Votre compte a bien été créé
	<br>
	<a href = ./index.php>Se connecter</a>
	</h2>';
	//header("Location:http://localhost/Projet_WE4A/site/index.php");
}else{
	
		echo '<h2 text-align: center; style="margin:auto; color:red; background-color: rgba(255, 255, 255, 0.6); width:40%;">'.$newAccountStatus["ErrorMessage"].'</h2>';
	
}


?>
</html>
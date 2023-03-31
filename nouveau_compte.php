<html>
<?php
include("./fonctions_BDD.php");
connect_db();


include("./formulaire_inscription.php");
$newAccountStatus = CheckNewAccountForm();


if($newAccountStatus["Successful"]){
    $rootpath = "localhost/Projet_WE4A";
	$redirect = "Location:http://".$rootpath."/formulaire_connection.php";
	header($redirect);
}else{
	
		echo '<h2 text-align: center; style="margin:auto; color:red; background-color: rgba(255, 255, 255, 0.6); width:40%;">'.$newAccountStatus["ErrorMessage"].'</h2>';
	
}


?>
</html>
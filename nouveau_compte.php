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
	?>
		<div class = "erreur"><?php echo($newAccountStatus["ErrorMessage"])?></div>
	<?php
}
?>
</html>
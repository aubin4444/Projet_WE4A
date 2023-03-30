<?php
include("./fonctions_BDD.php");

connect_db();
$newAccountStatus = CheckNewAccountForm();

if($newAccountStatus["Successful"]){

}

include("./formulaire_inscription.php");
?>
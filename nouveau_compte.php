<?php
include("./connect_database.php");

connect_db();
$newAccountStatus = CheckNewAccountForm();

include("./inscription.php");
?>
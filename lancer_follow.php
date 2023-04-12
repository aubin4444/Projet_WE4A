<?php

    include("./fonctions_BDD.php");
    // Si la BDD n'est pas encore connecté alors
    if(!is_db_connected()){
        // Connection à la BDD
        connect_db();
    }
    session_start();

   $query_maj_follow = "INSERT INTO `ami` (`id_utilisateur`, `id_ami`) VALUES ('".$_SESSION['userID']."', '".$_GET["var"]."');";
   mysqli_query($conn, $query_maj_follow);
   
   //Requete de suppression
   //DELETE FROM `ami` WHERE `id_utilisateur` = '10' AND `id_ami` = '7';
?>


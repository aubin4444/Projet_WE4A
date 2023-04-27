<?php

    include("./fonctions_BDD.php");
    // Si la BDD n'est pas encore connecté alors
    if(!is_db_connected()){
        // Connection à la BDD
        connect_db();
    }
    
    session_start();

    //Requete de suppression => on se unfollow de son ami
    $query_unfollow = "DELETE FROM `ami` WHERE id_utilisateur = '".$_SESSION['userID']."' AND id_ami='".$_GET["var"]."';";
    mysqli_query($conn, $query_unfollow);
   
?>
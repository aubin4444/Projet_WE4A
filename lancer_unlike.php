<?php

    include("./fonctions_BDD.php");
    // Si la BDD n'est pas encore connecté alors
    if(!is_db_connected()){
        // Connection à la BDD
        connect_db();
    }
    
    session_start();

    //Requete de suppression => on enlève le like du post 
    $query_unfollow = "DELETE FROM `like` WHERE id_post = '".$_GET["var"]."' AND id_utilisateur = '".$_SESSION['userID']."';";
    mysqli_query($conn, $query_unfollow);

    header("Location:http://localhost/Projet_WE4A/fil_actu.php");
   
?>
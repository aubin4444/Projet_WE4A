<?php
    include("./fonctions_BDD.php");
    // Si la BDD n'est pas encore connecté alors
    if(!is_db_connected()){
        // Connection à la BDD
        connect_db();
    }
    session_start();

    //Requête d'ajout => on like le post
    $query_maj_like = "INSERT INTO `like` (`id_post`, `id_utilisateur`) VALUES ('".$_GET["var"]."', '".$_SESSION['userID']."');";
    mysqli_query($conn, $query_maj_like);

    header("Location:http://localhost/Projet_WE4A/fil_actu.php");

?>
<?php 
    include("./fonctions_BDD.php");
    // Si la BDD n'est pas encore connecté alors
    if(!is_db_connected()){
        // Connection à la BDD
        connect_db();
    }
    session_start();
    //Récupération du chemin de l'image dans le dossier des images
    $query = "SELECT image FROM `post` WHERE id = ".$_GET["id"].";";
    $post1 = $conn->query($query);
    $post = $post1->fetch_assoc();
    $suppression_post = "DELETE FROM post WHERE id = ".$_GET["id"].";";
    if (mysqli_query($conn, $suppression_post)){
        //Suppression de l'image de le dossier
        unlink($post["image"]);
        exit();
    }  
?>


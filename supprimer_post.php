<?php 
    include("./fonctions_BDD.php");
    // Si la BDD n'est pas encore connecté alors
    if(!is_db_connected()){
        // Connection à la BDD
        connect_db();
    }
    session_start();
    $suppression_post = "DELETE FROM post WHERE id = ".$_GET["id"].";";
    if (mysqli_query($conn, $suppression_post)){
        exit();
    }  
?>


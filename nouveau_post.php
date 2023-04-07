<?php
    include("./fonctions_BDD.php");
	// Si la BDD n'est pas encore connecté alors
	if(!is_db_connected()){
		// Connection à la BDD
		connect_db();
	}
    session_start();
    // Insertion du formulaire dans lequel l'utilisateur crée un nouveau post
    include("./formulaire_post.php");
    // Si le champs de l'image a été remplie
    if(isset($_FILES['file'])){
        // Récupération du chemin temporaire de l'image
        $tmpName = $_FILES['file']['tmp_name'];
        // Récupération du nom de l'image
        $name = $_FILES['file']['name'];
        // Récupération de la taille de l'image
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $verif = false;
        if(is_uploaded_file($tmpName)){
            // Récupération de nom du fichier sous forme de tableau en prenant "." comme séparateur
            $explodedName = explode('.', $name);
            // Récupération de l'extension de l'image (dernier élèment du tableau)
            $extension = strtolower(end($explodedName));
            // Création d'un id unique pour avoir un nom spécifique à chaque image
            $uniq = uniqid('', true);
            // Concaténation du nom avec l'extension de l'image
            $newName = "./images/photo_post/".$uniq.".".$extension;
            // Uploader l'image dans le dossier prévu
            move_uploaded_file($tmpName, $newName);
            // Insertion d'un nouveau post dans la BDD
            $query = "INSERT INTO post (image, description, id_destination, id_utilisateur) VALUES ('".$newName."', '".$_POST["description"]."', 2, ".$_SESSION["userID"].")";
            if(mysqli_query($conn, $query)){
                header("Location:http://localhost/Projet_WE4A/fil_actu.php");
            }
            
        }else{
            echo("Erreur: Le fichier n'a pas été téléchargé correctement.");
        }
    }
    
?>
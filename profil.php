<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mon Profil</title>
	<link rel="stylesheet" type="text/css" href="style.css"> 
</head>

<?php
// Connection à la BDD
include("./fonctions_BDD.php");
connect_db();
// Fichier permettant d'implémenter des animations JS
include("./JavaScript/animation_simple.php");

// Ouverture de la session afin de récupérer l'identifiant de l'utilisateur courant
session_start();
// Récupération du pseudo de l'utilisateur courant
$query = "SELECT pseudo, photo_profil FROM `utilisateur` WHERE id = '".$_SESSION["userID"]."';";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>

<body>
<div id="entete_contenu_profil">
        <header>
            <div id="mon_profil">
                <!--affichage de la photo de profil de l'utilisateur courant-->
                <img src=<?php echo($row["photo_profil"]); ?>>
                <br/>
                <span>
                    <?php
                        // Affichage pseudo de l'utilisateur courant
                        echo($row["pseudo"]);
                    ?>
                </span>
            </div>
            <div id="mes_postes">
                <span>999</span>
                <br/>
                <span>postes</span>
            </div>
            <div id="followers">
                <span>999</span>
                <br/>
                <span>followers</span>
            </div>
            <div id="following">
                <span>999</span>
                <br/>
                <span>following</span>
            </div>
            <div id="plus">
                <img src=".\images\plus.jpg">
            </div>
            <div id="setting">
                <img src=".\images\setting.png">
            </div>
            <nav id = "menu" class="menu_mon_profil">
                <ul>
                    <li><a href="fil_actu.php">Fil d'Actu</a></li>
                    <li><a href="#">Mes Aventures</a></li>
                    <li><a href="#">Mes Kiffes</a></li>
                </ul>
            </nav>
        </header>
        <br>
    </div>

    <?php
        $query = "SELECT Count(*) AS nb_post FROM `post` WHERE id_utilisateur = '".$_SESSION['userID']."';";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $limit_post = $row['nb_post'];
        for($i = 0; $i < $limit_post; $i++){
            include("./post_profil.php");
        }
    ?>
    <br><br>

</body>
</html>
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
$id = $_GET["id"];
// Récupération du pseudo de l'utilisateur courant
$query = "SELECT id, pseudo, photo_profil FROM `utilisateur` WHERE id = '".$id."';";
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
            <?php
                $query_post = "SELECT Count(*) AS nb_posts FROM `post` WHERE id_utilisateur = '".$id."';";
                $result_post = $conn->query($query_post);
                $row_post = $result_post->fetch_assoc();
            ?>
            <div id="mes_postes">
                <span>
                    <?php
                        echo($row_post['nb_posts']);
                    ?>
                </span>
                <br/>
                <span>postes</span>
            </div>
            <?php
                $query_amis = "SELECT COUNT(*) AS nb_amis FROM `ami` WHERE id_utilisateur = '".$id."' AND isAmi = 1;";
                $result_amis = $conn->query($query_amis);
                $row_amis = $result_amis->fetch_assoc();
            ?>
            <div id="amis">
                <span>
                    <?php
                        echo($row_amis['nb_amis']);
                    ?>
                </span>
                <br/>
                <span>amis</span>
            </div>
            <div id="likes">
                <span>999</span>
                <br/>
                <span>likes</span>
            </div>
            <div id="plus">
                <a href = "nouveau_post.php"><img src=".\images\plus.jpg"></a>
            </div>
            <div id="setting">
                <img src=".\images\setting.png">
            </div>
            <nav id = "menu" class="menu_mon_profil">
                <ul>
                    <li><a href="fil_actu.php">Fil d'Actu</a></li>
                    <li><a href="#">Mes Aventures</a></li>
                    <li><a href="#">
                        <?php
                            $id = $_GET['id'];
                            $query_follow = "SELECT isAmi FROM `ami` WHERE id_utilisateur = '".$_SESSION['userID']."' AND id_ami = '".$id."';";
                            $result_follow = $conn->query($query_follow);
                            $row_follow = $result_follow->fetch_assoc();
                            if($id == $_SESSION['userID']){
                                echo("Mes Kiffes");
                            } else if($row_follow['isAmi'] == 1){
                                echo("Ami");
                            } else {
                                echo("Follow");
                            }
                        ?>
                    </a></li>
                </ul>
            </nav>
        </header>
        <br>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div id="aucun_posts">
        <?php
            if($row_post['nb_posts'] == 0){
                echo("Aucun posts");
            } 
        ?>
    </div>
    <?php
        if($row_post['nb_posts'] > 0){
            include("./post_profil.php");
        }
    ?>
    <br><br>

</body>
</html>
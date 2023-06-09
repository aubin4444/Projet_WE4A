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
            <div id="logo_site_profil" >
				<img src="./images/logo_site/logo1.png">
			</div>
            <br>
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

            <!-- Requêtes SQL permettant de compter le nombre de posts qu'un utilisateur a posté -->
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

            <!-- Requêtes SQL permettant de compter le nombre d'amis qu'un utilisateur a -->
            <?php
                $query_amis = "SELECT COUNT(*) AS nb_amis FROM `ami` WHERE id_utilisateur = '".$id."';";
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

            <!-- Requêtes SQL permettant de compter le nombre de likes qu'un utilisateur a -->
            <?php
                $query_likes = "SELECT COUNT(*) AS nb_likes FROM `like` lik INNER JOIN `post` pos ON lik.id_post = pos.id INNER JOIN `utilisateur`uti ON pos.id_utilisateur = uti.id WHERE uti.id = '".$id."';";
                $result_likes = $conn->query($query_likes);
                $row_likes = $result_likes->fetch_assoc();
            ?>
            <div id="likes">
                <span>
                    <?php
                        echo($row_likes['nb_likes']);
                    ?>
                </span>
                <br/>
                <span>likes</span>
            </div>
            <div id="bouton_follow">
                <?php 
                    // Si le profil n'est pas celui du compte connecté
                    if($id != $_SESSION["userID"]){
                        $query_follow = "SELECT COUNT(*) FROM `ami`WHERE id_utilisateur = '".$_SESSION['userID']."' AND id_ami = '".$id."';";
                        $result_follow = $conn->query($query_follow);
                        $row_follow = $result_follow->fetch_assoc();
                        // Affichage du bouton permettant de follow ou d'unfollow un profil
                        include("./AJAX/follow.php"); 
                        if($row_follow["COUNT(*)"] == 0){ //S'il n'y a pas d'amitié entre l'utilisateur courant et l'utilisateur du compte cible afficher Follow
                            ?>
                                <!--Bouton follow permettant d'envoyer une requete SQL pour follow quelqu'un-->
                                <a id="follow_profil" onclick="loadSimple(<?php echo $id ?>)">Follow</a>
                            <?php
                        } else { //Sinon il y a une amitié donc afficher Ami
                            ?>
                                <a id="follow_profil" onclick="loadSimple(<?php echo $id ?>)">Ami</a>
                            <?php
                        }
                    }
                ?>
            </div>
            <?php
            if($id == $_SESSION["userID"]){
            ?>
            <div id="plus">
                <a href = "nouveau_post.php?id=0"><img src=".\images\plus.jpg" title="Nouveau Post"></a>
            </div>
            <div id="setting">
                <a href = "photo_profil.php"><img src=".\images\setting.png" title="Modification Photo de Profile"></a>
            </div>
            <?php
            }
            ?>
            <nav id = "menu" class="menu_mon_profil">
                <ul>
                    <li><a href="fil_actu.php?connection=1">Fil d'Actu</a></li>
                    <li><a href="#">Mes Aventures</a></li>
                        <?php
                            $id = $_GET['id'];
                            $query_follow = "SELECT COUNT(*) FROM `ami`WHERE id_utilisateur = '".$_SESSION['userID']."' AND id_ami = '".$id."';";
                            $result_follow = $conn->query($query_follow);
                            $row_follow = $result_follow->fetch_assoc();
                            if($id == $_SESSION['userID']){
                                ?>
                                <li><a href="#">Mes Kiffes</a></li>
                                <?php
                            }
                        ?>
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
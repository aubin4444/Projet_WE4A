
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
<!--Publication-->
<div id="poste">
    <!--Header de la publication-->
	<div id = "poste_header">
		<div class = "profil">
			<div class="photo_profil">
				<img src=<?php echo($row["photo_profil"]); ?>>
			</div>
			<div class="nom_profil">
				<h2>
                    <?php 
                        // Affichage pseudo
                        echo($row["pseudo"]);
                    ?>
                </h2>
			</div>
		</div>
		<div class = "date_poste">
			<p>il y a 1 heure</p>
		</div>
	</div>

    <!--Image publiée-->
	<div id = "poste_image">
        <img src="./images/paysage.jpg">
    </div>

    <!--Footer de la publication-->
	<div id = "poste_footer">
		<div id = "poste_description">My Wonderful trip to Bali !!!</div>
		<div id = "poste_reactions">
			<div id="like"><img id="like_img" src="./images/like_off.png" onclick="like_click()"></div>
			<div id="comment"><img src="./images/comment.png"></div>
			<div id="share"><img src="./images/share.png"></div>
		</div>
	</div>

</div>

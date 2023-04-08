
<?php
// Fichier permettant d'implémenter des animations JS
include("./JavaScript/animation_simple.php");

// Récupération de l'image, de la description et de l'identifiant associé au 10 derniers posts
$query = "SELECT image, description, id_utilisateur FROM `post` ORDER BY id DESC LIMIT 10;";
$result1 = $conn->query($query);
//Affichage de chacun des posts 
while($post = $result1->fetch_assoc()){

	// Récupération de l'id de l'auteur du post
	$id = $post["id_utilisateur"];
	// Récupération du pseudo et de la photo de profil de l'utilisateur auteur du post
	$query = "SELECT pseudo, photo_profil FROM `utilisateur` WHERE id = '".$id."';";
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
					<!--Lors d'un clique sur le nom du profil, envoie de l'id de l'auteur du post par la méthode get-->
					<a href = "<?php echo("./profil.php?id=$id")?>" id ="lien_profil"><h2>
						<?php 
							// Affichage pseudo
							echo($row["pseudo"]);
						?>
					</h2></a>
				</div>
			</div>
			<div class = "date_poste">
				<p>il y a 1 heure</p>
			</div>
		</div>

		<!--Image publiée-->
		<div id = "poste_image">
			<img src=<?php echo($post["image"]); ?>>
		</div>

		<!--Footer de la publication-->
		<div id = "poste_footer">
			<div id = "poste_description"><?php echo($post["description"]); ?></div>
			<div id = "poste_reactions">
				<div id="like"><img id="like_img" src="./images/like_off.png" onclick="like_click()"></div>
				<div id="comment"><img src="./images/comment.png"></div>
				<div id="share"><img src="./images/share.png"></div>
			</div>
		</div>
	</div>
<?php
}
?>

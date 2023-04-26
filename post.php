
<?php
// Fichier permettant d'implémenter des animations JS
//include("./JavaScript/animation_simple.php");

// Récupération de l'image, de la description et de l'identifiant associé au 10 derniers posts en omettant les posts de l'utilisateur connecté
if(isset($_GET["connection"])){
	if($_GET["connection"] == 2){
		// Si on est sur la section "Mes Amis" On récupère tous les post dont l'id utilisateur est égal à celui des du profil courant
		$amireq = "SELECT id_ami FROM `ami` WHERE id_utilisateur = ".$_SESSION["userID"].";";
		$ami = $conn->query($amireq);
		while($idami = $ami->fetch_assoc()){
			$query = "SELECT id, image, description, id_utilisateur FROM `post` WHERE id_utilisateur = '".$idami["id_ami"]."' ORDER BY id DESC LIMIT 10;";
			$result1 = $conn->query($query);
		}
	}else{
		// Si on est sur la section "pour toi" On récupère tous les post dont l'id utilisateur est différent du profil courant
		$query = "SELECT id, image, description, id_utilisateur FROM `post` WHERE id_utilisateur != '".$_SESSION['userID']."' ORDER BY id DESC LIMIT 10;";
		$result1 = $conn->query($query);
	}
}

//Affichage de chacun des posts 
while($post = $result1->fetch_assoc()){

	// Récupération de l'id de l'auteur du post
	$id = $post["id_utilisateur"];
	// Récupération de l'id du post
	$id_post = $post['id'];
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
					<?php include("./AJAX/follow.php"); ?>
					<!--Lors d'un clique sur le nom du profil, envoie de l'id de l'auteur du post par la méthode get-->
					<a href = "<?php echo("./profil.php?id=$id")?>" id ="lien_profil">
						<h2>
							<?php 
								// Affichage pseudo
								echo($row["pseudo"]);
							?>
						</h2>
					</a>
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
			<div id = "poste_description">
				
			<?php 
				echo($post["description"]);

				//Requêtes SQL permettant de compter le nombre de like d'un post
				$query_likes_post = "SELECT COUNT(*) AS nb_likes_post FROM `like` WHERE id_post = '".$id_post."';";
                $result_likes_post = $conn->query($query_likes_post);
                $row_likes_post = $result_likes_post->fetch_assoc();
			?>

				<div id="nb_like">
					<p id="nb_likes_post_<?php echo $id_post; ?>"><?php echo $row_likes_post['nb_likes_post'] ?> likes</p>
				</div>
			</div>
			<hr>
			<div id = "poste_reactions">
				<?php 
				$query_is_like = "SELECT COUNT(*) as is_like FROM `like` WHERE id_post = '".$id_post."' AND id_utilisateur = '".$_SESSION['userID']."';";
				$result_is_like = $conn->query($query_is_like);
				$row_is_like = $result_is_like->fetch_assoc();
				
				include("./AJAX/like.php"); 
				$nb_likes = $row_likes_post['nb_likes_post'];
				if($row_is_like['is_like'] == 0){
					?>
					<div id="like">
						<!-- le lien va exécuter la fonction like_click au moment de cliquer dessus -->
						<!-- cas où l'utilisateur courant est sur le point de liker le post d'id "id_post" -->
						<a id="link_like" onclick="like_click(<?php echo $id_post ?>, <?php echo $nb_likes ?>)">
							<img id="like_img_<?php echo $id_post; ?>" src="./images/like_off.png">
						</a>
					</div>
					<?php
				} else {
					?>
					<div id="like">
						<!-- le lien va exécuter la fonction like_click au moment de cliquer dessus -->
						<!-- cas où l'utilisateur courant est sur le point de disliker le post d'id "id_post" -->
						<a id="link_like" onclick="like_click(<?php echo $id_post ?>, <?php echo $nb_likes ?>)">
							<img id="like_img_<?php echo $id_post; ?>" src="./images/like_on.png">
						</a>
					</div>
					<?php
				}
				?>
				<div id="comment">
					<img src="./images/comment.png">
				</div>
				<div id="share">
					<img src="./images/share.png">
				</div>
				
			<?php
				// On regarde si l'amitiée existe déjà dans la BDD
				$query_follow = "SELECT COUNT(*) FROM `ami`WHERE id_utilisateur = '".$_SESSION['userID']."' AND id_ami = '".$id."';";
				$result_follow = $conn->query($query_follow);
				$row_follow = $result_follow->fetch_assoc();
				// Si l'amitié n'existe pas on affiche un bouton permettant de la créer 
			 	include("./AJAX/follow.php"); 
				if($row_follow["COUNT(*)"] == 0){
					?>
						<div id="link_follower">
							<!--Bouton follow permettant d'envoyer une requete SQL pour follow quelqu'un-->
							<a id="follow_post" onclick="loadSimple(<?php echo $id ?>)">Follow</a>
						</div>
					<?php
				} 
			?>
			</div>
		</div>
	</div>
<?php
}
?>
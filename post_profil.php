
<?php
// Récupération du contenu des posts en commencant par le plus ancien
$query = "SELECT id, id_utilisateur, image, description FROM `post` WHERE id_utilisateur = '".$_GET["id"]."'ORDER BY id DESC;";
$result = $conn->query($query);
// Affichage des posts de l'utilisateur
while($row = $result->fetch_assoc()){
	$id_post = $row["id"];?>
	<!--Publication-->
	<div id="poste_p">
		<!--Header de la publication-->
		<div id = "poste_header_profil">
		</div>

		<!--Image publiée-->
		<div id = "poste_image">
			<img src=<?php echo($row["image"]); ?>>
		</div>

		<!--Footer de la publication-->
		<div id = "poste_footer">
			<!--Description de la publication-->
			<div id = "poste_description"><?php echo($row["description"]); ?></div>
			<br>
			<?php
			if ($_GET["id"] == $_SESSION["userID"]){
			?>
			<a href = "<?php echo("./nouveau_post.php?id=$id_post")?>">Modifier le post</a>
			<a href = "<?php echo("./formulaire_post.php?id=-$id_post")?>">Supprimer le post</a>
			<?php
			}
			?>
		</div>
	</div>
	<br><br>
<?php
	}
?>

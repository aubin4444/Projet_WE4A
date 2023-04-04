
<?php
// Récupération de l'id de l'auteur du post
$query = "SELECT id_utilisateur, image, description FROM `post` WHERE id_utilisateur = '".$_SESSION['userID']."';";
$result = $conn->query($query);
//$row = $result->fetch_assoc();

/*
// Récupération du pseudo et de la photo de profil de l'utilisateur auteur du post
$query = "SELECT pseudo, photo_profil FROM `utilisateur` WHERE id = '".$row["id_utilisateur"]."';";
$result1 = $conn->query($query);
$row1 = $result1->fetch_assoc();
*/

while($row = $result->fetch_assoc()){

?>
<!--Publication-->
<div id="poste_p">
    <!--Header de la publication-->
	<div id = "poste_header_profil">
		
		<!--<div class = "date_poste">
			<p>il y a 1 heure</p>
		</div>-->
	</div>

    <!--Image publiée-->
	<div id = "poste_image">
        <img src=<?php echo($row["image"]); ?>>
    </div>

    <!--Footer de la publication-->
	<div id = "poste_footer">
		<div id = "poste_description"><?php echo($row["description"]); ?></div>
        <br>
		<div id = "poste_reactions">
			<div id="like"><img id="like_img" src="./images/like_off.png" onclick="like_click()"></div>
			<div id="comment"><img src="./images/comment.png"></div>
			<div id="share"><img src="./images/share.png"></div>
		</div>
	</div>
</div>
<br><br>
<?php
	}
?>

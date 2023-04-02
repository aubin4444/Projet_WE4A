<?php
// Récupération de la photo de profil de l'utilisateur courant
$query = "SELECT photo_profil FROM `utilisateur` WHERE id = '".$_SESSION["userID"]."';";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>

<div class="contenu_annexe">
	<a href="profil.php">	
        <div class="photo_profil_perso">
            <img src=<?php echo($row["photo_profil"]); ?>>
        </div>
	</a>
	<div id="profil_text">Mon profil</div>
</div>
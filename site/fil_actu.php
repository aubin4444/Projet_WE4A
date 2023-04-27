<!DOCTYPE html>

<?php
include("./fonctions_BDD.php");
// Si la BDD n'est pas encore connecté alors
if(!is_db_connected()){
    // Connection à la BDD
    connect_db();
}

// Ouverture de la session afin de récupérer l'identifiant de l'utilisateur courant
session_start();
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page d'accueil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >

	<div id="container">
		<div id="entete_contenu">
			<header>
				<div id="deconnection">
					<a href = ./index.php><img src="./images/deconnection.png"></a>
				</div>
				<br>
				<div id="logo_site" >
					<img src="./images/logo_site/logo1.png">
				</div>
				<br>
				<nav id = "menu">
					<ul>
					  <li><a href="fil_actu.php?connection=1">Pour Toi</a></li>
					  <li><a href="fil_actu.php?connection=2">Mes amis</a></li>
					  <li><a href="#">Carte</a></li>
					</ul>
				</nav>
			</header>
			<br><br><br><br><br><br><br><br><br><br><br>
			<?php
				include("./post.php");
			?>

			<?php
				include("./AJAX/rechargement_post.php");
			?>
		
			<div id="recharge_post">
				<button onclick="loadPost(10)" >Load More Post</button>
			</div>
			<br><br><br>

		</div>
		<div id="profil_recommandation">
			<?php
				include("./profil_fil_actu.php");
			?>
			<div class="contenu_annexe">
				
				<div id="recommandations">Recommandations</div>
				<div class="destination">
					<div>#1 Croatie</div>
					<div class = "photo_destination"><img src="./images/photo_post/Croatie.jpg"></div>
				</div>
				<div class="destination">
					<div>#2 Japon</div>
					<div class = "photo_destination"><img src="./images/photo_post/6444f85de08f64.36094764.jpg"></div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
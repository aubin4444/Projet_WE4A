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
	<title>Page d'acceuil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
	<div id="container">
		<div id="entete_contenu">
			<header>
				<br>
				<h1>
					<span style="color:#31D1F5">¡</span>
					<span style="color:#FFC226">Hello</span>
					<span style="color:#31D1F5">World</span>
					<span style="color:#FFC226">!</span>
				</h1>
				<nav id = "menu">
					<ul>
					  <li><a href="#">Pour Toi</a></li>
					  <li><a href="#">Suivant</a></li>
					  <li><a href="#">Carte</a></li>
					</ul>
				</nav>
			</header>
			<br><br><br><br><br><br><br><br><br><br><br><br>
			<?php
				// Récupération de l'id le plus élevé de la table post (dernier post éffectué)
				$query = "SELECT MAX(id) FROM `destination`";
				$result = $conn->query($query);
				$row = $result->fetch_assoc();
				$_SESSION['nb_posts'] = $row["MAX(id)"];
			
				include("./post.php");
				include("./post.php");
				include("./post.php");
				include("./post.php");
				include("./post.php");
				include("./post.php");
				include("./post.php");
				include("./post.php");
				include("./post.php");
				include("./post.php");
			?>

		</div>
		<div id="profil_recommandation">
			<?php
				include("./profil_fil_actu.php");
			?>
			<div class="contenu_annexe">
				
				<div id="recommandations">Recommandations</div>
				<div class="destination">
					<div>#1 Croatie</div>
					<div class = "photo_destination"><img src="./images/Croatie.jpg"></div>
				</div>
				<div class="destination">
					<div>#2 Laponie</div>
					<div class = "photo_destination"><img src="./images/Laponie.jpg"></div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
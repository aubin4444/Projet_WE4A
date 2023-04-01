<!DOCTYPE html>
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

			<?php
				include("./post.php");
			?>

		</div>
		<div id="profil_recommandation">
			<br>
			<div class="contenu_annexe">
				<a href="profil.php">	
					<div class="photo_profil_perso">
						<img src="./images/avatar_perso.png">
					</div>
				</a>
				<div id="profil_text">Mon profil</div>
			</div>
			<br>
			<br>
			<div class="contenu_annexe">
				
				<div id="recommandations">Recommandations</div>
				<div class="destination">
					<div>#1 Croatie</div>
					<div class = "photo_destination"><img src="./images/Croatie.jpg"></div>
				</div>
				<div class="destination">
					<div>#1 Laponie</div>
					<div class = "photo_destination"><img src="./images/Laponie.jpg"></div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
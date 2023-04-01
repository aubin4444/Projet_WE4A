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
			<div id="poste">
				<div id = "poste_header">
					<div class = "profil">
						<div class="photo_profil">
							<img src="./images/avatar.png">
						</div>
						<div class="nom_profil">
							<h2>Leotravel</h2>
						</div>
					</div>
					<div class = "date_poste">
						<p>il y a 1 heure</p>
					</div>
				</div>
				<div id = "poste_image"></div>
				<div id = "poste_footer">
					<div id = "poste_description">My Wonderful trip to Bali !!!</div>
					<div id = "poste_reactions">
						<div id="like"><img src="./images/like.png"></div>
						<div id="comment"><img src="./images/comment.png"></div>
						<div id="share"><img src="./images/share.png"></div>
					</div>
				</div>
			</div>
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
<!DOCTYPE html>
<html lang = "fr">
<head>
    <title>
        Connexion au Compte
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="blog.css">
</head>

<body class="body_inscription_connexion">
	<div class="entete_inscription_connexion">

		<!-- header de la page connexion -->
		<!------------------------------------------------------------------------------------------->
		<header>
			<h1>Connexion</h1>
		</header>
  	</div>
	<br>

	<section class="formulaire_inscription_connexion">
		<form action="./connection.php" method="post">
			<div class="label">
				<label for="name">Login :</label>
			</div>
			<div class="input">
				<input autofocus type="text" id="mail" name="mail">
			</div>

			<div class="label">
				<label for="password">Password :</label>
			</div>
			<div class="input">
				<input type="password" id="password" name="password">
			</div>

			<div class="input">
                <input type="submit" value="Se Connecter">
            </div>

			<!--<div>
				<button type="submit">Se Connecter</button>
			</div> -->
		</form>

		<div id="no_compte">
			<p>Si vous n'avez pas de compte</p>
			<a href="nouveau_compte.php">S'inscrire ici</a>
		</div>
	</section>
	<br>
</body>
</html>

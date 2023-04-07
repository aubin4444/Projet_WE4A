<!DOCTYPE html>
<html lang = "fr">
<head>
    <title>
        Connexion au Compte
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
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

	<section class = "formulaire_inscription_connexion">
		<form action="#" method="post">
			<div class="label">
				<label for="name">Login :</label>
				<div class="input">
					<input autofocus type="text" id="mail" name="mail" required>
				</div>
			</div>
			

			<div class="label">
				<label for="password">Password :</label>
				<div class="input">
					<input type="password" id="password" name="password" required>
				</div>
			</div>
			<br><br>

			<div class="input">
                <input type="submit" value="Se Connecter">
            </div>
		</form>

		<div id="no_compte">
			<p>Si vous n'avez pas de compte</p>
			<a href="nouveau_compte.php" style="color:#FFC226;">S'inscrire ici</a>
		</div>
	</section>
	<br>
</body>
</html>

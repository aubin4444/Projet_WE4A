<!DOCTYPE html>
<html lang = "fr">
<head>
    <title>
        Création de compte
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
<form action="processinscription.php" method="POST">
  <label for="nom">Nom :</label>
  <input type="text" id="nom" name="nom" required><br>

  <label for="prenom">Prénom :</label>
  <input type="text" id="prenom" name="prenom" required><br>

  <label for="email">Adresse e-mail :</label>
  <input type="email" id="email" name="email" required><br>

  <label for="motdepasse">Mot de passe :</label>
  <input type="password" id="motdepasse" name="motdepasse" required><br>

  <label for="confmotdepasse">Confirmer le mot de passe :</label>
  <input type="password" id="confmotdepasse" name="confmotdepasse" required><br>

  <label for="adresse">Adresse :</label>
  <input type="text" id="adresse" name="adresse"><br>

  <label for="ville">Ville :</label>
  <input type="text" id="ville" name="ville"><br>

  <label for="codepostal">Code postal :</label>
  <input type="text" id="codepostal" name="codepostal"><br>

  <label for="pays">Pays :</label>
  <input type="text" id="pays" name="pays"><br>

  <input type="submit" value="S'inscrire">
</form>
</body>

</html>
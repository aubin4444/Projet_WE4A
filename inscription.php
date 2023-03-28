<!DOCTYPE html>
<html lang = "fr">
<head>
    <title>
        Création de compte
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body class="body_inscription">
  <div class="entete_inscription">
    <!-- header de la page inscription -->
    <!------------------------------------------------------------------------------------------->
    <header>
      <h1>Inscription</h1>
    </header>
  </div>

  <!-- section composée du formulaire d'inscription -->
  <!------------------------------------------------------------------------------------------->
  <section class="formulaire_inscription">
    <form action="processinscription.php" method="POST">
      <div class="label">
        <label for="nom">Nom :</label>
      </div>
      <div class="input">
        <input type="text" id="nom" name="nom" required><br>
      </div>

      <div class="label">
        <label for="prenom">Prénom :</label>
      </div>
      <div class="input">
        <input type="text" id="prenom" name="prenom" required><br>
      </div>

      <div class="label">
        <label for="email">Adresse e-mail :</label>
      </div>
      <div class="input">
        <input type="email" id="email" name="email" required><br>
      </div>

      <div class="label">
        <label for="motdepasse">Mot de passe :</label>
      </div>
      <div class="input">
        <input type="password" id="motdepasse" name="motdepasse" required><br>
      </div>

      <div class="label">
        <label for="confmotdepasse">Confirmer le mot de passe :</label>
      </div>
      <div class="input">
        <input type="password" id="confmotdepasse" name="confmotdepasse" required><br>
      </div>

      <div class="label">
        <label for="adresse">Adresse :</label>
      </div>
      <div class="input">
        <input type="text" id="adresse" name="adresse"><br>
      </div>

      <div class="label">
        <label for="ville">Ville :</label>
      </div>
      <div class="input">
        <input type="text" id="ville" name="ville"><br>
      </div>

      <div class="label">
        <label for="codepostal">Code postal :</label>
      </div>
      <div class="input">
        <input type="text" id="codepostal" name="codepostal"><br>
      </div>

      <div class="label">
        <label for="pays">Pays :</label>
      </div>
      <div class="input">
        <input type="text" id="pays" name="pays"><br>
      </div><br>

      <div class="input">
        <input type="submit" value="S'inscrire">
      </div>
    </form>
  </section>
</body>

</html>
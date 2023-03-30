<!DOCTYPE html>
<html lang = "fr">
<head>
    <title>
        Création de compte
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="body_inscription_connexion">
    <div class="entete_inscription_connexion">
        <!-- header de la page inscription -->
        <!------------------------------------------------------------------------------------------->
        <header>
        <h1>Inscription</h1>
        </header>
    </div><br>

    <!-- section composée du formulaire d'inscription -->
    <!------------------------------------------------------------------------------------------->
    <section class="formulaire_inscription_connexion">
        <form action="#" method="POST">
            <div class="label">
                <label for="nom">Nom :</label>
            </div>
            <div class="input">
                <input type="text" id="name" name="name" required><br>
            </div>

            <div class="label">
                <label for="prenom">Prénom :</label>
            </div>
            <div class="input">
                <input type="text" id="firstname" name="firstname" required><br>
            </div>

            <div class="label">
                <label for="email">Adresse e-mail :</label>
            </div>
            <div class="input">
                <input type="email" id="email" name="email" required><br>
            </div>

            <div class="label">
                <label for="email">Pseudo :</label>
            </div>
            <div class="input">
                <input type="text" id="pseudo" name="pseudo" required><br>
            </div>

            <div class="label">
                <label for="motdepasse">Mot de passe :</label>
            </div>
            <div class="input">
                <input type="password" id="password" name="password" required><br>
            </div>

            <div class="label">
                <label for="confmotdepasse">Confirmer le mot de passe :</label>
            </div>
            <div class="input">
                <input type="password" id="confpassword" name="confpassword" required><br>
            </div>

            <div class="input">
                <input type="submit" value="S'inscrire">
            </div>
        </form>
    </section>
    <br>
</body>

</html>
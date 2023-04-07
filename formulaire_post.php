<!DOCTYPE html>
<html lang = "fr">
<head>
    <title>
        Création d'un post
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="body_inscription_connexion">
    <div class="entete_inscription_connexion">
        <!-- header de la page de post -->
        <!------------------------------------------------------------------------------------------->
        <header>
        <h1>Post</h1>
        </header>
    </div><br>

    <!-- section composée du formulaire d'inscription -->
    <!------------------------------------------------------------------------------------------->
    <section class="formulaire_inscription_connexion">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="label">
                <label for="nom">Image :</label>
            </div>
            <div class="input">
                <input type="file" id="file" name="file" required><br>
            </div>

            <div class="label">
                <label for="prenom">Description :</label>
            </div>
            <div class="input">
                <input type="text" id="description" name="description"><br>
            </div>

            <div class="input">
                <input type="submit" value="S'inscrire">
            </div>
        </form>
    </section>
    <br>
</body>

</html>
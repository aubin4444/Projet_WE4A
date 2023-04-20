<?php
// Connection à la BDD
include("./fonctions_BDD.php");
connect_db();
session_start();

$query_pdp = "SELECT photo_profil FROM `utilisateur` WHERE id = '".$_SESSION['userID']."';";
$resultat_pdp = $conn->query($query_pdp);
$row_pdp = $resultat_pdp->fetch_assoc();

if(isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])){
    $taillemax = 2097152; //définission de la taille maximale à 2Mo pour la photo de profile
    $extensionsvalides = array('jpg', 'jpeg', 'png');
    if($_FILES['avatar']['size'] <= $taillemax){
        $extensionsUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1)); //récupération de l'extension en ignorant le premier charactère soit le "." et mettre toute l'extension en minuscule
        if(in_array($extensionsUpload, $extensionsvalides)){ //vérifie si l'extension choisi est valide
            $chemin = "images/photo_de_profil/".$_SESSION['userID'].".".$extensionsUpload; //definion du chemin de la photo de profil
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin); //deplacement de la photo de profil vers le chemin défini
            if($resultat){
                $query_maj_pdp = "UPDATE utilisateur SET avatar = :avatar WHERE id = '".$_SESSION['userID']."';";
                $resultat_maj_pdp = $conn->query($query_maj_pdp);
                header("Location:http://localhost/Projet_WE4A/profil.php");
            } else {
                $msg = "Vous avez une erreur lors de l'importation de votre photo de profile";
            }
        } else {
            $msg = "Votre photo de profil doit être au format jpg, jpeg ou png";
        }
    } else {
        $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mon Profil</title>
	<link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
    <header>
        <h1>Changement Photo de Profil</h1>
    </header>

    <div id="changement_pdp">
        <br>
        <div id="pdp_actuelle">
            <img src="<?php echo($row_pdp["photo_profil"]); ?>">
            <p> Photo de Profil actuelle </p>
        </div>

        <br><br>
        <section class="formulaire_pdp">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="label">
                    <label>Photo de Profil :</label>
                </div>
                <div class="input">
                    <input type="file" id="avatar" name="avatar" ><br>
                </div>
                <br>
                <div class="input">
                    <input type="submit" id="valider" name="valider" value="Valider"><br>
                </div>
            </form>
        </section>
        <br>
    </div>
</body>
</html>
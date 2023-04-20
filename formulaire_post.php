<!DOCTYPE html>
<html lang = "fr">
<head>
    <title>Nouveau Post</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php

include("./fonctions_BDD.php");
// Si la BDD n'est pas encore connecté alors
if(!is_db_connected()){
    // Connection à la BDD
    connect_db();
}
session_start();

// Variable permettant de vérifier si l'utilisateur souhaite supprimer un post
$suppression = false;
// Récupération de l'id du post (positif pour le modifier, négatif pour le supprimer, 0 pour le créer)
$id = $_GET["id"];
// si l'id transmis est négatif on le repasse en positif est on passe $suppression à true
if($id < 0){
    $id = -$id;
    $suppression = true;
}

//Si le post existe déjà, récupérer les champs déjà remplis
if($id != 0){
//Récupération de l'image et de la description du post
    $query = "SELECT image, description FROM `post` WHERE id = ".$id.";";
    $post1 = $conn->query($query);
    $post = $post1->fetch_assoc();
}

// Récupération de l'id du profil connecté
$user = $_SESSION["userID"];

?>
<body>                 
<!--------------------------------------- header de la page de post ----------------------------------------------------------------->
    
    <header id = "hpost">
        <h1>
            <?php
            // Affichage de l'entête du post en fonction de ce qui est souhaité par l'itilisateur
                if($id == 0){
                    echo("Nouveau Post");
                }elseif($suppression == false){
                    echo("Modifier le Post");
                }else{
                    echo("Voulez vous supprimer ce post ?");
                }
            ?>
            <a href = "<?php echo("./profil.php?id=$user")?>">Retour au profil</a>
        </h1>
    </header>

<!--------------------------------------- formulaire du nouveau post ----------------------------------------------------->
    
    <section id="formulaire_post">
        <form action="#" method="POST" url="/upload-picture" enctype="multipart/form-data"><br>
            <button id="p_submit" name ="p_button" <?php if($suppression){echo("hidden");}?>><label for="p_input" id="p_label" name ="p_label">
            <?php
                if($id == 0){
                    echo("Choisir une image");
                }elseif($suppression == false){
                    echo("Changer l'image");
                }
                ?>
            </label></button>
            <input type="file" id="p_input" name="file" onchange="previewPicture(this)" style="display : none;" required>
            <div id = "p_image">
                <img src=<?php
                if($id == 0){
                    echo("#");
                }else{
                    echo($post["image"]);
                }
                ?> alt="" id="image" style="width: 100%; height: 100%;" >
            </div>
            <br>
            <div class="input">
                <input type="text" id="description" name="description" value = <?php
                if($id == 0){
                    echo("");
                }else{
                    echo($post["description"]);
                }
                ?>><br>
            </div>
            <br>
            
            <?php
                if($id == 0){
                    echo '<button type="submit" id="p_submit" name="p_submit">Uploader</button>';
                }elseif($suppression == false){
                    ?><button type="submit" id="p_submit" name="p_submit">Update</button><?php
                    // Si le champs n'est pas rempli on garde l'image initiale
                    $filename = $post["image"];
                    // Si le champs de l'image a été remplie (modification de l'image d'un post existant)
                    if(isset($_FILES['file'])){
                        // Récupération du chemin de l'image
                        $filename = add_img();
                    }
                    $description = $post["description"];
                    echo($description);
                    echo($filename);
                    
                }else{
                    ?>
                        <button type="submit" id="p_submit" name="p_submit" onclick="supprimer_post(<?php echo($id) ?>)">Delete</button>
                        <script>
                            function supprimer_post(id_post) {
                                const xhttp = new XMLHttpRequest();
                                xhttp.open("GET", "supprimer_post.php?id=" + id_post, true);
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                         window.location.href = "http://localhost/Projet_WE4A/profil.php?id=<?php echo $_SESSION["userID"]; ?>";
                                    }
                                };
                                xhttp.send();
                            }
                        </script>
                    <?php
                }
                ?>
            
        </form>
    </section>
    

<!-------------------------------------- script permettant de prévisualiser l'image ------------------------------------------------->

    <script type="text/javascript" >
        // L'image img#image
        var image = document.getElementById("image");
         
        // La fonction previewPicture
        var previewPicture  = function (e) {
    
            // e.files contient un objet FileList
            const [picture] = e.files
    
            // "picture" est un objet File
            if (picture) {
                // On change l'URL de l'image
                image.src = URL.createObjectURL(picture)
            }
        } 
    </script>

    <?php
    function add_img(){
        // Récupération du chemin temporaire de l'image
        $tmpName = $_FILES['file']['tmp_name'];
        // Récupération du nom de l'image
        $name = $_FILES['file']['name'];
        // Récupération de la taille de l'image
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];

        if(is_uploaded_file($tmpName)){
            // Récupération de nom du fichier sous forme de tableau en prenant "." comme séparateur
            $explodedName = explode('.', $name);
            // Récupération de l'extension de l'image (dernier élèment du tableau)
            $extension = strtolower(end($explodedName));
            // Création d'un id unique pour avoir un nom spécifique à chaque image
            $uniq = uniqid('', true);
            // Concaténation du nom avec l'extension de l'image
            $newName = "./images/photo_post/".$uniq.".".$extension;
            // Uploader l'image dans le dossier prévu
            move_uploaded_file($tmpName, $newName);
        }
        return $newName;
    }
    ?>
    
</body>
</html>
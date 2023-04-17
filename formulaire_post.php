<!DOCTYPE html>
<html lang = "fr">
<head>
    <title>Nouveau Post</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
//Récupération de l'id du post (vaut -1 si le post n'a pas encor été créé)
$id = $_GET["id"];
$query = "SELECT image, description FROM `post` WHERE id = ".$id.";";
$post1 = $conn->query($query);
$post = $post1->fetch_assoc();
?>
<body>                 
<!--------------------------------------- header de la page de post ----------------------------------------------------------------->
    
    <header id = "hpost">
        <h1>
            <?php
                if($id == -1){
                    echo("Nouveau Post");
                }else{
                    echo("Modifier le Post");
                }
            ?>
        </h1>
    </header>

<!--------------------------------------- formulaire du nouveau post ----------------------------------------------------->
    
    <section id="formulaire_post">
        <form action="#" method="POST" url="/upload-picture" enctype="multipart/form-data"><br>
            <button id="p_submit"><label for="p_input" id="p_label">Choisir une image</label></button>
            <input type="file" id="p_input" name="file" onchange="previewPicture(this)" style="display : none;" required>
            <div id = "p_image">
                <img src=<?php
                if($id == -1){
                    echo("#");
                }else{
                    echo($post["image"]);
                }
                ?> alt="" id="image" style="width: 100%; height: 100%;" >
            </div>
            <br>
            <div class="input">
                <input type="text" id="description" name="description" value = <?php
                if($id == -1){
                    echo("");
                }else{
                    echo($post["description"]);
                }
                ?>><br>
            </div>
            <br>
            <button type="submit" id="p_submit">Uploader</button>
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
    
</body>
</html>
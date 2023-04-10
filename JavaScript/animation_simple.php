

<script>
    function like_click() {
    
    var image = document.getElementById('like_img');
    if (image.src.match("./images/like_off.png")) {
        image.src = "./images/like_on.png";
        <?php
            $query = "INSERT INTO `like` (id_post, id_utilisateur) VALUES (4, 2);";
            mysqli_query($conn, $query);
        ?>
    } else {
        image.src = "./images/like_off.png";
        <?php
            //$query = "DELETE FROM `like` WHERE id_post = 4 AND id_utilisateur = 2;";
            //mysqli_query($conn, $query);
        ?>
    }
    
    }
</script>

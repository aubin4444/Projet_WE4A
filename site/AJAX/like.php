<script>
//La fonction like_click va envoyé une requête HTTP pour liker ou disliker un certain post
//Elle va également réaliser un certain nombre de tâche si la requêtes c'est bien déroulé avec le "..onreadystatechange = function()"
//Ses tâches seront de changer l'état du like ("on" si on like et "off" si on dislike) et va mettre à jour le nombre de like du post
function like_click(post_id, nb_likes) {
    const xhttp = new XMLHttpRequest(); //création d'une requête HTTP
    var like = document.getElementById('like_img_' + post_id); //récupération de l'HTML "like_img" du post d'id "post_id" et la stocke dans like
    var nb_like = document.getElementById('nb_likes_post_' + post_id); //récupération de l'HTML "nb_like_post" du post d'id "post_id" et la stocke dans nb_like


    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            if (like.src.match("./images/like_off.png")) { //si le coeur est off et qu'on clique dessus il devient on
                like.src = "./images/like_on.png";
                nb_likes += 1; //le nombre de likes est augmenté de 1
                nb_like.textContent = nb_likes + " likes" //modification du contenu HTML de nb_like
            } else if (like.src.match("./images/like_on.png")){ //si le coeur est on et qu'on clique dessus il devient off
                like.src = "./images/like_off.png";
                if(nb_likes != 0){ //si le nombre de like est différent de 0
                    nb_likes -= 1; //le nombre de like est diminué de 1
                    nb_like.textContent = nb_likes + " likes" //modification du contenu HTML de nb_like
                }
            } 
        }
        location.reload(); //forcer le rafraichissement de la page
    }

    //configuration de la requête Http avec la méthode GET
    if(like.src.match("./images/like_off.png")){ 
        xhttp.open("GET", "./lancer_like.php?var=" + post_id, true); //requête allant exécuter le fichier lancer_like.php
    } else if (like.src.match("./images/like_on.png")){
        xhttp.open("GET", "./lancer_unlike.php?var=" + post_id, true); //requête allant exécuter le fichier lancer_unlike.php
    }

    xhttp.send(); //envoie de la requête
}
</script>

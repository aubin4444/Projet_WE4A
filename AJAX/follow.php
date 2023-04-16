
<script>

function loadSimple(currentText) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(document.getElementById("link_follower")){ //Pour le bouton follow du fil d'actu
            document.getElementById("follow").innerHTML = this.responseText;
            //Ne plus afficher le bouton follow lorsqu'on clique dessus
            //Car une amitié c'est créée
            document.getElementById("follow").textContent = "";
        } else if (document.getElementById("bouton_follow")){ //Pour le bouton follow du profil
            //Vérifie le bouton follow du profil lorsque qu'on clique dessus
            //Son textContent passe à Ami si il était Follow et Follow s'il était Ami
            if(document.getElementById("follow").textContent == "Follow"){
                document.getElementById("follow").textContent = "Ami";
            } else if(document.getElementById("follow").textContent == "Ami"){
                document.getElementById("follow").textContent = "Follow";
            }
        }
    }
    //Envoie de la l'id de l'ami passé en paramètre de la fonction loadSimple avec la méthode GET
    //Si c'est le bouton follow du fil d'actu ou le bouton follow du profil et que son textContent est Follow
    //La requête ajax ouvre le fichier lancer follow pour ajouter le lien d'amitié à la table ami
    if(document.getElementById("link_follower") || document.getElementById("bouton_follow") && document.getElementById("follow").textContent == "Follow"){
        xhttp.open("GET", "./lancer_follow.php?var=" + currentText, true); 
    } 
    //Si c'est le bouton follow du profil et que son textContent est Ami
    //La requête ajax ouvre le fichier lancer unfollow pour supprimer le lien d'amitié de la table ami
    else if(document.getElementById("bouton_follow") && document.getElementById("follow").textContent == "Ami"){
        xhttp.open("GET", "./lancer_unfollow.php?var=" + currentText, true); 
    }
    xhttp.send();
}

</script>

<!--Bouton follow permettant d'envoyer une requete SQL pour follow quelqu'un-->
<a id="follow" onclick="loadSimple(<?php echo $id ?>)">Follow</a>

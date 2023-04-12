<script>

function loadSimple(currentText) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("unfollow_profil").innerHTML = this.responseText;
        document.getElementById("unfollow_profil").textContent = "Follow";
        
    }
    //Envoie de la l'id de l'ami passé en paramètre de la fonction loadSimple avec la méthode GET
    xhttp.open("GET", "./lancer_unfollow.php?var=" + currentText, true); 
    xhttp.send();
}

</script>

<!--Bouton follow permettant d'envoyer une requete SQL pour unfollow quelqu'un-->
<li><a id="unfollow_profil" onclick="loadSimple(<?php echo $id ?>)">Ami</a></li>
  
  


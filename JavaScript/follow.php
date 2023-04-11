
<script>

function loadSimple(currentText) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("follow").innerHTML = this.responseText;
    }
    //Envoie de la l'id de l'ami passé en paramètre de la fonction loadSimple avec la méthode GET
    xhttp.open("GET", "./lancer_follow.php?var=" + currentText, true); 
    xhttp.send();
}

</script>
<!--Bouton follow permettant d'envoyer une requete SQL pour follow quelqu'un-->
<a id="follow" onclick="loadSimple(<?php echo $id ?>)">Follow</a>
  
  


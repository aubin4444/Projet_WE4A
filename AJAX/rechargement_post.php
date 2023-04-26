<script>
    async function loadPost(numberOfPost){
        const post = document.getElementById('recharge_post'); //Récupère l'élément du document HTML ayant l'ID 'recharge_post' et le stocke dans la variable post.
        if(post != null){ //Vérifie si l'élément post existe et le supprime s'il est présent.
            post.remove();
        }

        //Envoie une requête AJAX asynchrone en utilisant la méthode fetch vers l'URL "./lancer_recharge.php?firstPost=" + numberOfPost, en attendant la réponse avant de continuer l'exécution 
        //stocke la réponse de la requête dans AJAXrequete
        var AJAXrequete =await fetch("./lancer_recharge.php?firstPost=" + numberOfPost); 

        //Récupère l'élément du document HTML ayant l'ID 'show_post' et le stocke dans la variable reload.
        reload = document.getElementById('show_post');
        //Ajoute le contenu de la réponse AJAX à la fin du contenu actuel de l'élément reload en utilisant la propriété innerHTML.
        reload.innerHTML =reload.innerHTML +await AJAXrequete.text();
    }

</script>

<!-- Cette div va permettre à la requête AJAX par la méthode fetch d'écrire les nouveaux posts chargé -->
<div id="show_post">

</div>
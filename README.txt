Connexion BDD : 

Nom de la BDD : helloworld
username : "root"
password : ""

Problème :

-   Nous avons remarqué que lorsque l'on essaye de modifier un post, l'utilisateur est obligé de sélectionner une image (cela vient du fait que pour que notre post soit Update, une condition "if(isset($FILE[""]))" doit être remplise).

Elements inactif : 

-   Parmis les élèments se trouvants sur le poste, le bouton partager, le bouton commentaire et la date du poste sont uniquement des élèments HTML (ils ne fonctionnent donc pas)
-   Dans la barre de menu d'un profil, les sections "Mes aventures" et "Mes kiffes" ne sont reliées à rien 
-   sur le fil d'actualité la section "Carte" n'est reliées à rien
-   Sur le fil d'actualité la section recommandations est juste un div HTML inactif

Comptes BDD : 

alice.martin@mail.com
pass_alice
lucas.leroy@mail.com
pass_lucas
marie.garcia@mail.com
pass_marie
alex.dubois@mail.com
pass_alex
sophie.rousseau@mail.com
pass_sophie
kevin.nguyen@mail.com
pass_kevin
jules.lefevre@mail.com
pass_jules
emma.moreau@mail.com
pass_emma
hugo.girard@mail.com
pass_hugo

Posts :

-   Pour créer un post cliquer sur le + en haut à droite du profil
-   Pour changer l'avatar cliquer sur le logo settings en haut à droite du profil
-   Pour modifier ou supprimer un post cliquer sur les liens présents en bas à droite d'un post depuis le profil
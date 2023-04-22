<?php
// Fonction de connaction à la BDD
function connect_db(){
    // Création des variables de connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "helloworld";
    global $conn;
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Test de connection 
    if ($conn->connect_error) {
    die("Erreur de connection : " . $conn->connect_error);
    }
}

function is_db_connected(){
    global $conn;
    return isset($conn) && !is_null($conn);
}

function disconnect_db(){
	global $conn;
	$conn->close();
}


function SecurizeString_ForSQL($string) {
    $string = trim($string);
    $string = stripcslashes($string);
    $string = addslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

function CheckLogin(){
    global $conn, $username, $userID;

    $error = NULL; 
    $loginSuccessful = false;
    $loginAttempted = false;

    //Données reçues via le formulaire
	if(isset($_POST["mail"]) && isset($_POST["password"])){
		$username = SecurizeString_ForSQL($_POST["mail"]);
		$password = md5($_POST["password"]);
		$loginAttempted = true;
	}
    
    //Si un login a été tenté, on interroge la BDD
    if ($loginAttempted){
        $query = "SELECT * FROM `utilisateur` WHERE email = '".$username."' AND mot_de_passe = '".$password."'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();

        if ($row["id"] != NULL){
            $userID = $row["id"];
            $loginSuccessful = true;
        } else {
            $error = "Ce couple login/mot de passe n'existe pas. Créez un Compte";
        }
    }
	
	$resultArray = ['Successful' => $loginSuccessful, 
					'Attempted' => $loginAttempted, 
					'ErrorMessage' => $error,
					'userID' => $userID];
    
    return $resultArray;
}

function CheckNewAccountForm(){
    global $conn;

    $creationSuccessful = false;
    $creationAttempted = false;
    $error = NULL;
        
    // Vérifier que tous les champs d'inscription on bien été saisi
    if(isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["email"]) && isset($_POST["pseudo"]) && isset($_POST["password"]) && isset($_POST["confpassword"])){
            
        $creationAttempted = true;
        // Récupération du nombre de ligne contenant l'adresse mail saisie dans le champs d'inscription "email"
        $query = "SELECT COUNT(*) FROM `utilisateur` WHERE email = '".$_POST["email"]."';";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        // Vérification de l'unicité de l'adresse mail saisie
        if ($row["COUNT(*)"] > 0){
            $error = "Un compte est déjà associé à cette adresse mail";
        }
        // Vérification de la saisie d'un mot de passe suffisament long 
        elseif ( strlen($_POST["password"]) < 4 ){
            $error = "Un nom utilisateur doit avoir une longueur d'au moins 4 lettres";
        }
        // Vérification de l'égalité entre le champs mot de passe et le champs confirmation mot de passe 
        elseif ( $_POST["password"] != $_POST["confpassword"] ){
            $error = "Le mot de passe et sa confirmation sont différents";
        }
        else {
            // Récupération des informations de l'utilisateur
            $username = SecurizeString_ForSQL($_POST["name"]);
            $password = md5($_POST["password"]);
            $firstname = $_POST["firstname"];
            $pseudo = $_POST["pseudo"];
            $email = $_POST["email"];
            // Création d'une requête avec ces informations afin d'enregistrer un nouvel utilisateur dans la BDD
            $query = "INSERT INTO `utilisateur` (prenom, nom, pseudo, email, mot_de_passe) VALUES('$firstname','$username','$pseudo','$email', '$password')";
            $result = $conn->query($query);

            if( mysqli_affected_rows($conn) == 0 )
            {
                $error = "Erreur lors de l'insertion SQL. Essayez un nom/password sans caractères spéciaux";
            }
            if($error == NULL){
                $creationSuccessful = true;
            }
                
        }
    }
    

    

	$resultArray = ['Attempted' => $creationAttempted, 
					'Successful' => $creationSuccessful, 
					'ErrorMessage' => $error];

    return $resultArray;
}
?>
<?php
// Fonction de connaction à la BDD
function Connect_db(){
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
		$password = $_POST["password"];
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

    $creationAttempted = false;
    $creationSuccessful = false;
    $error = NULL;

    //Données reçues via formulaire?
    if(isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["email"]) && isset($_POST["pseudo"]) && isset($_POST["password"]) && isset($_POST["confpassword"])){

        $creationAttempted = true;

        //Form is only valid if password == confirm, and username is at least 4 char long
        if ( strlen($_POST["name"]) < 4 ){
            $error = "Un nom utilisateur doit avoir une longueur d'au moins 4 lettres";
        }
        elseif ( $_POST["password"] != $_POST["confpassword"] ){
            $error = "Le mot de passe et sa confirmation sont différents";
        }
        else {
            $username = SecurizeString_ForSQL($_POST["name"]);
            $password = $_POST["password"];
            $firstname = $_POST["firstname"];
            $pseudo = $_POST["pseudo"];
            $email = $_POST["email"];

            $query = "INSERT INTO `utilisateur` (prenom, nom, pseudo, email, mot_de_passe) VALUES('$firstname','$username','$pseudo','$email', '$password')";
            $result = $conn->query($query);

            if( mysqli_affected_rows($conn) == 0 )
            {
                $error = "Erreur lors de l'insertion SQL. Essayez un nom/password sans caractères spéciaux";
            }
            else{
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
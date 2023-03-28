<?php
// Fonction de connaction à la BDD
function ConnectDatabase(){
    // Création des variables de connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "helloworld";
    global $conn;
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Test de connection 
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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

    //Données reçues via le formulaire
	if(isset($_POST["mail"]) && isset($_POST["password"])){
		$username = SecurizeString_ForSQL($_POST["mail"]);
		$password = md5($_POST["password"]);
		$loginAttempted = true;
	} else {
		$loginAttempted = false;
	}
    
    //Si un login a été tenté, on interroge la BDD
    if ($loginAttempted){
        $query = "SELECT * FROM utilisateur WHERE email = '".$username."' AND mot_de_passe ='".$password."'";
        $result = $conn->query($query);

        if ( $result != false ){
            $row = $result->fetch_assoc();
            $userID = $row["id"];
            $loginSuccessful = true;
        } else {
            $error = "Ce couple login/mot de passe n'existe pas. Créez un Compte";
        }
    }
	
	$resultArray = ['Successful' => $loginSuccessful, 
					'Attempted' => $loginAttempted, 
					'ErrorMessage' => $error,
					'userID' => $userID,
                    '1' => $_POST["password"]];

    return $resultArray;
}
?>
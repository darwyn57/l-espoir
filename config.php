<?php
// Informations d'identification
define('DB_SERVER', 'localhost');// Adresse du serveur de base de données
define('DB_USERNAME', 'root');// Nom d'utilisateur de la base de données
define('DB_PASSWORD', '');// Mot de passe de la base de données
define('DB_NAME', 'espoir');// Nom de la base de données
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());// Si la connexion échoue, afficher un message d'erreur
}
?>
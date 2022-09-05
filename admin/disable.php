<?php
// On démarre une session
require_once('../config.php');
session_start();

if(!isset($_SESSION["username"])){
    header("Location: ./login.php");
    exit(); 
  } 

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id'])){
    

    // On nettoie l'id envoyé
    $id = htmlspecialchars($_GET['id']);

    $query = "SELECT * FROM `users` WHERE `id` = '$id'";

    $res = mysqli_query($conn, $query);// Exécution de la requête
    $user = $res->fetch_assoc();
   

      if(!$user){
        
                    $_SESSION['erreur'] = "Cet id n'existe pas";
                    header('Location: ./home.php');
                }

    $actif = ($user['actif'] == 0) ? 1 : 0;
   

    $query = "UPDATE `users` SET `actif`='$actif' WHERE `id` = '$id'";

    $res = mysqli_query($conn, $query);
    //on modifie l'utilisateur dans la base de données    
      
    
    
    header('Location: ./home.php');

}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: ./home.php');
}

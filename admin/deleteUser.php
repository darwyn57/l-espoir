
<?php


require('../config.php');
session_start();
  // Initialiser la session
  
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
   // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
   if(!isset($_SESSION["username"])){
    header("Location: ./login.php");
    exit(); 
  } 
  
  
  
  if(isset($_GET['id'])){
      $id = htmlspecialchars( $_GET['id']);
      $query = "DELETE FROM users WHERE id = $id";
      $result = mysqli_query($conn, $query);
      header('Location: ./home.php');  
   
    }else{
      echo "Erreur";
    }
  
?>







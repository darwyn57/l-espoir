<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha512-xA6Hp6oezhjd6LiLZynuukm80f8BoZ3OpcEYaqKoCV3HKQDrYjDE1Gu8ocxgxoXmwmSzM4iqPvCsOkQNiu41GA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="../public/style.css" />
</head>
<body>
<?php
require('../config.php');
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION["username"])){
  header("Location: ./login.php");
  exit(); 
} 


if (isset($_POST['username'], $_POST['email'], $_POST['type'], $_POST['password'])){// on verifie Si les variables existent
  // récupérer le nom d'utilisateur 
  $username = stripslashes($_POST['username']);// Supprime les slashs d'une chaîne de carractères
  $username = mysqli_real_escape_string($conn, $username); // on protège les données
  // récupérer l'email 
  $email = stripslashes($_POST['email']);// Supprime les slashs d'une chaîne de carractères
  $email = mysqli_real_escape_string($conn, $email);// on protège les données
  // récupérer le mot de passe 
  $password = stripslashes($_POST['password']);// Supprime les slashs d'une chaîne de carractères
  $password = mysqli_real_escape_string($conn, $password);// on protège les données
  // récupérer le type (user | admin)
  $type = stripslashes($_POST['type']);// Supprime les slashs d'une chaîne de carractères
  $type = mysqli_real_escape_string($conn, $type); // on protège les données
  
    $query = "INSERT into `users` (username, email, type, password)
          VALUES ('$username', '$email', '$type', '".hash('sha256', $password)."')";// Insertion du nouvel utilisateur dans la base de données
    $res = mysqli_query($conn, $query);// Exécution de la requête

    if($res){// Si la requête s'est exécutée avec succès l'utilisateur est crée
       echo "<div class='sucess'>
             <h3>L'utilisateur a été créée avec succés.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
       </div>";
    }
}else{
?>
<main>
<div class="formRegister">
  <h2 class="box-logo box-title">
  <img src="../upload/LOGO-LespoirC04.png">
  </h2>
<form class="addUser" action="" method="post">
    <div class="" style="--i: .6s">
      <a href="../public/index.php" class="btn solid"><i class="fas fa-home navbar-icon">Home</i></a>
    </div>
    <h1 class="box-title">Ajout d'un utilisateur</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
  
    <input type="text" class="box-input" name="email" placeholder="Email" required />
  
  <div>
      <select class="box-input" name="type" id="type" >
        <option value="" disabled selected>Type</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
  </div>
  
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" value="+ Add" class="box-button" />  
</form>
</main>
<footer><p>Tous droit réservés &copy; 2022 Association-L'éspoir.</p></footer>



<?php } ?>



<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</body>
</html>
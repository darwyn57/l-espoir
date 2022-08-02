<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./public/style.css"/>
</head>
<body>
<?php
session_start();

require('config.php');

if (isset($_POST['username'])){
  $username = stripslashes($_POST['username']);//on supprime les éventuels caractères spéciaux
  $username = mysqli_real_escape_string($conn, $username);//on sécurise les données
  $_SESSION['username'] = $username;//on enregistre les données dans une variable de session
  $password = stripslashes($_POST['password']);//on supprime les éventuels caractères spéciaux
  $password = mysqli_real_escape_string($conn, $password);//on sécurise les données
    $query = "SELECT * FROM `users` WHERE username='$username' 
  and password='".hash('sha256', $password)."'";//on fait une requête pour vérifier si les données sont correctes
  
  $result = mysqli_query($conn,$query) or die(mysqli_connect_error());//on exécute la requête
  
  if (mysqli_num_rows($result) == 1) {//si le nombre de résultats est égal à 1
    $user = mysqli_fetch_assoc($result);//on récupère les données de l'utilisateur
    // vérifier si l'utilisateur est un administrateur ou un utilisateur
    if ($user['type'] == 'admin') {
      header('location: admin/home.php'); // si c'est un administrateur, on le redirige vers la page d'administration     
    }else{
      header('location: ./public/index.php');//si c'est un utilisateur, on le redirige vers la page d'accueil
    }
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";//si les données sont incorrectes, on affiche un message d'erreur
  }
}
?>

<form class="formLogin" action="" method="post" name="login">
<h2 class="box-logo box-title">
  <img src="./upload/LOGO-LespoirC04.png">
  </h2>
<h1 class="box-title">Connexion</h1>
<div class="" style="--i: .6s">
  <a href="./public/index.php" class="btn solid"><i class="fas fa-home navbar-icon">Home</i></a>
</div>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? 
  <a href="register.php">S'inscrire</a>
</p>

<?php if (!empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>

<footer>
        <p>Tous droit réservés &copy; 2022 Association-L'éspoir.</p>
        
      </footer>


<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</body>
</html>
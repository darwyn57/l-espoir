<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./public/style.css" />
</head>
<body>
<?php
require('config.php');

if (isset($_POST['username'], $_POST['email'], $_POST['password'])){
  // récupérer le nom d'utilisateur 
  $username = stripslashes($_POST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email 
  $email = stripslashes($_POST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe 
  $password = stripslashes($_POST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  
  $query = "INSERT into `users` (username, email, type, password)
        VALUES ('$username', '$email', 'user', '".hash('sha256', $password)."')";
  $res = mysqli_query($conn, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<form class="formRegister" action="" method="post">
  <h2 class="box-logo box-title">
  <img src="./upload/LOGO-LespoirC04.png">
  </h2>  
<div class="" style="--i: .6s">
  <a href="./public/index.php" class="btn solid"><i class="fas fa-home navbar-icon">Home</i></a>
</div>
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="username" 
  placeholder="Nom d'utilisateur" required />
  
    <input type="text" class="box-input" name="email" 
  placeholder="Email" required />
  
    <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" 
  value="S'inscrire" class="box-button" />
  
    <p class="box-register">Déjà inscrit? 
  <a href="login.php">Connectez-vous ici</a></p>
</form>
<footer>
        <p>Tous droit réservés &copy; 2022 Association-L'éspoir.</p>
        
      </footer>

<?php } ?>



<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</body>
</html>
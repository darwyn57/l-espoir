<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../public/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha512-xA6Hp6oezhjd6LiLZynuukm80f8BoZ3OpcEYaqKoCV3HKQDrYjDE1Gu8ocxgxoXmwmSzM4iqPvCsOkQNiu41GA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
 
  //  On récupère l'utilisateurs

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id"; // raquette qui récupère les données de l'utilisateur
    $result = mysqli_query($conn, $query); // $conn est une variable définie dans config.php
    $user = mysqli_fetch_assoc($result);  // $user contient les données de l'utilisateur
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['type']) && isset($_POST['password'])){
      $username=$_POST['username'];
      $email=$_POST['email'];
      $type=$_POST['type'];      
      $password=$_POST['password'];
      $password= hash('sha256', $password); 
      
  
    $query = "UPDATE users SET username='$username', email='$email', type='$type', password='$password' WHERE id='$id'";    // requête qui met à jour les données de l'utilisateur 
    $res = mysqli_query($conn, $query);
//on modifie l'utilisateur dans la base de données
    if($res){
       echo "<div class='sucess'>
             <h3>L'utilisateur modifié avec succés.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
       </div>";
    
    }
  }
}
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
    <h1 class="box-title">Modifier utilisateur</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" value="<?= $user['username']?>"required ></input>
  
    <input type="text" class="box-input" name="email" placeholder="Email"  value="<?=$user['email'] ?>" required />
  
  <div>
      <select class="box-input" name="type" id="type" >
        <option value="" disabled selected>Type</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
  </div>
  
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" value="Modifier" class="box-button" />  
</form>
</main>
<footer><p>Tous droit réservés &copy; 2022 Association-L'éspoir.</p></footer>







<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</body>
</html>
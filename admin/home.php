<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha512-xA6Hp6oezhjd6LiLZynuukm80f8BoZ3OpcEYaqKoCV3HKQDrYjDE1Gu8ocxgxoXmwmSzM4iqPvCsOkQNiu41GA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/style.css"/>
  <title>Admin</title>
</head>
<body>
<?php

require('../config.php');
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
  
  // On récupère tous les utilisateurs
 $query = "SELECT *  FROM users";
 $users = mysqli_query($conn,$query);
 $users= mysqli_fetch_all($users, MYSQLI_ASSOC);
 
 // fetchAll() permet de récupérer plusieurs enregistrements
 

?>
<main>
<div class="sucess">
    
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>    
    <p>Ceci est votre espace admin.</p>
    <a href="add.user.php">Add user</a> 
    
    <a href="../logout.php">Déconnection</a>
    </ul>
    </div>
<div class="formRegister">
  <h2 class="box-logo box-title">
  <img src="../upload/LOGO-LespoirC04.png">
  </h2>
  <span id="date_time"></span>
 
  <table class="table">
    <tr>
        <th>user</th>
        <th>type</th>
        
    </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td scope="row"><?= $user['username'] ?></td>
                <td><?= $user['type'] ?></td>
                
                <td><a href="updateUser.php?id=<?= $user['id'] ?>"><i class="fas fa-pen-alt" style="color: green"></i></a>
                <a href="deleteUser.php?id=<?= $user['id'] ?>"onclick="return window.confirm('etes vous sur de supprimer cet utilisateur')"><i class="fas fa-trash-alt" style="color: red"></i></a>   
                                
                
                </td> 
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</main>
<footer><p>Tous droit réservés &copy; 2022 Association-L'éspoir.</p></footer>





<script src="../public/script-js/heure.js"></script>
<script type="text/javascript">window.onload = date_time('date_time');</script>

<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="./public/style.css">
    <title>Association l'éspoir</title>
</head>

<body>
    <header>
        <div class="container">
            <input type="checkbox" name="" id="check">
            
            <div class="logo-container">
                <h3 class="logo"><img src="./upload/LOGO-LespoirC04.png"></h3>
            </div>

            <div class="nav-btn">
                <div class="nav-links">
                    <ul>
                        <li class="nav-link" style="--i: .6s">
                            <a href="./public/index.php">Accueil<i class="fas fa-home navbar-icon"></i></a>
                        </li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="#">Le Projet<i class="fas fa-duotone fa-mosque navbar-icon"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="#">Spirituel</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Écologique</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Social</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="#">Je donne<i class="fas fa-euro-sign navbar-icon"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="#">Rejoint l'éspoir family</a>
                                    </li>                                    
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="#">L'association<i class="fas fa-users navbar-icon"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="#">Éducation</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Événements</a>
                                    </li>                                    
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="contact.php">Contact<i class="fas fa-phone navbar-icon"></i></a>
                            <div class="dropdown">
                        </li>
                    </ul>
                </div>

                
            </div>

            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
    </header>
    
    <span id="date_time"></span>
        
        <form class="form"> 
        <h1>Bonjour Bienvenue a l'Espoir Family</h1>
        <br><br>
        
            <h2>Nous Contacter :</h2>         
            
           
            <input size="50" type="text" name="name" id="name" placeholder="Nom" required>

            
            
            <input size="50" type="text" Prénom="Prénom" id="Prénom" placeholder="Prénom" required>
            <br>
            <br>
    
                                           
            <input size="50"type="telephone" id="phone" name="telephone" placeholder="Téléphone">
            
            
            <input size="50" type="email" name="email" id="email" placeholder="your-email@site.com" required>
            <br>
            <br>
            <label for="">Votre méssage</label><br>
            <textarea name="message" id="message" cols="100" rows="10"></textarea>
            <br>
    
            <input size="50" type="submit" value="Envoyer!">
    
    
        </form>
   

</main>
<footer>
    <p>Tous droit réservés &copy; 2022 Association-L'éspoir.</p>
    
  </footer>
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
<script src="public/script-js/heure.js"></script>
<script type="text/javascript">window.onload = date_time('date_time');</script>
</body>

</html>
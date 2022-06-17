<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

if (isset($_POST['submit'])) {
    $email= $_POST['user_mail'];
    $password= $_POST['password'];
    $name= $_POST['user_name'];

    $reponse = $bdd->query("INSERT INTO users (user_name, user_mail, password) VALUES ('$name', '$email', '$password')");
}


/*$reponse = $bdd->query("SELECT * FROM users WHERE user_mail='$email' AND password='$password'");*/

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Namasté</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
    <body>
    <nav class="navbar" style="background-color: #D8BFD8;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="assets\img\icons8-home-50.png"></a>
        <img href="index.php" src= "assets\img\namaste-flor.jpg" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><img src="assets\img\icons8-home-50.png"></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Recettes</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Bien-Être</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    
        <h1>Formulaire de connexion:</h1>
        <div class="container">
            <form class="row g-3" action="form.php" method="post">
            <div class="col-auto">
                <label for="inputName2" class="visually-hidden">*</label>
                <input type="text" name= "user_name" class="form-control" id="inputName2" placeholder="Prénom Nom" required>
            </div>
            <br>
            <div class="col-auto">
                <label for="inputEmail2" class="visually-hidden">*</label>
                <input type="text" name= "user_mail" class="form-control" id="inputEmail2" placeholder="email@example.com" required>
            </div>
            <br>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">*</label>
                <input type="password" name="password" class="form-control" id="inputPassword2" placeholder="Password" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">S'inscrire</button>
            </div>
            </form>
        </div>

        <?php
        
        /*$reponse = $bdd->query("INSERT INTO users (user_name, user_mail, password) VALUES ('$name', '$email', '$password')");*/
      
        ?>

    <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
        ></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
        ></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-google"></i
        ></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
        ></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
        ></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-github"></i
        ></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
    </footer>
          
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   
  </body>
  
</html>


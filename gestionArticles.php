<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query("SELECT * FROM articles");
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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="categorie.php?categorie=Recettes">Recettes</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="categorie.php?categorie=Bien-être">Bien-Être</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="tab-mar">
    <h1>Articles:</h1>
    <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Catégorie</th>
                <th>Image</th>
                
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>

    <?php
    while($donnees = $reponse->fetch()){
      $text = nl2br($donnees['contenu']);
      $text = substr($text, 0, 60);
      $text = $text.'...';
        echo '<tr>';
        echo '<td>'.$donnees['id'].'</td>';
        echo '<td>'.$donnees['titre'].'</td>';
        echo '<td>'.$text.'</td>';
        echo '<td>'.$donnees['categorie'].'</td>';
        echo '<td><img class="img-xs" src="'.$donnees['image'].'" alt="'.$donnees['titre'].'" width="50px" height="50px"></td>';
        
        echo '<td><a class="btn" href="updateArticles.php?id='.$donnees['id'].'">Modifier</a></td>';
        echo '<td><a class="btn" href="updateArticles.php?id='.$donnees['id'].'">Supprimer</a></td>';
        echo '</tr>';
    }
    ?>
    </table>
  </div>

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

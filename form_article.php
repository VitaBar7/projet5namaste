<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}


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

    
    <?php
      

    if(isset($_POST['submit'])) {
        $titre= $_POST['titre'];
        $contenu= $_POST['contenu'];
        $imageURL= $_POST['image'];
        $categorie= $_POST['categorie'];
        $date= $_POST['date'];

    $sql = "INSERT INTO articles (titre, contenu, image, categorie, date) VALUES ('$titre', '$contenu', '$imageURL', '$categorie', '$date')";

    //var_dump($sql);
    $reponse = $bdd->query($sql);
    //var_dump($reponse);
    header("location: gestionArticles.php");
    
    }
    
    
    ?>

    <div class="container_form_article form_size">
        <form class="mb-3" action="form_article.php" method="post">
        <div class="titre">
        <label for="InputTitre" class="form-label">Titre</label>
        <input type="text" name= "titre" class="form-control" id="InputTitre" placeholder="Titre">
        </div>
        <div class="image">
        <label for="InputImage" class="form-label">Image URL</label>
        <input type="text" name= "image" class="form-control" id="InputImage" placeholder="URL">
        </div>
        <select name="categorie" class="form-select" aria-label="Default select example">
            <option selected>Choisir catégorie</option>
            <option value="Recettes">Recettes</option>
            <option value="Bien-être">Bien-être</option>
        </select>
        <div class="mb-3">
        <label for="TextareaContenu" class="form-label">Contenu</label>
        <textarea name="contenu" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ici le contenu de l'article..."></textarea>
        </div>
        <div class="date">
        <label for="Inputdate" class="form-label">Date</label>
        <input type="date" name="date" class="form-control" id="InputDate" placeholder="ici la date">
        </div>
       
        <break></break>
        <div class="col-auto">
            <button type="submit" name="submit" class="btn btn-primary mb-3">Ajouter</button>
        </div>
        
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script href= "style.css" rel="stylesheet"></script>
  </body>
</html>

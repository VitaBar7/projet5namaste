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
  </head>
  <body>
  <nav class="navbar" style="background-color: #D8BFD8;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <img href="#" src= "assets\img\namaste-flor.jpg" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
    <div class="container_form_article">
        <form class="mb-3">
        <label for="InputTitre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="InputTitre" placeholder="Titre">
        </div>
        <div class="image">
        <img src="..." class="rounded" alt="...">
        </div>
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCatÃ©gorie" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
        </button>
        <ul class="Catégorie">
            <li><span class="dropdown-item-text">Recettes</span></li>
            <li><span class="dropdown-item-text">Bien-Être</span></li>
            </ul>
        <div class="mb-3">
        <label for="TextareaContenu" class="form-label">Contenu</label>
        <textarea class="form-control" id="TextareaContenu" rows="50"></textarea>
        <div class="mb-3">
            <label for="Input" class="form-label">Catégorie</label>
            <input type="text" class="form-control" id="InputCatégorie" placeholder="Catégorie">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
        </div>
        
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script href= "style.css" rel="stylesheet"></script>
  </body>
</html>

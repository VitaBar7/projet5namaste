<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $categorie = $_POST['categorie'];
        $image = $_POST['image'];
        $date = $_POST['date'];
        $sql = "UPDATE articles SET titre = '$titre', contenu = '$contenu', categorie = '$categorie', image = '$image', date = '$date' WHERE id= $id";
        $reponse = $bdd->query($sql);
        header("location: gestionArticles.php");
    }


    $reponse = $bdd->query("SELECT * FROM articles WHERE id=$id ");
    $donnees = $reponse->fetch();

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

    <div class="container_form_article form_size">
        <form class="mb-3" action="updateArticles.php?id=<?php echo $id;?>" method="post">
        <div class="titre">
        <label for="InputTitre" class="form-label">Titre</label>
        <input type="text" name="titre" class="form-control" id="InputTitre" placeholder="titre" value="<?php echo $donnees['titre'];?>" required>
        </div>
        <div class="image">
        <label for="InputImage" class="form-label">Image URL</label>
        <input name="image" type="text" class="form-control" id="InputImage" placeholder="URL" value="<?php echo $donnees['image'];?>" required>
        </div>
        <select name="categorie" class="form-select" aria-label="Default select example">
            <option selected>Choisir catégorie</option>
            <option value="Recettes" <?php if($donnees['categorie'] == 'Recettes') echo 'selected';?>>Recettes</option>
            <option value="Bien-être" <?php if($donnees['categorie'] == 'Bien-être') echo 'selected';?>>Bien-être</option>
        </select>
        <div class="mb-3">
        <label for="TextareaContenu" class="form-label">Contenu</label>
        <textarea name="contenu" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Ici le contenu de l'article..."><?php echo $donnees['contenu'];?></textarea>
        </div>
        <div class="date">
        <label for="Inputdate" class="form-label">Date</label>
        <input type="date" name="date" class="form-control" id="InputDate" placeholder="ici la date" value="<?php echo $donnees['date'];?>" required>
        </div>
        <div class="col-auto">
            <button type="submit" name= "submit" class="btn btn-primary mb-3">Modifier</button>
        </div>
        <div class="col-auto">
            <a class="btn" href="deleteArticle.php?id=<?php echo $id;?>">Supprimer</a>
        </div>
        
        </form>
<?php
include 'footer.php';
?>
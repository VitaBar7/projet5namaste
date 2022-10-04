<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query("SELECT * FROM users");

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
        <img href="index.php"src= "assets\img\namaste-flor.jpg" alt="logo" class="logo">
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
    <div class="tab-mar">
    <h1>Utilisateurs:</h1>
    <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Mail</th>
                <th>Modifier collaborateur</th>
                <th>Supprimer collaborateur</th>
            </tr>


    <?php
    while($donnees = $reponse->fetch()){
    echo '<tr>';
    echo '<td>'.$donnees['id'].'</td>';
    echo '<td>'.$donnees['user_name'].'</td>';
    echo '<td>'.$donnees['user_mail'].'</td>';
    echo '<td><a class="btn" href="updateUsers.php?id='.$donnees['id'].'">Modifier</a></td>';
    echo '<td><a class="btn" href="deleteUser.php?id='.$donnees['id'].'">Supprimer</a></td>';
    echo '</tr>';
}
?>
</table>
</div>

<?php
include 'footer.php';
?>

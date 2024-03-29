<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query("SELECT * FROM articles");
?>

<?php
include 'head.php';
include 'navbar.php';
?>

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

<?php
include 'footer.php';
?>

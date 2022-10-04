<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}


?>
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

<?php
include 'head.php';
include 'navbar.php';
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

<?php
include 'footer.php';
?>

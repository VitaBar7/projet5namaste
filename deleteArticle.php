<?php


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
        $sql = "DELETE FROM articles WHERE id= $id";
        echo $sql;
        $reponse = $bdd->query($sql);
        header("location: gestionArticles.php");
    }
    
    $reponse = $bdd->query("SELECT * FROM articles WHERE id=$id ");
    $donnees = $reponse->fetch();
    
}
?>

<?php
include 'head.php';
include 'navbar.php';
?>

    <div class="container_form_article form_size">
        <h1>Confirmer la suppression :</h1>
        <form class="mb-3" action="deleteArticles.php?id=<?php echo $id;?>" method="post">
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
            <h4>Vous êtes sûr de vouloir supprimer?</h4>
            <div class="col-auto">
                <button type="submit" name="submit" class="btn btn-danger mb-3">Supprimer</button>
            </div>
        </form>
    </div>
<?php
include 'footer.php';
?>
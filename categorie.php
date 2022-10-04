<?php
session_start();

		try{
			$bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
		}catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}

        if(isset($_GET['categorie'])){
            $categorie = $_GET['categorie'];
        }else{
            $categorie = "Bien-être";
        }

        $reponse = $bdd->query("SELECT * FROM articles WHERE categorie='$categorie'");

?>
<?php
include 'head.php';
include 'navbar.php';
?>
    <h1>Notre selection de <?php echo $categorie;?> :</h1>
    
    
    <?='<div class="row">'; ?>
         
    <?php   
    while ($donnees = $reponse->fetch()) {
        $text = nl2br($donnees['contenu']);
        $text = substr($text, 0, 250);
        $text = $text.'...';
        
    ?>
        
            <div class ="col-sm-4">
              <div class="card" style="width: 24rem;">
                    <img src="<?php echo $donnees['image']; ?>" class="card-img-top img-size" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $donnees['titre']; ?></h5>
                        <p class="card-text card-index"><?php echo $text; ?></p>
                        <a href="article.php?id=<?php echo $donnees['id'];?>" class="btn btn-primary">Lire la suite</a>
                    </div>
                </div>
             </div>
        
    <?php } ?>
    <?='</div>'; ?>  

<?php
include 'footer.php';
?>

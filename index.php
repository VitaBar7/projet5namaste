
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
  <div class="container container-bg">
    <div class="title">
      <h1>Bienvenues à Namasté</h1>
      
      <h2>Voici nos derniers articles:</h2>
    </div>

    <?php
    $reponse = $bdd->query("SELECT * FROM articles LIMIT 9");?>
    
    <?='<div class="row">'; ?>
         
    <?php   
    while ($donnees = $reponse->fetch()) {
        $text = nl2br($donnees['contenu']);
        $text = substr($text, 0, 200);
        $text = $text.'...';
        
        ?>

            <div class ="col-sm-3">
              <div class="card" style="width: 18rem;">
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
  </div>
<?php
include 'footer.php';
?>


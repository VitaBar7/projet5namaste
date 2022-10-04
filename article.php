<?php
session_start();
include 'head.php';
include 'navbar.php';

		try{
			$bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
		}catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}

        $id="";

        if(isset($_GET['id'])){ 
            $id = $_GET['id']; 
        $reponse = $bdd->query("SELECT * FROM articles WHERE id=$id");    
        $donnees = $reponse->fetch();
            
        $text = nl2br($donnees['contenu']);

?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="<?php echo $donnees['image']; ?>" class="card-img-top img-size" alt="...">
                <h1><?php echo $donnees['titre']; ?></h1>
                <p><?php echo $text; ?></p>
              </div>
        </div>
    </div>
    
    <?php } ?>

<?php
include 'footer.php';
?>

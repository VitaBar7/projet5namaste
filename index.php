
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
  <section class="container title">
      <h1>Bienvenues à Namasté </h1>
      <p>bien-être \bjɛ̃.n‿ɛtʁ\ masculin invariable (orthographe traditionnelle)
        État, humeur, disposition agréable du corps et de l’esprit.<br>
        "Dés qu’il se sentit à couvert, il ralentit sa marche. Il était alors dans l’allée verte qui longe la muraille, derrière les planches. Là, il n’entendit même plus le bruit de ses pas ; l’herbe gelée craquait à peine sous ses pieds. Un sentiment de bien-être parut s’emparer de lui. Il devait aimer ce lieu, n’y craindre aucun danger, n’y rien venir chercher que de doux et de bon"
        — (Émile Zola, La Fortune des Rougon, G. Charpentier, Paris, 1871, ch. I ; réédition 1879, p. 9-10)</p>
  </section>
  <aside>
    <p>bien-être \bjɛ̃.n‿ɛtʁ\ masculin invariable (orthographe traditionnelle)
        État, humeur, disposition agréable du corps et de l’esprit.<br>
        "Dés qu’il se sentit à couvert, il ralentit sa marche. Il était alors dans l’allée verte qui longe la muraille, derrière les planches. Là, il n’entendit même plus le bruit de ses pas ; l’herbe gelée craquait à peine sous ses pieds. Un sentiment de bien-être parut s’emparer de lui. Il devait aimer ce lieu, n’y craindre aucun danger, n’y rien venir chercher que de doux et de bon"
        — (Émile Zola, La Fortune des Rougon, G. Charpentier, Paris, 1871, ch. I ; réédition 1879, p. 9-10)</p>
      <div><span>Saviez vous?</span> Les fanes de carottes on 6 fois plus de vitamine C que la carotte:
        <ul>
          <li>Anti-vieillissement.</li>
          <li>Booste le système immunitaire.</li>
          <li>Assainissement digestif et antifongique et parasitaire.</li>
          <li>Alcalinisant, aide contre l'acidification.</li>
          <li>Régule la pression artérielle.</li>
          <li>Détoxifiant et diurétique.</li>
        </ul>
      </div>

    
  </aside>
      
  <h3 class="container subtitle">↡ Voici nos derniers articles de recettes et conseils de bien-être ↡</h3>
  <div class="container container-bg">
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
                        <a href="article.php?id=<?php echo $donnees['id'];?>" class="btn btn-success">Lire la suite</a>
                    </div>
                </div>
             </div>
        
    <?php } ?>
    <?='</div>'; ?>  
  </div>
<?php
include 'footer.php';
?>


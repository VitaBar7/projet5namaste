<?php

		try{
			$bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
		}catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}


        $reponse = $bdd->query("SELECT * FROM articles WHERE categorie='Bien-être'");

include 'recettes.php';       

?>
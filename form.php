<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

if (isset($_POST['submit'])) {
    $email= $_POST['user_mail'];
    $password= $_POST['password'];
    $name= $_POST['user_name'];

    $reponse = $bdd->query("INSERT INTO users (user_name, user_mail, password) VALUES ('$name', '$email', '$password')");
    header("location: gestionArticles.php");
}


?>
<?php
include 'head.php';
include 'navbar.php';
?>
    
        <h1 class="container">Formulaire d'ajout utilisateur :</h1>
        <div class="container container-bg form_size">
            <form class="row pb-9 g-3" action="form.php" method="post">
            <div class="col-auto">
                <label for="inputName2" class="visually-hidden">*</label>
                <input type="text" name= "user_name" class="form-control" id="inputName2" placeholder="Prénom Nom" required>
            </div>
            <br>
            <div class="col-auto">
                <label for="inputEmail2" class="visually-hidden">*</label>
                <input type="text" name= "user_mail" class="form-control" id="inputEmail2" placeholder="email@example.com" required>
            </div>
            <br>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">*</label>
                <input type="password" name="password" class="form-control" id="inputPassword2" placeholder="Password" required>
            </div>
            <div class="col-auto">
                <button type="submit" name="submit" class="btn btn-success mb-3 signup">S'inscrire</button>
            </div>
            </form>
        </div>

    


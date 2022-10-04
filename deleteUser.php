
<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=projet5descodeuses;charset=utf8','root','');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        $user_name = $_POST['user_name'];
        $user_mail = $_POST['user_mail'];
        $password = $_POST['password'];
        $sql = "DELETE FROM users WHERE id= $id";
        echo $sql;
        $reponse = $bdd->query($sql);
        header("location: users.php");
    }

    $reponse = $bdd->query("SELECT * FROM users WHERE id=$id ");
    $donnees = $reponse->fetch();
}

?>
    
<?php
include 'head.php';
include 'navbar.php';
?>
        <div class="container">
            <h1>Confirmer la suppression :</h1>
            <form class="row g-3" action="deleteUser.php?id=<?php echo $id;?>" method="post">
                <div class="col-auto">
                    <label for="inputName2" class="visually-hidden">*</label>
                    <input type="text" name= "user_name" class="form-control" id="inputName2" placeholder="Prénom Nom" value="<?php echo $donnees['user_name'];?>">
                </div>
                <br>
                <div class="col-auto">
                    <label for="inputEmail2" class="visually-hidden">*</label>
                    <input type="text" name= "user_mail" class="form-control" id="inputEmail2" placeholder="email@example.com" value="<?php echo $donnees['user_mail'];?>" >
                </div>
                <br>
                <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden">*</label>
                    <input type="password" name="password" class="form-control" id="inputPassword2" placeholder="Password" value="<?php echo $donnees['password'];?>">
                </div>
                <div class="col-auto">
                    <button type="submit" name="submit" class="btn btn-primary mb-3">Supprimer</button>
                </div>
            </form>
        </div>
    
<?php
include 'footer.php';
?>

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
        $sql = "UPDATE users SET user_name = '$user_name', user_mail = '$user_mail', password = '$password' WHERE id= $id";
        $reponse = $bdd->query($sql);
        header("location: users.php");
    }


    $reponse = $bdd->query("SELECT * FROM users WHERE id=$id ");
    $donnees = $reponse->fetch();

}



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Namasté</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
    <body>
    <nav class="navbar" style="background-color: #D8BFD8;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="assets\img\icons8-home-50.png"></a>
        <img href="index.php" src= "assets\img\namaste-flor.jpg" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Recettes</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Bien-Être</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    
        <h1>Formulaire de modification :</h1>
        <div class="container">
            <form class="row g-3" action="updateUsers.php?id=<?php echo $id;?>" method="post">
            <div class="col-auto">
                <label for="inputName2" class="visually-hidden">*</label>
                <input type="text" name= "user_name" class="form-control" id="inputName2" placeholder="Prénom Nom" value="<?php echo $donnees['user_name'];?>" required>
            </div>
            <br>
            <div class="col-auto">
                <label for="inputEmail2" class="visually-hidden">*</label>
                <input type="text" name= "user_mail" class="form-control" id="inputEmail2" placeholder="email@example.com" value="<?php echo $donnees['user_mail'];?>" required>
            </div>
            <br>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">*</label>
                <input type="password" name="password" class="form-control" id="inputPassword2" placeholder="Password" value="<?php echo $donnees['password'];?>" required>
            </div>
            <div class="col-auto">
                <button type="submit" name="submit" class="btn btn-primary mb-3">Modifier</button>
            </div>
            </form>
        </div>


          
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   
  </body>
  
</html>


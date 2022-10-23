<?php
include 'db_connection.php';


if (isset($_POST['submit'])) {
    $email= $_POST['user_mail'];
    $password= $_POST['password'];
    $name= $_POST['user_name'];

    $reponse = $bdd->query("SELECT * FROM users WHERE user_mail = '$email' AND password= '$password'");

// $email = mysqli_real_escape_string($db,htmlspecialchars($_POST['user_mail']));
// $name = mysqli_real_escape_string($db,htmlspecialchars($_POST['user_name']));
// $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
 
    // if($email == 'user_mail' && $password == 'password')
    // {    
    //     session_start();
    //     $_SESSION['id']=session_id();
    //     echo "Logged in successfully";
    // }
    // else { echo "L'authentification n'a pas réussi";
    // }

    // create variable $_SESSION avec les differents parametre pour verifier apres plus facilement
    if($response = $reponse->fetch()) {
        echo "Login OK";
        
        $_SESSION["email"] = $response['user_mail'];
        $_SESSION["id"] = $response['id'];
        $_SESSION["user_name"] = $response['user_name'];
        header("location: gestionArticles.php");
        
        
        echo "<script type='text/javascript'>alert('Login OK');</script>";
        

        
    } else {
        echo "<script type='text/javascript'>alert('Votre email et/ou mot de passe est incorrect');</script>";
        
    }
}

?>

<?php include 'head.php'; ?>
<?php include 'navbar.php'; ?>
<section style="padding:150px"> <!--formulaire authentification des admins-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="border:1px solid black; padding:5px">
        <h2>Formulaire d'authentification</h2>
        <label for="name">Pseudo</label>
        <input type="text" name="user_name" id="name" placeholder="Entrez votre pseudo">
        <label for="email">Email</label>
        <input type="email" name="user_mail" id="email" placeholder="Entrez votre email">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe">
        <button class="button btn-success" type="submit" name="submit">Valider</button>
    </form>
</section>
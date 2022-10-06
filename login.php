<?php
include 'db_connection.php';

$email = $_POST['user_mail'];
$name = $_POST['user_name'];
$password = $_POST['password'];
 
if($email == 'user_mail' and $password == 'password')
{    
    session_start();
    $_SESSION['sid']=session_id();
    echo "Logged in successfully";
}
// else {echo "L'authentification n'a pas réussi";
// }
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
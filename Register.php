<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php
include "header.php";
echo "<body>";
include 'navbar.php';
include 'db_connect.php';

if(isset($_POST["name"], $_POST["email"], $_POST["username"])){
  $email = $_POST["email"];
  $username = $_POST["username"];
  $name = $_POST["name"];


  include 'encryption.php';

  $password = encrypt($_POST["password"]);
  $verif = $bdd->prepare("SELECT SQL_CALC_FOUND_ROWS `username` FROM `user` WHERE `username` = ?");
  $verif->execute([$username]);

  if($verif ->rowCount() == 0){
    $ajout = $bdd->prepare("INSERT INTO `user` (`id`, `username`, `name`, `password`, `email`) VALUES (NULL ,?,?,?,?)");
    $ajout->execute([$username ,$name, $password ,$email]);
  }
}

?>

<div class="container">
  <div class="customcont">
    <h5 class="header center teal-text text-lighten-2">Information</h5>
    <p>Votre compte a été créé avec succès.</p>
  </div>
</div>

<?php header("refresh:5;url=login.php");?>

</body>
</html>

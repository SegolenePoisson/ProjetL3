<?php
session_start();
$_SESSION["current_page"] = "home";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- For proper scaling on mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- JQuery form google -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- BOOTSTRAP -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Classe css -->
	<link rel="stylesheet" href="class1.css" />
	<title>WOUI</title>
</head>
<body>
  <?php
  $bdd = new PDO('mysql:host=localhost;dbname=poll;charset=utf8', 'root', '');

  if(isset($_POST["pseudo"], $_POST["password"])) 
  {
    $pseudo = $_POST["pseudo"]; 
    $password = $_POST["password"]; 

    $result = $bdd->prepare('SELECT username, password FROM user WHERE username = ?');
    $result->execute([$pseudo]);

    if ($result->rowCount() > 0)
    {

      include 'encryption.php';
      $data = $result->fetch();




      if(check($data['password'], $password)) {
        $_SESSION["logged_in"] = true; 
        $_SESSION["pseudo"] = $pseudo;
      }
    }
  }
  include 'navbar.php';
  ?>
  <h1>Bienvenue sur WOUI<br>votre sondage personnalisé</h1>
  <p>WOUI permet de créer des sondages pour faciliter l'organisation et la prise de décision dans un groupe de personnes.</br>
  Vous souhaitez fixer une date pour un repas entre amis ? En choisir le menu ? WOUI vous aide à trouver la meilleure solution !</br></p>
</body>
</html>

